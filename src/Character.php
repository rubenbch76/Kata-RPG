<?php

namespace App;

class Character {

    // Properties

    private $health;
    private $level;
    private $alive;
    private $damage;
    private $heal;
    private $position;
    private $rangeClass;
    private $rangeMax;
    private $faction;
    private $iAmThing;
    
    // Constructor

    public function __construct(){

        $this->health = 1000;
        $this->level = 1;
        $this->alive = true;
        $this->damage = 200;
        $this->heal = 200;
        $this->position = 0;
        $this->rangeClass = "Melee";
        $this->rangeMax = 2;
        $this->faction = array();
        $this->iAmThing = false;        
    }

    // Methods

    public function deal_damage ($character){

        if($this->can_I_attack($character)){

            $this->checkLevelBeforeAttack($character);

            $character->setHealth($character->getHealth() - $this->getDamage());
        } 

       return;
    }

    public function can_I_attack ($character){

        if(($character === $this) || 
            ($this->outOfRangeBeforeAttack($character)) || 
            ($this->isAllie($character)) ||
            ($this->am_I_a_thing())) 
            return false;

        return true;
    }

    public function outOfRangeBeforeAttack($character){

        $distanceBetween = $this->getDistanceBetween($character);

        if($distanceBetween > $this->getRangeMax()){
            return true;
        }

        return false;
    }

    public function getDistanceBetween($character){

        $distanceBetween = abs($this->position - $character->position);

        return $distanceBetween;
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

    
    public function heal ($character){

        if($character->health == 0) return;

        if($this->isAllie($character)){

            $character->setHealth($character->health + $this->heal);

        }    
    }

    public function isAllie($character){

        if(($character->faction == []) || ($this->faction == [])) return false;

        if(array_intersect($this->faction, $character->faction)) return true;

        return false;
    }

    public function am_I_a_thing(){
        
        if($this->iAmThing) return true;
        return false;
    }

    public function killme(){
        $this->health = 0;
        $this->alive = false;
    }

    public function joinFaction($faction)
    {
        array_push($this->faction, $faction);

        return $this;
    }

    public function leaveFaction($faction){

        $this->faction = array_diff($this->faction, array($faction));

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

    public function getRangeClass()
    {
        return $this->rangeClass;
    }

    public function setRangeClass($rangeClass)
    {
        if($rangeClass == "Melee"){
            $this->rangeClass = $rangeClass;
            $this->setRangeMax(2);
        }

        if($rangeClass == "Ranged"){
            $this->rangeClass = $rangeClass;
            $this->setRangeMax(20);
        }
        
        return $this;
    }

    public function getRangeMax()
    {
        return $this->rangeMax;
    }

    public function setRangeMax($rangeMax)
    {
        $this->rangeMax = $rangeMax;

        return $this;
    }


    public function getFaction()
    {
        $factionList="";
        
        foreach($this->faction as $factionName){

            $factionList = $factionList . $factionName;
        }

        return $factionList;
    }


    public function getIAmThing()
    {
        return $this->iAmThing;
    }


    public function setIAmThing($iAmThing)
    {
        $this->iAmThing = $iAmThing;

        return $this;
    }
}
?>