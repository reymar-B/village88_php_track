<?php

$arr = array( 'Spaghetti', 'Pizza', 'Iced tea' );

function printOrders( $arr )
{
    $display = '';

    $display = '<ol>';
        
    foreach( $arr as $val ) 
    { 
        $display .= '<li>'. $val .'</li>';
    }
    
    $display .= '</ol>';

    return $display;
}

echo printOrders( $arr );