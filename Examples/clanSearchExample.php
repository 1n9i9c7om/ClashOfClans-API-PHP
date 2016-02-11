<?php

require_once './ClashAPI/API.class.php';

$api = new ClashOfClans();
$location = new CoC_Location(0);
$location->setLocationByName("Germany");

$params = array(
	'name' => 'fox',
	'minMembers' => 25,
	'locationId' => $location->getLocationId()
	);

$clans = $api->searchClan($params);

echo "All Clans that meet the following criteria: name => fox, minMembers => 25, locationId = [Germany's Location ID] <br/>" . PHP_EOL;

foreach ($clans->items as $clan) {
	$clan = neW CoC_Clan($clan);
	echo "<img src=\"".$clan->getBadgeUrl("small")."\"> ".$clan->getName() . "<br/>" . PHP_EOL;
}


?>