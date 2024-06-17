<?php

include 'autoload.php';

use App\Basket;
use App\DeliveryCosts;

session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['clean'])) {
  unset($_SESSION['basket']);
}

if (!isset($_SESSION['basket'])) {

  $productCatalogue = [
    'R01' => [
      'name' => 'Red Widget',
      'price' => 32.95
    ],
    'B01' => [
      'name' => 'Blue Widget',
      'price' => 7.95
    ],
    'G01' => [
      'name' => 'Green Widget',
      'price' => 24.95
    ]
  ];

  $deliveryChargeRules = [
    'low' => [
      'threshold' => 50,
      'charge' => 4.95
    ],
    'high' => [
      'threshold' => 90,
      'charge' => 2.95
    ],
    'free' => [
      'charge' => 0.00
    ]
  ];

  $offers = ['red_widget_offer'];

  $deliveryCosts = new DeliveryCosts($deliveryChargeRules);
  $_SESSION['basket'] = new Basket($productCatalogue, $offers, $deliveryCosts);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_code'])) {
  try {
    $_SESSION['basket']->addItem($_POST['product_code']);
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Site</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  </head>

  <body>
    <div class="container">
      <h1 class="mt-5">Shopping Basket</h1>
      <div class="row">
        <div class="col-12">
          <h2>Products</h2>
          <ul class="list-group">
            <?php foreach ($_SESSION['basket']->getProductCatalogue() as $code => $item) : ?>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <?php echo $item['name'] ?> - $<?php echo number_format($item['price'], 2); ?>


                <form action="" method="post" style="display: inline;">
                  <div>
                    <input type="hidden" name="product_code" value="<?php echo $code; ?>">
                    <button type="submit" class="btn btn-primary btn-sm">Add to Basket</button>
                  </div>
                </form>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <h1 class="mt-5">Total</h1>
        <div class="col-12">
          <h2>Total Cost: $<?php echo number_format($_SESSION['basket']->total(), 2); ?></h2>
          <form action="" method="post" style="display: inline;">
            <div>
            <input type="hidden" name="clean" value="clean">
              <button type="submit" class="btn btn-primary btn-sm">Clean Basket</button>
            </div>
        </div>
      </div>
    </div>
  </body>
</html>