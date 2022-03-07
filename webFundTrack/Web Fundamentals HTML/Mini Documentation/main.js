$(document).ready( function() {

    $( "#click" ).click( function() {

        alert( "Handler for .click() called." );
    
    });

    $( "#hide" ).click( function() {
        
        alert( "button will be hiddin completely" );
        
        $( this ).hide( "slow" );

    });

    $( "#show" ).click( function() {
        
        $( "#hide" ).show( "slow" );
        
    });
    
    $( "#toggle" ).click( function() {
        
        $( "#tg" ).toggle( "slow" );
        
    });

    $( "#slideDown" ).click( function() {
    
        $( ".down" ).slideDown();
    
    });

    $( "#slideUp" ).click( function() {
    
        $( ".down" ).slideUp();
    
    });

    $( "#slideToggle" ).click( function() {
    
        $( ".down" ).slideToggle();
    
    });

    $( "#fadeIn" ).click( function() {
    
        $( "#fade_in" ).fadeIn( "slow" );
    
    });

    $( "#fadeOut" ).click( function() {
    
        $( "#fade_in" ).fadeOut( "slow" );
    
    });
    
    $( "#addClass" ).click( function() {
    
        $( "#addClass_output span" ).addClass( "lighten" );
    
    });

    $( "#before" ).click( function() {
    
        $( "#before_output span" ).before( "<h2>This is before</h2>" );
    
    });

    $( "#after" ).click( function() {
    
        $( "#after_output span" ).after( "<h2>This is After</h2>" );
    
    });
    $( "#append" ).click( function() {
    
        $( "#append_output span" ).append( "<span>This is Append</span>" );
    
    });
    
    $( "#html" ).click( function() {
    
        $( "#html_output span" ).html( "Hello World" );
    
    });

    $( "#attr" ).click( function() {
    
        $( "#attr_output img" ).attr( "alt","Kurosaki_Ichigo" );
    
    });

    $( "#val" ).click( function() {
    
        $( "input:text" ).val( "Hello World Yey!!!!" );
    
    });

    $( "#text" ).click( function() {
    
        $( "#text_output span" ).text( "Hello Earth Yey!!!!" );
    
    });

} )