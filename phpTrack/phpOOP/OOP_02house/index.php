<?php

class House
{
    public $location, $price, $lot, $type, $total;

    public function __construct($location, $price, $lot, $type)
    {
        $this->location = $location; 

        $this->price = $price;
        
        $this->lot = $lot;
        
        $this->type = $type;

        return $this->showAll();
    }

    public function showAll()
    {
        if($this->type == 'Pre-selling')
        {
            $this->total = $this->price - ($this->price * 0.2);
        }
        else
        {
            $this->total = $this->price - ($this->price * 0.05);
        }
        echo 'Location: '. $this->location. '<br>';

        echo 'Price: '. $this->price. '<br>';

        echo 'Lot: '. $this->lot. '<br>';

        echo 'Type: '. $this->type. '<br>';

        echo 'Discount: 0.2 <br>';

        echo 'Total price: '. $this->total. '<br><br>';

    }
    
}

$obj = new House('La Union', 1500000, '100sqm', 'Pre-selling');

$obj02 = new House('Metro Manila', 1000000, '150sqm', 'Ready for Occupancy');

$obj03 = new House('Quezon city', 1700000, '120sqm', 'Pre-selling');

$obj04 = new House('Makati', 1300000, '200sqm', 'Pre-selling');

$obj05 = new House('Malabon', 900000, '100sqm', 'Ready for Occupancy');
