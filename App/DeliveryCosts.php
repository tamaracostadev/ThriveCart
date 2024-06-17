<?php

namespace App;

class DeliveryCosts 
{
    private $deliveryCost = 0;
    private $deliveryChargeRules;
    
    /**
     * DeliveryCost constructor. Calculate delivery cost based on order price
     * @param $orderPrice
     * @return void
     */
    public function __construct(array $deliveryChargeRules)
    {
        $this->deliveryChargeRules = $deliveryChargeRules;
    }

    /**
     * Set the delivery cost based on the order price
     *
     * @param float $deliveryCost
     * @return void
     */
    private function setDeliveryCost(float $deliveryCost): void
    {
        $this->deliveryCost = $deliveryCost;
    }

    /**
     * Calculate delivery cost based on order price
     *
     * @param float $orderPrice
     * @return float
     */
    public function calculate(float $orderPrice): float
    {
        if ($orderPrice < $this->deliveryChargeRules['low']['threshold']) {
            $this->setDeliveryCost($this->deliveryChargeRules['low']['charge']);
        } elseif ($orderPrice < $this->deliveryChargeRules['high']['threshold']) {
            $this->setDeliveryCost($this->deliveryChargeRules['high']['charge']);
        } else {
            $this->setDeliveryCost($this->deliveryChargeRules['free']['charge']);
        }
        return $this->deliveryCost;
    }

}