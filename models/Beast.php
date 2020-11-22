<?php
require_once ("../models/Entity.php");
class Beast extends Entity
{
    public function __construct(){
        $this->setAlive(1);
        $this->setType("Beast");
        $this->setHp(Helper::generateInRange(55, 80));
        $this->setPower(Helper::generateInRange(50, 80));
        $this->setDefense(Helper::generateInRange(35, 55));
        $this->setSpeed(Helper::generateInRange(40, 60));
        $this->setLuck(Helper::generateInRange(25, 40));
    }

    public function attack(Hero $hero)
    {
        $damage = NULL;
        $this->setMissedHit(0);
        if (Helper::checkMissedHit($hero) === true) {$this->setMissedHit(1); $damage = 0;}

        else {
            if ($hero->isShieldActive() === true)
            $damage = (int)(($this->getPower() - $hero->getDefense())/2);
            else $damage = $this->getPower() - $hero->getDefense();
            if ($damage < 0) $damage = 0;
            elseif ($damage > 100) $damage = 100;

        }

        $hero->setHp($hero->getHp() - $damage);
        return $damage;

    }

}