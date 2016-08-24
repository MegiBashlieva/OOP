<?php
use Computer\Computer;

require_once 'outload.php';

$firstComputer = new Computer(2008, 1000, "no", "4GB", 600, "Linux");
$secondComputer = new Computer(2011, 1500, "no", "8GB", 800, "Linux");

$firstComputer->useMemory(400);
$secondComputer->changeOperationSystem("Windows"); 

echo "firstComputer".PHP_EOL.$firstComputer->showComputerParameters();
echo PHP_EOL;
echo "secondComputer".PHP_EOL.$secondComputer->showComputerParameters();