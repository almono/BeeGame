<?php

namespace Game;

class BeeHive
{

    public $bees = array();
	
	public function addQueen($count)
    {
        for ($i = 0; $i < $count; $i++) {
            $this->bees[] = new Bee\Queen();
        }
    }
	
	public function addWorker($count)
    {
        for ($i = 0; $i < $count; $i++) {
            $this->bees[] = new Bee\Worker();
        }
    }
	
	public function addDrone($count)
    {
        for ($i = 0; $i < $count; $i++) {
            $this->bees[] = new Bee\Drone();
        }
    }

	public function random_bee()
    {
        return $this->bees[array_rand($this->bees, 1)];
    }

	public function killAll()
	{
		foreach($_SESSION['bees']->bees as $bee){
			$bee->kill();
		}
	}
}
