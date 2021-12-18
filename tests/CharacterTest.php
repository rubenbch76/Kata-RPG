<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Character;
use App\Faction;

class CharacterTest extends TestCase {

	public function test_character_creation()
	{
		//Given
		$heman = new Character();
		//When
		$health = $heman->getHealth();
		$level = $heman->getLevel();
		$alive = $heman->getAlive();
		//Then
		$this->assertEquals(1000, $health);
		$this->assertEquals(1, $level);
		$this->assertEquals(true, $alive);

	}

 	public function test_deal_damage_when_character_attack_other_character()
	{
		//Given
		$heman = new Character();
		$skeletor = new Character();
		$heman = $heman->setInitialHealth(1000);
		$heman = $heman->setDamage(200);
		$skeletor = $skeletor->setInitialHealth(1000);
		$skeletor = $skeletor->setDamage(200);
		//When
		$heman->deal_damage($skeletor);
		//Then
		$this->assertEquals($skeletor->getInitialHealth() - $heman->getDamage(), $skeletor->getHealth());
	}

/*	public function test_deal_damage_health_equal_zero()
	{
		//Given
	
		//When
		
		//Then
		

	}

	public function test_heal()
	{
		//Given
		
		//When
		
		//Then
	
	}

	public function test_heal_dead_character()
	{
		//Given
	
		//When
		
		//Then
	
	}

	public function test_deal_no_damage_itself()
	{
		//Given
	
		//When
	
		//Then
	
	}

	public function test_only_heal_itself()
	{
		//Given
		
		//When
	
		//Then
	
	}

	public function test_deal_damage_target_five_more_attacker()
	{
		//Given
		
		//When
	
		//Then
	
	}

	public function test_deal_damage_attacker_five_more_target()
	{
		//Given
		
		//When
	
		//Then
		
	}

	public function test_attack_max_range()
	{
		//Given
		
		//When
		
		//Then
		
	}

	public function test_movement()
	{
		//Given
			
		//When
	
		//Then
		
	}

	public function test_attack_range_to_deal(){
		//Given
	
		//When
	
		//Then
	
	} */
	
}


