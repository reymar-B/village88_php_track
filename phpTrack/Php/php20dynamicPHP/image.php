<?php


for($i = 1; $i < 5; $i++)
{
    $r = rand(0, 255);
    $g = rand(0, 255);
    $b = rand(0, 255);
    
    $img = imagecreate( 200, 80 );
    
    $background = imagecolorallocate( $img, $r, $g, $b);
    
    $text_colour = imagecolorallocate( $img, 255, 255, 0 );
    
    $line_colour = imagecolorallocate( $img, 128, 255, 0 );
    
    imagestring( $img, 5, 80, 30, rand(1000, 9999), $text_colour );
    
    imagesetthickness ( $img, 5 );
    
    header( "Content-type: image/png" );
    
    imagepng( $img );
    
    imagedestroy( $img );

}