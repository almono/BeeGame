<?php

namespace Game;

class Bee extends Beehive
{

    public $health;
    public $damage;
    public $name;
    public $current_health;
	public $Kill_all_on_death;

	public function __construct()
    {
		$this->current_health = $this->health;
    }


    public function getHp()
    {
		if (isset($this->health)) {
			return $this->health;
		}
		else {
			return 0;
		}
    }

    public function getDamage()
    {
		if (isset($this->damage)) {
			return $this->damage;
		}
		else {
			return 0;
		}
    }

    public function getName()
    {
		if (isset($this->name)) {
			return $this->name;
		}
		else {
			return 0;
		}
    }


    public function getLife()
    {
        return $this->current_health;
    }

    public function hit()
    {
		
        if (($this->current_health - $this->damage) <= 0) {
            $this->current_health = 0;
			$_SESSION['log'][] = $this->name . " is already dead";
			if ($this->current_health <= 0 && $this->Kill_all_on_death == true) 
			{
				$_SESSION['bees']->killAll();
				$_SESSION['log'][] = 'All bees have been killed. Game over';
			}
        } else {
            $this->current_health = $this->current_health - $this->damage;
			$_SESSION['log'][] = $this->name . " was hit for " . $this->damage . " damage";
        }
    }

    public function isDead()
    {
        return (bool) $this->current_health <= 0;
    }

    public function kill()
    {
        $this->current_health = 0;
    }
}
