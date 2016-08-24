<?php
namespace Employee;

use Task\Task;

class Employee
{
	private $name;
	private $currentTask;
	private $hoursLeft;
	
	public function __construct($name)
	{
		$this->name = $name;
	}
	
	public function setName($name)
	{
		if($name){
			$this->name = $name;
		}
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function getHoursLeft()
	{
		return $this->hoursLeft;
	}
	
	public function setHoursLeft($hours)
	{
		if($hours > 0){
			$this->hoursLeft = $hours;
		}
	}
	
	public function setCurrentTask(Task $task)
	{
		$this->currentTask = $task;
	}
	
	public function getCurrentTask()
	{
		return $this->currentTask;
	}
	
	public function work()
	{
		if(!empty($this->currentTask) && !empty($this->hoursLeft)){
			$currentTaskHours = $this->currentTask->getWorkingHours();
			
				$hours = $currentTaskHours - $this->hoursLeft;
				if($hours > 0){
				$this->currentTask->setWorkingHours($hours);
				$this->hoursLeft = 0;
				}else if($hours < 0){
					$this->currentTask->setWorkingHours(0);
					$this->hoursLeft = abs($hours);
				}else{
					$this->currentTask->setWorkingHours(0);
					$this->hoursLeft = 0;
				}
		}
	}
	
	public function showReport()
	{
		return "worker name - ".$this->name.PHP_EOL.
				"task name - ".$this->currentTask->getName().PHP_EOL.
				"worker left hours  - ".$this->getHoursLeft().PHP_EOL.
				"task hours left - ".$this->currentTask->getWorkingHours().PHP_EOL;
	}
	
}