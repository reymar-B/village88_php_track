<?php

class MethodChainig
{
    public $name;
    public $price;
    public $stock;
    public $sold;
    public $count;

    public function __construct($name, $price, $stock)
    {
        $this->name = $name;

        $this->price = $price;

        $this->stock = $stock;

        $this->sold = 0;

        $this->count = 0;
    }
    
    public function buy()
    {
        $this->sold++;
        
        return $this; 
    }

    public function returning()
    {
        $this->count++;

        return $this;
    }

    public function logDetails()
    {
        echo 'item name: '. $this->name. '<br>';
        
        echo 'item price: '. $this->price. '<br>';

        echo 'qty: '. $this->stock. '<br>';

        echo 'Buying: '. $this->sold. '<br>';

        if($this->sold - $this->count <= 0)
        {
            echo 'Returning: Out of stock <br><br>';
        }
        else
        {
            echo 'Returnung: '. ($this->sold - $this->count). '<br><br>';
        }


        return $this;
    }
}

$obj = new MethodChainig('piatos', 15, 8);

$obj->buy()->buy()->buy()->returning()->logDetails();

$obj02 = new MethodChainig('nova', 15, 6);

$obj02->buy()->buy()->returning()->returning()->logDetails();

$obj03 = new MethodChainig('chippy', 15, 6);

$obj03->returning()->returning()->returning()->logDetails();