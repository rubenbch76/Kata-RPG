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
		$heman->setDamage(200);
		$skeletor->setHealth(1000);
		//When
		$heman->deal_damage($skeletor);
		//Then
		$this->assertEquals(1000 - $heman->getDamage(), $skeletor->getHealth());
	}

	public function test_deal_damage_when_damage_exceeds_0_health()
	{
		//Given
		$heman = new Character();
		$skeletor = new Character();
		$heman->setDamage(700);
		$skeletor->setHealth(600);
		//When
		$heman->deal_damage($skeletor);
		//Then
		$this->assertEquals(0, $skeletor->getHealth());
		$this->assertEquals(false, $skeletor->getAlive());

	}

	public function test_character_heal_other_character()
	{
		//Given
		$heman = new Character();
		$skeletor = new Character();
		$heman->setHeal(200);
		$skeletor->setHealth(500);
		//When
		$heman->heal($skeletor);
		//Then
		$this->assertEquals(500, $skeletor->getHealth());
	}

	public function test_dead_character_cannot_be_heal()
	{
		//Given
		$heman = new Character();
		$skeletor = new Character();
		$heman->setHeal(200);
		$skeletor->setHealth(0);
		//When
		$heman->heal($skeletor);
		//Then
		$this->assertEquals(0, $skeletor->getHealth());
	}

	public function test_heal_health_cannot_rise_1000()
	{
		//Given
		$heman = new Character();
		$skeletor = new Character();
		$heman->setHeal(200);
		$skeletor->setHealth(900);
		//When
		$heman->heal($skeletor);
		//Then
		$this->assertEquals(900, $skeletor->getHealth());
	}

	public function test_character_cannot_deal_damage_itself()
	{
		//Given
		$heman = new Character();
		$heman->setHeal(1000);
		$heman->setDamage(500);
		//When
		$heman->deal_damage($heman);
		//Then
		$this->assertEquals(1000, $heman->getHealth());
	}

	public function test_deal_damage_target_5_levels_up_than_attacker()
	{
		//Given
		$heman = new Character();
		$skeletor = new Character();
		$heman->setDamage(200);
		$heman->setLevel(1);
		$skeletor->setHealth(1000);
		$skeletor->setLevel(7);
		//When
		$heman->deal_damage($skeletor);
		//Then
		$this->assertEquals(900, $skeletor->getHealth());
	
	}

	public function test_deal_damage_target_5_levels_down_than_attacker()
	{
		//Given
		$heman = new Character();
		$skeletor = new Character();
		$heman->setDamage(200);
		$heman->setLevel(7);
		$skeletor->setHealth(1000);
		$skeletor->setLevel(1);
		//When
		$heman->deal_damage($skeletor);
		//Then
		$this->assertEquals(700, $skeletor->getHealth());
	
	}

	public function test_characters_have_attack_max_range()
	{
		//Given
		$heman = new Character();
		$skeletor = new Character();
		$heman->setDamage(200);
		$heman->setRangeClass("Ranged");
		$heman->setPosition(0);
		$skeletor->setHealth(1000);
		$skeletor->setPosition(18);
		//When
		$heman->deal_damage($skeletor);
		//Then
		$this->assertEquals(1000 - $heman->getDamage(), $skeletor->getHealth());
		
	}

	public function test_new_character_belong_no_Faction()
	{
		//Given
		$heman = new Character();
		//When	
		//Then
		$this->assertEquals("", $heman->getFaction());
	}
	public function test_character_may_belong_one_or_more_Factions()
	{
		//Given
		$heman = new Character();
		//When
		$heman->joinFaction("Blues");
		$heman->joinFaction("Reds");
		$heman->joinFaction("Greens");
		//Then
		$this->assertEquals("BluesRedsGreens", $heman->getFaction());
	}

	public function test_character_may_join_or_leave_one_or_more_Factions()
	{
		//Given
		$heman = new Character();
		//When
		$heman->joinFaction("Blues");
		$heman->joinFaction("Reds");
		$heman->joinFaction("Greens");
		$heman->leaveFaction("Reds");
		$heman->leaveFaction("Blues");
		//Then
		$this->assertEquals("Greens", $heman->getFaction());
	}

	public function test_characters_same_faction_are_allies()
	{
		//Given
		$heman = new Character();
		$skeletor = new Character();
		//When
		$heman->joinFaction("Blues");
		$heman->joinFaction("Reds");
		$skeletor->joinFaction("Blues");
		$skeletor->joinFaction("Greens");
		//Then
		$this->assertEquals(true, $heman->isAllie($skeletor));
	}

	public function test_character_cannot_deal_damage_other_when_are_allies()
	{
		//Given
		$heman = new Character();
		$skeletor = new Character();
		$heman->setDamage(200);
		$skeletor->setHealth(1000);
		$heman->joinFaction("Reds");
 		$skeletor->joinFaction("Reds");
		//When
		$heman->deal_damage($skeletor);
		//Then
		$this->assertEquals(1000, $skeletor->getHealth());
	}
}


