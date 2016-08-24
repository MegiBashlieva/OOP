<?php
namespace Call;

class Call
{
	private $priceForMinute;
	private $receiver;
	private $duration;
	private $caller;
	public function __construct($caller,$receiver,$duration)
	{
		$this->caller = $caller;
		$this->receiver = $receiver;
		$this->duration = $duration;
		$this->priceForMinute = 0.20;
	}
	
	public function setCaller($caller)
	{
		$this->caller = $caller;
	}
	
	public function getCaller()
	{
		return $this->caller;
	}
	
	public function setPriceForMinute($priceForMinute)
	{
		$this->priceForMinute = $priceForMinute;
	}
	
	public function getPriceForMinute()
	{
		return $this->priceForMinute;
	}
	
	public function setReceiver($receiver)
	{
		$this->receiver = $receiver;
	}
	
	public function getReceiver()
	{
		return $this->receiver;
	}
	
	public function setDuration($duration)
	{
		if($duration > 0 && $duration <= 120)
		{
		$this->duration = $duration;
		}
	}
	
	public function getDuration()
	{
		return $this->duration;
	}
}