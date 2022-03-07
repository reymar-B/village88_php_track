<?php

function meanOfArray( $numbers )
{
    $mean = 0;

    for( $i = 0; $i < count( $numbers ); $i++ )
    {
        $mean += $numbers[ $i ];
    }

    echo 'The mean value is: '. $mean / count( $numbers );
}

meanOfArray( [ 13, 143, 88, 65, 120 ] );