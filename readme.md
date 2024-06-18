# ThriveCart Test

# Shopping Basket Project
This project was developed using PHP 8.1 with object-oriented programming to implement a shopping basket that calculates the total cost of products, applying delivery rules and special offers.

## Project Structure
### Files and Folders
- index.php: Main file that initializes the application, manages sessions, and renders the user interface.
- App/Basket.php: Class that manages items in the basket, applies special offers, and calculates the total cost, including delivery costs.
- App/DeliveryCosts.php: Class that calculates delivery costs based on provided rules.
- autoload.php: File that defines an autoload function to automatically load necessary classes.
### Configuration
The configuration parameters (Product Catalogue, Delivery Charge Rules, and Offers) are passed at the beginning of index.php to simplify the project and allow easy modification of values.

## Classes Used
## `Basket`
Responsible for managing items in the basket, applying special offers, and calculating the total cost.

### Methods
- __construct(array $productCatalogue, array $offers, DeliveryCosts $deliveryCosts): Initializes the basket with a product catalog, offers, and a delivery costs object.
- addItem(string $productCode): Adds an item to the basket.
= getProductCatalogue(): Returns the product catalog.
- total(): Calculates and returns the total cost of the basket, applying delivery rules and offers.


## `DeliveryCosts`
Responsible for calculating delivery costs based on provided rules.

### Methods
- __construct(array $deliveryChargeRules): Initializes the class with delivery charge rules.
- calculate(float $orderPrice): Calculates the delivery cost based on the total order price.


## Features
- Adding products to the basket.
- Calculating the total cost considering delivery rules and special offers.
- Clearing the basket to facilitate testing.
## Rules Details
### Delivery Rules
- Orders below $50 have a delivery cost of $4.95.
- Orders below $90 have a delivery cost of $2.95.
- Orders of $90 or more have free delivery.
### Special Offers
- "Buy one red widget, get the second half price".
## Rounding Considerations
Regarding the total function in the Basket class, the floor function was added to round the cent value down, since the second test, for example, would return $54.375, which rounds to $54.38 and not to $54.37.

## Interface
The interface was built using Bootstrap to facilitate user interaction and visualization.

## Example Usage
To add a product to the basket, simply click the "Add to Basket" button next to the desired product. The total cost will automatically update, considering the applicable delivery rules and offers.

## Project Initialization
- Clone this repository.
- Ensure PHP 8.1 is installed in your environment.
- Start a local web server pointing to the project directory.
- Access the project via a web browser.
