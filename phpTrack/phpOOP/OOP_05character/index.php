<?php

class Character
{
    protected $name;
    protected $health;
    protected $stamina;
    protected $manna;

    public function __construct($name)
    {
        $this->name = $name;

        $this->stamina = 100;

        $this->manna = 100;

        return $this;
    }

    public function walk()
    {
        $this->stamina--;

        return $this;
    }

    public function run()
    {
        $this->stamina -= 3;

        return $this;
    }

    public function showStats()
    {
        echo 'Character name: '. $this->name. '<br>';

        echo 'Health: '. $this->health. '<br>';

        echo 'Stamina: '. $this->stamina. '<br>';

        echo 'Manna: '. $this->manna. '<br><br>';

        return $this;
    }
}

$character = new Character('rhasta');

$character->walk()->walk()->walk()->run()->run()->showStats();

class Shaman extends Character
{
    public function __construct($name)
    {
        parent::__construct($this->name = $name);

        $this->health = 150;

    }
    public function heal()
    {
        $this->health += 5;

        $this->manna += 5;

        $this->stamina += 5;

        return $this;
    }
}

$shaman = new Shaman('witch doctor');

$shaman->walk()->walk()->walk()->run()->run()->heal()->showStats();

class Swordsman extends Character
{
    public function __construct($name)
    {
        parent::__construct($this->name = $name);

        $this->health = 170;
    }

    public function showStats()
    {
        echo 'I am powerful! <br>';

        parent::showStats();
    }

    public function slash()
    {
        $this->manna -= 10;

        return $this;
    }
}

$swordsman = new Swordsman('Juggernaut');

$swordsman->walk()->walk()->walk()->run()->run()->slash()->slash()->showStats();