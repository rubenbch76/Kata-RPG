<?php

namespace App;

use App\Character;

class Thing extends Character {

    // Properties

    private $health;
    private $iAmThing; 
    private $faction;
    private $destroyed;
   

    // Constructor

    public function __construct()
    {
        $this->health = 2000;
        $this->iAmThing = true;
        $this->faction = "";
        $this->destroyed = false;
    }


    // Methods

   
    // Getters and Setters

    public function getIAmThing()
    {
        return $this->iAmThing;
    }

    public function setIAmThing($iAmThing)
    {
        $this->iAmThing = $iAmThing;

        return $this;
    }
   
    public function getHealth()
    {
        return $this->health;
    }

    public function setHealth($health)
    {
        if($health <= 0){
            $this->health = 0;
            $this->setDestroyed(true); 
            return;          
        }
        
        $this->health = $health;

        return $this;
    }

    public function setDamage($damage)
    {
        $this->damage = $damage;

        return $this;
    }

 
    public function getDestroyed()
    {
        return $this->destroyed;
    }


    public function setDestroyed($destroyed)
    {
        $this->destroyed = $destroyed;

        return $this;
    }
}