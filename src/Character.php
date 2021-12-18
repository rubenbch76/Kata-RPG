<?php

namespace App;

class Character {

    // Properties

    private $health;
    private $level;
    private $alive;
    private $damage;
    private $heal;
    
    

    // Constructor

    public function __construct(){

        $this->health = 1000;
        $this->level = 1;
        $this->alive = true;
        $this->damage = 200;
        $this->heal = 200;
        
    }

    // Getters and Setters


    public function getHealth()
    {
        return $this->health;
    }

    public function setHealth($health)
    {
        if($health > 1000){
            $this->health = 1000;
            return;
        }

        if($health <= 0){
            $this->killme(); 
            return;          
        }

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


    // Methods

    public function deal_damage ($character){

        if($character === $this) return;

        $this->checkLevelBeforeAttack($character);

        $character->setHealth($character->health - $this->damage);
    }

    public function heal ($character){

        if($character != $this) return;

        if($character->health == 0) return;

        $character->setHealth($character->health + $this->heal);
    }

    public function killme(){
        $this->health = 0;
        $this->alive = false;
    }

    public function checkLevelBeforeAttack($character){
        if($this->level - $character->level >= 5){
            $this->setDamage50PercentUp();
        }
        if($this->level - $character->level <= -5){
            $this->setDamage50PercentDown();
        }
    }

    public function setDamage50PercentUp(){
        $this->setDamage($this->getDamage() * 1.5);
    }

    public function setDamage50PercentDown(){
        $this->setDamage($this->getDamage() * 0.5);
    }

    
}
?>