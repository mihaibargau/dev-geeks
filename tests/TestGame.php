<?php
use PHPUnit\Framework\TestCase;
require_once ('../models/Beast.php');
require_once ('../models/Hero.php');
require_once ('../models/Game.php');
class TestGame extends TestCase
{
    public function testHeroAttacksFirst()
    {
        $hero = new Hero();
        $beast = new Beast();
        $this->assertContains(Game::heroAttacksFirst($hero, $beast), array(true, false));
    }

    public function testMaxRounds()
    {
        $game = new Game();
        $game->setMaxRounds(30);
        $this->assertEquals(30, $game->getMaxRounds());
    }

}
