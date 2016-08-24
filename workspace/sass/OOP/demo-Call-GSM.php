<?php
use GSM\GSM;

require_once 'outload.php';

$firstGSM = new GSM("nokia");
$firstGSM->inserSimCard("0896505050");
//echo $firstGSM->getSumForCall();

$secondGSM = new GSM("HTC");
$secondGSM->inserSimCard("0896252525" );
$secondGSM->call($firstGSM, 100);
echo $secondGSM->getSumForCall();
echo PHP_EOL;
echo $secondGSM->printInfoForTheLastOutgoingCall();
echo PHP_EOL;
echo $firstGSM->printInfoForTheLastIncomingCall();