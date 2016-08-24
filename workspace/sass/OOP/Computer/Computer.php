<?php
namespace Computer;

class Computer
{
	private $year;
	private $price;
	private $isNotebook;
	private $hardDiskMemory;
	private $freeMemory;
	private $operationSystem;
	
	public function __construct($year,$price,$isNotebook,
			$hardDiskMemory,$freeMemory,$operationSystem)
	{
		$this->year = $year;
		$this->price = $price;
		$this->isNotebook = $isNotebook;
		$this->hardDiskMemory = $hardDiskMemory;
		$this->freeMemory = $freeMemory;
		$this->operationSystem = $operationSystem;
	}
	
	public function changeOperationSystem($newOperationSystem)
	{
		$this->operationSystem = $newOperationSystem; 
	}
	
	public function useMemory($memory)
	{
		if($memory > $this->freeMemory){
			echo "Not enough free memory".PHP_EOL;
		}else {
			$this->freeMemory -= $memory;
		}
	}
	
	public function showComputerParameters()
	{
		return "Year -> $this->year".PHP_EOL.
				"Price -> $this->price".PHP_EOL.
				"Is  Notebook -> $this->isNotebook".PHP_EOL.
				"Hard Disk Memory -> $this->hardDiskMemory".PHP_EOL.
				"Free Memory -> $this->freeMemory".PHP_EOL.
				"Operation System -> $this->operationSystem".PHP_EOL;
	}
}