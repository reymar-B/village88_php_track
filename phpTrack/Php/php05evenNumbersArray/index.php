<?php

function evenArray()
{
    $even_array = [];

    for( $i = 0;  $i < 10000; $i++ )
    {
        if( $i % 2 == 0 )
        {

            array_push( $even_array, $i );
        }
    }
    var_dump( $even_array );
}

evenArray();