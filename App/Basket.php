<?php

namespace App;

use Exception;
use App\DeliveryCosts;

class Basket {
    private $productCatalogue;
    private $offers;
    private $items = [];
    private $deliveryCosts;

    
    /**
     * Basket constructor. Create a new basket with a product catalogue, offers and delivery costs object
     *
     * @param array $productCatalogue
     * @param array $offers
     * @param DeliveryCosts $deliveryCosts
     */
    public function __construct(array $productCatalogue, array $offers, DeliveryCosts $deliveryCosts) {
        $this->productCatalogue = $productCatalogue;
        $this->offers = $offers;
        $this->deliveryCosts = $deliveryCosts;
    }

    /**
     * Add an item to the basket
     *
     * @param string $productCode
     * @return void
     */
    public function addItem(string $productCode):void {
        if (array_key_exists($productCode, $this->productCatalogue)) {
            $this->items[] = $productCode;
        } else {
            throw new Exception("Product code not found in catalogue");
        }
    }

    /**
     * Get the product catalogue
     *
     * @return array
     */
    public function getProductCatalogue(): array{
        return $this->productCatalogue;
    }

    /**
     * Calculate and return the total cost of the basket
     *
     * @return float
     */
    public function total(): float{
        $totalCost = 0;
        foreach ($this->items as $code) {
            $totalCost += $this->productCatalogue[$code]['price'];
        }

        
        // Apply delivery charges
        if ($totalCost === 0) {
            return 0;
        }
        // Apply offers
        $totalCost -= $this->applyOffers();

        $deliveryCharge = $this->deliveryCosts->calculate($totalCost);
        $totalCost += $deliveryCharge;

        //format cost to 2 decimal places rounded down
        return floor($totalCost * 100) / 100;
    }

    /**
     * Apply offers to the basket and return the total discount
     *
     * @return float
     */
    private function applyOffers(): float{
        if (in_array('red_widget_offer', $this->offers)) {
            $redWidgets = array_count_values($this->items)['R01'] ?? 0;
            if ($redWidgets >= 2) {
                return $this->productCatalogue['R01']['price'] / 2 * floor($redWidgets / 2);
            }
        }
        return 0;
    }
}
?>