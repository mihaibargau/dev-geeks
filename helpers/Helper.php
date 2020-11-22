<?php
final class Helper
{
    public static function generateInRange($min, $max)
    {
        return mt_rand($min, $max);
    }
    public static function getRandomFloat()
    {
        return mt_rand(0, 10)/10;
    }

    public static function checkMissedHit(Entity $defender)
    {
        if (self::getRandomFloat() * 100 < $defender->getLuck())
            return true;
        return false;
    }

}