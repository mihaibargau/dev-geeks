<?php
require_once ('../models/Hero.php');
require_once ('../models/Beast.php');
require_once ('../models/Game.php');

$Carl = new Hero();
$Beast = new Beast();
$Game = new Game();
echo "<!DOCTYPE html>";
echo "<html>";
echo "<body>";
$Game->playGame($Carl, $Beast);
echo "</body>";
echo "</html>";



