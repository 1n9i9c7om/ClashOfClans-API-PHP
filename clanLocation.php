<?php
require_once "./ClashAPI/API.class.php";
$api = new ClashOfClans();

$germany = new CoC_Location(0); //setting this to 0 because we set the Location using "setLocationByName"
$germany->setLocationByName("Germany");
//$germany->setLocationByCode("DE"); //works as well

$results = $api->getRankList($germany->getLocationId(), true);  //get the clan ranklist for the given location. 

for($i = 0; $i < 10; $i++)
{
	$clan = new CoC_Clan($results->items[$i]->tag);
	echo $clan->getName() . "<br/>";
}
?>