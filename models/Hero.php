<?php
require_once ("../models/Entity.php");
require_once ("../helpers/Helper.php");

class Hero extends Entity
{
    private $dragonPowerActive = false;
    private $shieldActive = false;
    public function __construct()
    {
        $this->setAlive(1);
        $this->setType("Hero");
        $this->setHp(Helper::generateInRange(65, 95));
        $this->setPower(Helper::generateInRange(60, 70));
        $this->setDefense(Helper::generateInRange(40, 50));
        $this->setSpeed(Helper::generateInRange(40, 50));
        $this->setLuck(Helper::generateInRange(10, 30));
    }

    public function setDragonPower($dragonPower)
    {
        $this->dragonPowerActive = (bool)$dragonPower;
    }

    public function hasDragonPower()
    {
        return (bool)$this->dragonPowerActive;
    }

    public function castShield($successPercentage)
    {
        $randomFloat = Helper::getRandomFloat();
        if ($randomFloat * 100 < $successPercentage)
            $this->shieldActive = true;
        else $this->shieldActive = false;
    }

    public function isShieldActive()
    {
        return (bool)$this->shieldActive;
    }

    public function castDragonPower($successPercentage)
    {
        if (Helper::getRandomFloat() * 100  < $successPercentage)
            $this->setDragonPower(1);
        else
            $this->setDragonPower(0);
    }

    public function attack(Entity $entity)
    {
        $damage = NULL;
        $this->setMissedHit(0);
        if (Helper::checkMissedHit($entity) === true) {$this->setMissedHit(1); $damage = 0;}
        else {
            if ($this->hasDragonPower() === true)
                $damage = 2 * $this->getPower() - $entity->getDefense();
             else $damage = $this->getPower() - $entity->getDefense();
            if ($damage < 0) $damage = 0;
            elseif ($damage > 100) $damage = 100;
        }

        $entity->setHp($entity->getHp() - $damage);
        return $damage;
    }

}
