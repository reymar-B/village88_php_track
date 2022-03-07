<?php

function arithSeries( $arr )
{
    $sum = 0;

    $length = count( $arr );

    for( $i = 0; $i < $length / 2; $i++ )
    {
        $sum += $arr[ $i ] + $arr[ ( $length - 1 ) - $i ];
    }

    echo $sum;
}

arithSeries( [ 2, 5, 8, 11, 14 ] );