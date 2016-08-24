<?php
namespace GSM;

use Call\Call;

class GSM
{
	private $model;
	private $hasSimCard;
	private $simMobileNumber;
	private $outdoingCallsDuration;
	private $lasIncomingCall;
	private $lastOutgoingCall;
	private $priceForCall = 0;
	
	public function __construct($model)
	{
		$this->model = $model;
	}
	
	public function inserSimCard($simMobileNumber)
	{
		$pattern = "/08[0-9]{8}/";
		
		if(preg_match($pattern, $simMobileNumber)){
			$this->simMobileNumber = $simMobileNumber;
			$this->hasSimCard = true;
		}
		
	}
	
	public function removeSimCard()
	{
		$this->hasSimCard = false;
	}
	
	
	public function call(GSM $receiver, $duration)
	{
		$isDurationRight = $this->isDurationRight($duration);
		$areTheyDifferentNumbers = $this->isDifferentNumber($receiver->simMobileNumber);
		$hasSimCards = $this->hasSimCards($receiver->hasSimCard);
		
		if($isDurationRight && $areTheyDifferentNumbers && $hasSimCards){
			$makeCall = new Call($this->simMobileNumber, $receiver->simMobileNumber, $duration);
			$this->lastOutgoingCall = $makeCall;
			$receiver->lasIncomingCall = $makeCall;
			$this->outdoingCallsDuration += $duration;
			$this->priceForCall = $makeCall->getPriceForMinute();
		}
	}
	
	private function isDurationRight($duration)
	{
		if($duration > 0 && $duration <=120){
			return true;
		}else return false;
	}
	
	private function isDifferentNumber($number)
	{
		if($this->simMobileNumber != $number){
			return true;
		}else return false;
	}
	
	private function hasSimCards($hasSim)
	{
		if($this->hasSimCard && $hasSim){
			return true;
		}else return false;
	}
	
	public function getSumForCall()
	{
		
			return sprintf("Price for all outgoing calls = %s",$this->priceForCall * 
					$this->outdoingCallsDuration);
	}
	
	public function printInfoForTheLastOutgoingCall()
	{
		if(!empty($this->lastOutgoingCall)){
			return ("recevier - " .$this->lastOutgoingCall->getReceiver().PHP_EOL.
					"duration - ".$this->lastOutgoingCall->getDuration().PHP_EOL.
					"price for minute -". $this->lastOutgoingCall->getPriceForMinute().PHP_EOL);
			
		}else return "no outgoing call";
	}
	
	public function printInfoForTheLastIncomingCall()
	{
		if(!empty($this->lasIncomingCall)){
			return ("caller - " .$this->lasIncomingCall->getCaller().PHP_EOL.
					"duration - ".$this->lasIncomingCall->getDuration().PHP_EOL.
					"price for minute -". $this->lasIncomingCall->getPriceForMinute().PHP_EOL);
				
		}else return "no incomig call";
	}
}