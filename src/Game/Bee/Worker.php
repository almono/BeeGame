<?php

namespace Game\Bee;

class Worker extends \Game\Bee
{
    public $health = 75;
    public $damage = 10;
	public $name = 'Worker';

    public $Kill_all_on_death = false;
}
