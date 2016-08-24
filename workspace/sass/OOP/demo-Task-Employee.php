<?php
use Task\Task;
use Employee\Employee;

require_once 'outload.php';

$task1 = new Task("6 hours work", 6);

$employee1 = new Employee("Ivan");
$employee1->setHoursLeft(10);
$employee1->setCurrentTask($task1);

 $employee1->work();
echo $employee1->showReport();
echo "".PHP_EOL;

$task2 = new Task("10 hours work", 10);
$employee2 = new Employee("Megi");
$employee2->setHoursLeft(5);
$employee2->setCurrentTask($task2);
$employee2->work();
echo $employee2->showReport();
echo "".PHP_EOL;
$task3 = new Task("4 hours work", 4);
$employee3 = new Employee("kled");
$employee3->setHoursLeft(4);
$employee3->setCurrentTask($task3);
$employee3->work();
echo $employee3->showReport();