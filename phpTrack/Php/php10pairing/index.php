<?php

$cards = array( 'King' => 13, 'Queen' => 12, 'Jack' => 11, 'Ace' => 1 );

function printOrders( $cards )
{
    $display = '';

    $value = '';

    $display = '<ul>';
        
    foreach( $cards as $key => $val ) 
    { 
        $display .= '<li>'. $key .'</li>';

        $value .= '<p> The value of '. $key .' in Pyramid Solitaire is '. $val .'</p>';
    }
    
    $display .= '</ul>';
    
    return $display . $value;

}

echo printOrders( $cards );