<?php
use PHPUnit\Framework\TestCase;
require_once ('../models/Beast.php');
require_once ('../models/Hero.php');
class TestBeast extends TestCase
{
    public function testBeastConstructor()
    {
        $beast = new Beast();

        $this->assertEquals(1, $beast->isAlive());

        $this->assertEquals("Beast", $beast->getType());
        $this->assertInstanceOf('Entity', $beast);
        $this->assertInstanceOf('Beast', $beast);

        $this->assertGreaterThanOrEqual(50, $beast->getPower());
        $this->assertLessThanOrEqual(80, $beast->getPower());
    }

    public function testAttack()
    {
        $hero = new Hero();
        $beast = new Beast();

        $hero_hp = $hero->getHp();
        $damage = $beast->attack($hero);

        $this->assertGreaterThanOrEqual(0, $damage);
        $this->assertLessThanOrEqual(100, $damage);

        $this->assertEquals($hero_hp - $damage, $hero->getHp());

    }

}
