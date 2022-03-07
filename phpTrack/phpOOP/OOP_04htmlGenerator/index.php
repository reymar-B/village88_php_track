<?php

class HTMLGenerator
{
    public function renderInput($inputArray)
    {
        $this->inputArray = $inputArray;

        foreach($this->inputArray as $key => $input)
        {
            echo "<label> $key </label>
            
                    <input type='text' value='$input'>";
        }
    }

    public function renderList($listArray)
    {
        $this->listArray = $listArray;
        
        echo '<ol>';
        foreach($this->listArray as $list)
        {
            echo "<li> $list </li>";
        }
        echo '</ol>';
    }
}

$inputs = ['first name'=>'tony', 'last name'=>'stark', 'email'=>'stark@g.com'];

$lists = ['cat', 'fish', 'dog', 'bird', 'rabbit'];

$obj = new HTMLGenerator();

$inputs =  $obj->renderInput($inputs);

$lists = $obj->renderList($lists);
