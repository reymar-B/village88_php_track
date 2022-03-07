<?php

function shootTheBall()
{
    $isShoot = '';
    $success = 0;
    $fail = 0;

    echo 'Practice starts....<br/>';

    for( $i = 1; $i <= 1000; $i++ )
    {
        $shoot = rand( 1, 2);

        if( $shoot == 1 )
        {
            $isShoot = 'Success!';

            $success++;
        }
        elseif( $shoot = 2 )
        {
            $isShoot = 'Epic fail!';
            
            $fail++;            
        }

        echo 'Attempt #'. $i.': '. 'Shooting the ball...'. $isShoot.'...'. 'Got '. $success. 'x success and '. 
            $fail. 'x epic fail(s) so far <br/>';
    }

    echo 'Practice ended';
}

shootTheBall();