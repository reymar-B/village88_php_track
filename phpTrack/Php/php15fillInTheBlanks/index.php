<?php

function convert_to_blanks( $arr )
{
    for( $i = 0; $i < count( $arr ); $i++ )
    {
        $newArr = $arr[ $i ];

        $value = range( 1, $newArr );

        $implode = implode( $value );

        $str = str_replace( $value, "_ ", $implode );

        echo $str. '<br/>';
    }
}

$list = array( 6, 1, 3, 5, 7);

convert_to_blanks( $list );

function convert_to_blanks02( $arr )
{
    $pattern = [ 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 
                    'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z' ];

    for( $i = 0; $i < count( $arr ); $i++ )
    {
        $newArr = $arr[ $i ];

        if( is_numeric( $newArr ) == true )
        {
            $value = range( 1, $newArr );

            $value = str_replace( $value, "_ ", $value );

            $value = implode( $value );

        }
        elseif( is_numeric( $newArr ) == false )
        {
            $value = strtolower( $newArr );
            
            $value = ucfirst( $value );
            
            $value = str_replace( $pattern, "_ ", $value );
        }

        echo $value. '<br/>';
    }
}

$list = array( 4, 'Michael', 3, 'Karen Marie', 2, 'Rogie' );

convert_to_blanks02( $list );   