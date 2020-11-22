<?php
require_once ("../helpers/Helper.php");
abstract class Entity {
    private $hp = NULL;
    private $power = NULL;
    private $speed = NULL;
    private $luck = NULL;
    private $defense = NULL;
    private $alive = NULL;
    private $missedHit = NULL;
    private $type = NULL;
    public function setHp($hp)
    {
        $this->hp = $hp;
        if ($this->hp <= 0) $this->setAlive(0);
    }

    public function getHp()
    {
        return $this->hp;
    }

    public function setPower($power)
    {
           $this->power = $power;
    }
    public function getPower()
    {
        return $this->power;
    }
    public function setSpeed($speed)
    {
        $this->speed = $speed;
    }

    public function getSpeed()
    {
        return $this->speed;
    }
    public function setLuck($luck)
    {
        $this->luck = $luck;
    }

    public function getLuck()
    {
        return $this->luck;
    }

    public function setDefense($defense)
    {
        $this->defense = $defense;
    }

    public function getDefense()
    {
        return $this->defense;
    }

    public function setAlive($alive)
    {
        $this->alive = (bool)$alive;
    }
    public function isAlive()
    {
        return (bool)$this->alive;
    }

    public function getMissedHit()
    {
        return (bool)$this->missedHit;
    }

    public function setMissedHit($missedHit)
    {
        $this->missedHit = (bool)$missedHit;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
}

