<?php

function multiple()
{
    for( $i = 1; $i < 1000; $i++ )
    {
        $output = $i % 3 == 0 ? 'Multiple' : 'Not Multiple';

        echo "$i" .' => '. "$output <br/>";
    }
}

multiple();
