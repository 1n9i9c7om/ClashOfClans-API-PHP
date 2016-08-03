<?php

require_once "./ClashAPI/API.class.php";

$api = new ClashOfClans();
if($api->isWarlogPublic("#22UCCU0J"))
{
	$warlog = new CoC_Warlog($api->getWarlog("#22UCCU0J", array("limit" => 10)));
	for ($i = 0; $i < $warlog->getLogEntryAmount(); $i++) 
	{ 
		$logEntry = new CoC_LogEntry($warlog->getLogEntryByIndex($i));
		if($logEntry->getResult() == "win")
		{
			echo '<font color="green">';
		}
		else if($logEntry->getResult() == "lose")
		{
			echo '<font color="red">';
		}
		else if($logEntry->getResult() == "draw")
		{
			echo '<font color="black">';
		}
		echo $logEntry->getClanName() . " " . $logEntry->getClanStars() . " - " . $logEntry->getOpponentStars() . " " . $logEntry->getOpponentName() . " </font><br/>";
	}
}
else
{
	echo "This clan's warlog isn't public, sorry.";
}

?>