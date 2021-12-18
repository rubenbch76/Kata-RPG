<?php

namespace App;

class Character {

    // Properties

    private $initialHealth;
    private $health;
    private $level;
    private $alive;
    private $damage;
    

    // Constructor

    public function __construct(){
        $this->initialHealth = 1000;
        $this->health = 1000;
        $this->level = 1;
        $this->alive = true;
        $this->damage = 200;
        
    }

    // Getters and Setters

    public function getHealth()
    {
        return $this->health;
    }

    public function setHealth($health)
    {
        $this->health = $health;

        return $this;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    public function getAlive()
    {
        return $this->alive;
    }

    public function getDamage()
    {
        return $this->damage;
    }

    public function setDamage($damage)
    {
        $this->damage = $damage;

        return $this;
    }

    public function getHeal()
    {
        return $this->heal;
    }


    public function setHeal($heal)
    {
        $this->heal = $heal;

        return $this;
    }

    public function getMaxRange()
    {
        return $this->maxRange;
    }

    public function setMaxRange($maxRange)
    {
        $this->maxRange = $maxRange;

        return $this;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function setPosition($position)
    {
        $this->position = $position;

        return $this;   
    }

    public function getInitialHealth()
    {
        return $this->initialHealth;
    }

    public function setInitialHealth($initialHealth)
    {
        $this->initialHealth = $initialHealth;

        return $this;
    }


    // Methods

    public function deal_damage ($character){

        $character->health = $character->health - $this->damage;
    }

 
}
?>