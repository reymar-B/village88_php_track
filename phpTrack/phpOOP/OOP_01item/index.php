<?php

class Item 
{
    public $name;
    public $price;
    public $stock;
    public $sold;

    public function __construct($name, $price, $stock)
    {
        $this->name = $name;

        $this->price = $price;

        $this->stock = $stock;

        $this->sold = 0;
    }
    
    public function buy()
    {
        return $this->sold++;
    }

    public function returning()
    {
        if($this->sold <= 0)
        {
            return 'Out of stock';
        }
        else
        {
            return $this->sold--;
        }
    }

    public function logDetails()
    {
        echo 'item name: '. $this->name. '<br>';
        
        echo 'item price: '. $this->price. '<br>';

        echo 'qty: '. $this->stock. '<br>';

        echo 'Buying: '. $this->sold. '<br>';

        echo 'Returnung: '. $this->returning(). '<br><br>';
    }

}

$obj = new Item('piatos', 15, 8);

$obj->buy();

$obj->buy();

$obj->buy();

$obj->returning();

$obj->logDetails();

$obj02 = new Item('nova', 15, 6);

$obj02->buy();

$obj02->buy();

$obj02->returning();

$obj02->returning();

$obj02->logDetails();

$obj03 = new Item('chippy', 15, 6);

$obj03->returning();

$obj03->returning();

$obj03->returning();

$obj03->logDetails();