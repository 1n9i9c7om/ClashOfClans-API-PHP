<?php
require_once "./ClashAPI/API.class.php";

$foxforce = new CoC_Clan("#22UCCU0J");
echo "<img src=\"".$foxforce->getBadgeUrl("small")."\" /><h1 style='display:inline'>".$foxforce->getName()."</h1> " . $foxforce->getTag() . " - Level: " . $foxforce->getLevel() . "<br/>";

echo "<table><tr><th>#</th><th>Name</th><th>Rank</th><th>Trophies</th><th>Donations</th><th>Donations Received</th><th>Donation Ratio</th></tr>";
foreach ($foxforce->getAllMembers() as $clanmember) 
{
	$member = new CoC_Member($clanmember);
	$donationsReceivedCalc = $member->getDonationsReceived();
	if($donationsReceivedCalc == 0) $donationsReceivedCalc++;

	$ratio = $member->getDonations() / $donationsReceivedCalc;

	echo "<tr><td>".$member->getClanRank()."</td><td>".$member->getName()."</td><td>".$member->getRole()."</td><td>".$member->getTrophies()."</td><td>".$member->getDonations()."</td><td>".$member->getDonationsReceived()."</td><td>Donation-Ratio: ".number_format($ratio, 2)."</td></tr>";
}

?>
</table>
<br/>
Donation Ratio = donations made / donations received (if received = 0, use 1 instead to prevent errors)<br/>
admin = elder