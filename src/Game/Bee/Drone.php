<?php

namespace Game\Bee;

class Drone extends \Game\Bee
{
    public $health = 50;
    public $damage = 12;
	public $name = 'Drone';

    public $Kill_all_on_death = false;
}
