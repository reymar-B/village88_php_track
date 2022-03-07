<?php
 
   header('Content-type: text/javascript');
 
?>
        
$(document).ready( function() 
{
    console.log('You are 100x better than before!');
    
    $('p').css('font-size', (sessionStorage.getItem('size')) +'px');
    
    var color = new Array('blue', 'black', 'gold', 'pink', 'red', 'yellow', 'gray');
    
    $(window).on( 'load', function()
    {
        var count = 10;
        var initSize = 15

        
        if(isNaN(parseInt(sessionStorage.getItem('size'))))
        {
            increment = initSize;
        }
        else
        {
            increment =  parseInt(sessionStorage.getItem('size'));
            
            alert('You are 140x better than before!');
        }

        sessionStorage.setItem('size', increment);

        sessionStorage.setItem('size', parseInt(sessionStorage.getItem('size')) + count);
        
    });

    var rnd = Math.floor((Math.random() * 7));

    var rnd01 = Math.floor((Math.random() * 7));

    $('h1').css('color', color[rnd]);

    $('p').css('color', color[rnd01]);

});
