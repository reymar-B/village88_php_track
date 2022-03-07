<?php

$languages = [ 'PHP', 'JS', 'Ruby' ];

function language( $arr )
{
    $display = '';

    $display = '<select>';

    for( $i = 0; $i < count( $arr ); $i++ )
    {
        $display .= '<option>'. $arr[ $i ]. '</option>';
    }

    $display .= '</select>';

    echo ' Drop down menu using For loop ';

    echo $display;
}


function languages( $arr )
{
    $display = '';

    $display = '<select>';

    foreach( $arr as $val )
    {
        $display .= '<option>'. $val. '</option>';
    }

    $display .= '</select>';

    echo ' Drop down menu using Foreach ';

    echo $display;
}


function languages02( $arr )
{
    array_push( $arr, 'HTML', 'CSS');

    $display = '';

    $display = '<select>';

    foreach( $arr as $val )
    {
        $display .= '<option>'. $val. '</option>';
    }

    $display .= '</select>';

    echo ' Drop down menu using Foreach with additional fields ';

    echo $display;
}

language( $languages );

languages( $languages );

languages02( $languages );

?>