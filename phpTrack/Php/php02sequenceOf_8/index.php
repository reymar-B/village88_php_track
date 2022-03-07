<?php

function sequence( $cd, $start, $end )
{
    for ( $i = 1; $i <= $end; $i++ )
    {
        echo "$start <br/>";
        
        $start += $cd;

        if ( $start > $end )
        {
            break;            
        }
    }
}   
    sequence( 8, 8, 1000 );