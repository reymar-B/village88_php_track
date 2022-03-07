<?php

$binary = [ 1, 1, 0, 1, 1, 0, 1 ];

function getCount( $arr )
{
    $zero = 0;
    $one = 0;
    $newArr = [];

    for( $i = 0; $i < count( $arr ); $i++ )
    {
        if( $arr[ $i ] == 0 )
        {
            $zero++;
        }
        elseif( $arr[ $i ] == 1 )
        {
            $one++;
        }
    }
    
    $newArr[ 0 ] = $zero;

    $newArr[ 1 ] = $one;
    
    return $newArr;
}

var_dump( getCount( $binary ) );