<?php

namespace App;

use App\Character;

class Thing {

    // Properties

    private $iAmThing;
    private $health;
    private $position; 
    private $faction;
    private $destroyed;
   
    // Constructor

    public function __construct()
    {
        $this->iAmThing = true;
        $this->health = 2000;
        $this->position = 0;       
        $this->faction = "";
        $this->destroyed = false;
    }

    // Methods

    public function deal_damage ($character){

       return;
    }

    public function am_I_a_thing(){
        
        if(get_class($this) === "App\Thing") return true;
        return false;
    }

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

    public function getPosition()
    {
        return $this->position;
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

    public function getFaction()
    {
        return $this->faction;
    }

    public function joinFaction($faction)
    {
       return;
    }
}