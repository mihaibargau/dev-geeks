<?php
class Game
{
    private $max_rounds = 20;

    public function playGame(Hero $Carl, Beast $Beast)
    {
        $this->displayStats($Carl, $Beast);
        $heroAttacks = Game::heroAttacksFirst($Carl, $Beast);
        for ($rounds=1;$rounds<=$this->max_rounds && $Carl->isAlive() && $Beast->isAlive();$rounds++)
        {
            echo "Round " . $rounds . "<br>";
            $Carl->castShield(20);
            if ($Carl->isShieldActive() === true) echo "<br>Carl summoned shield";
            else echo "<br>Carl failed to cast shield spell";
            $Carl->castDragonPower(10);
            if ($Carl->hasDragonPower() === true) echo "<br>Carl has dragon power";
            else echo "<br>Carl failed to cast dragon spell";
            echo "<br>";
            $damage = NULL;
            if ($heroAttacks === true) {
                echo "<br>Carl is the attacker and the Beast is defending!<br>";
                $heroAttacks = false;
                $damage = $Carl->attack($Beast);
                if ($Carl->getMissedHit() === true)
                    echo "Carl missed the hit!";
                else echo "Carl dealt " . $damage . " damage to the beast";
            }
            else {
                echo "<br>The beast is attacking and Carl is defending!<br>";
                $heroAttacks = true;
                $damage = $Beast->attack($Carl);
                if ($Beast->getMissedHit() === true)
                    echo "Beast missed the hit!";
                else echo "Beast dealt " . $damage . " damage to Carl";
            }
            $this->displayStats($Carl, $Beast);
            if ($rounds <= $this->max_rounds - 1) {
                if ($Carl->isAlive() === false)
                    echo "<br>The beast won before round limit!<br>";
                elseif ($Beast->isAlive() === false)
                    echo "<br>Carl won before round limit!<br>";
            }

        }
        if ($Carl->isAlive() === false) echo "<br>Carl died and the beast won!<br>";
        else if ($Beast->isAlive() === false) echo "<br>The beast died and Carl won!<br>";
    }

    public static function displayEntity(Entity $entity)
    {
        echo "<br>";
        if ($entity->getType() === "Beast")
            echo "Beast:<br>";
        else echo "Hero:<br>";
        echo $entity->getHp() . " hp<br>";
        echo $entity->getPower() . " power<br>";
        echo $entity->getDefense() . " defense<br>";
        echo $entity->getSpeed() . " speed<br>";
        echo $entity->getLuck() . "% luck<br>";
        echo "<br>";
    }

    public static function heroAttacksFirst(Hero $hero, Beast $beast)
    {
        if ($hero->getSpeed() > $beast->getSpeed()) {
            return true;
        }
        elseif ($hero->getSpeed() < $beast->getSpeed()){
            return false;
        }
        elseif ($hero->getLuck() > $beast->getLuck()){
            return true;
        }
        return false;
    }

    public function displayStats(Hero $hero, Beast $beast)
    {
        Game::displayEntity($hero);
        Game::displayEntity($beast);
    }

    public function getMaxRounds()
    {
        return $this->max_rounds;
    }

    public function setMaxRounds($maxRounds)
    {
        $this->max_rounds = $maxRounds;
    }

}