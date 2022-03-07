<?php

// $digits = array( 3, 12, 30 );

// function exponential( $arr )
// {
//     for( $i = 0; $i < count( $arr ); $i++ )
//     {
//         $arr[ $i ] = pow( $arr[ $i ], 3 );
//     }

//     return $arr;
// }

// $result = exponential( $digits );

// var_dump( $result );

$digits = [ 8, 11, 4 ];

function exponential( $arr, $exponent )
{
    for( $i = 0; $i < count( $arr ); $i++ )
    {
        $arr[ $i ] = pow( $arr[ $i ], $exponent );
    }

    return $arr;
}

$result = exponential( $digits, 4 );

var_dump( $result );