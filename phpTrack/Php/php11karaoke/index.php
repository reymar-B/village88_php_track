<?php

function karaoke()
{
    for( $i = 1; $i <= 50; $i++)
    {
        $score = rand( 1, 100);

        if( $score < 50 )
        {
            echo 
            '<h2 style="display: inline;"> Score</h2>'. 
                '<h1 style="display: inline;"> '. $score. ': '.'</h1> '.
            '<h2 style="display: inline;"> Never sing again, ever! </h2> <br/> <br/>';
        }
        elseif( $score >= 50 && $score <= 79 )
        {
            echo 
            '<h2 style="display: inline;"> Score</h2>'. 
                '<h1 style="display: inline;"> '. $score. ':'.'</h1> '.
            '<h2 style="display: inline;"> Practice more! </h2> <br/> <br/>';
        }
        elseif( $score >= 80 && $score <= 94 )
        {
            echo 
            '<h2 style="display: inline;"> Score</h2>'. 
                '<h1 style="display: inline;"> '. $score. ':'.'</h1> '.
            '<h2 style="display: inline;"> You\'re getting better! </h2> <br/> <br/>';
        }
        elseif( $score >= 95 && $score <= 100 )
        {
            echo 
            '<h2 style="display: inline;"> Score</h2>'. 
                '<h1 style="display: inline;"> '. $score. ':'.'</h1> '.
            '<h2 style="display: inline;"> What an excellent singer! </h2> <br/> <br/>';
        }
    }
}

karaoke();