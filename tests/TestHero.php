<?php
use PHPUnit\Framework\TestCase;
require_once ('../models/Beast.php');
require_once ('../models/Hero.php');
class TestHero extends TestCase
{
    public function testHeroConstructor()
    {

        $hero = new Hero();

        $this->assertEquals(1, $hero->isAlive());

        $this->assertGreaterThanOrEqual(65, $hero->getHp());
        $this->assertLessThanOrEqual(95, $hero->getHp());

        $this->assertGreaterThanOrEqual(10, $hero->getLuck());
        $this->assertLessThanOrEqual(30, $hero->getLuck());

        $this->assertEquals(0, $hero->hasDragonPower());
        $this->assertEquals(0, $hero->isShieldActive());

    }

    public function testAttack()
    {
        $hero = new Hero();
        $beast = new Beast();

        $beast_hp = $beast->getHp();

        $damage = $hero->attack($beast);

        $this->assertNotSame(NULL, $damage);
        $this->assertGreaterThanOrEqual(0, $damage);
        $this->assertLessThanOrEqual(100, $damage);

        $this->assertEquals($beast_hp - $damage, $beast->getHp());
    }


}
