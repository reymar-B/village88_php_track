<?php
    $array = array("echo", "var_dump");
?>
    <h3>Different ways of debugging:</h3>
    <ul>
<?php    
    for( $i = 0; $i < count( $array ); $i++)
    {
?>
        <li><?= $array[ $i ] ?></li>
<?php
    }
?>
    </ul>
<?php    
    echo "<pre>";
    var_dump($array);
    echo "</pre>";
?>
    <h3>Checking if variable is set:</h3>
<?php
    $var1 = "var";
    $var2 = "";
    $var3 = '';
    $var4 = null;
    
    if( isset( $var1, $var2, $var3 ) )
    {
        echo 'The value of  var1, var2, var3, are set. <br/>';
    }
    if( !isset( $var4 ) )
    {
        echo "The value of var4 is null, therefore, not set.<br/>";
    }
    if( !isset( $var5 ) )
    {
        echo "Non-declared var5 is not set.<br/>";
    }
?>