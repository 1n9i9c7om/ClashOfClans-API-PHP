# ClashOfClans-API-PHP
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/1n9i9c7om/ClashOfClans-API-PHP/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/1n9i9c7om/ClashOfClans-API-PHP/?branch=master) [![Build Status](https://scrutinizer-ci.com/g/1n9i9c7om/ClashOfClans-API-PHP/badges/build.png?b=master)](https://scrutinizer-ci.com/g/1n9i9c7om/ClashOfClans-API-PHP/build-status/master)  

This is a wrapper for SuperCell's official Clash Of Clans-API located at https://developer.clashofclans.com/#/

Before trying to use this, you have to create an account and request a token on their website. After that, **change the token** located in the **API.class.php** to yours.

I'm working on the documentation, for now, you have to figure out how to use it for yourself. 
There's an example in the repository, though.

Live-Demo of example: http://1n9i9c7om.com/coc/test.php
Keep in mind I'm not a web designer, this page is just to show how this wrapper works.

## Requirements
PHP 5 or higher with cURL support.

## Usage
### Search for clans
```php
$api = new ClashOfClans();
$results = $api->searchClanByName("foxforcefürth"); //returns an array containing all search results
$clan = new CoC_Clan($results->items[0]); //gets the first result from the array
```

### Get Clan Details
```php
$clan = new CoC_Clan("#22UCCU0J"); 

$clan->getName(); //returns foxforcefürth 
$clan->getLevel(); //returns 5
```

### Get information about the clan leader
```php
$clan = new CoC_Clan("#22UCCU0J");
$members = $clan->getAllMembers();

foreach($members as $member)
{
	$member = new CoC_Member($member); //convert member into a CoC_Member object
	if($member->getRole() == "leader")
	{
		echo $member->getName(); //returns Lalato;
		echo $member->getLevel(); //returns 131 
		break; //leave the foreach after the leader was found, as there's only one per clan
	}
}
```

Some more example scripts are included in the "Examples"-folder inside this repository.

## Documentation

**API.class.php** - gets the information from the API and sends the requests to Supercell's Servers.  
* #sendRequest($url);  
* +searchClanByName($searchString);  
* +searchClan($parameters);
* +getClanByTag($tag);  
* +getClanMembersByTag($tag);  
* +getLocationList();  
* +getLocationInfo();  
* +getLeagueList();  
* +getRankList();  

**Clan.class.php** - gets information about a clan by using a tag  
* +__construct($tagOrClass);  
* #getClan();
* +getTag();  
* +getName();  
* +getDescription();  
* +getType();  
* +getLocationId();  
* +getBadgeUrl($size);  
* +getWarFrequency();  
* +getLevel();  
* +getWarWins();  
* +getWarWinStreak();
* +getPoints();  
* +getRequiredTrophies();  
* +getMemberCount();  
* +getMemberByIndex($index);  
* +getAllMembers();  
* +getMemberByName($name);  
  
**League.class.php** - gets information about a league by using a league ID.  
* +__construct($league);  
* #getLeague();
* +setLeagueByName();  
* +getLeagueIcon(\$size);  
  
**Location.class.php** - gets information about a location by using a location ID.  
* +__construct($location);  
* #getLocation();
* +setLocationByName();  
* +setLocationByCode();
* +getLocationName();  
* +isCountry();  
* +getCountryCode();  
  
**Member.class.php** - gets information about a location by using an stdClass returned by *Clan.class.php*  
* +__construct($memberObj);  
* +getTag();
* +getName();  
* +getRole();  
* +getLevel();  
* +getLeagueId();  
* +getTrophies();  
* +getClanRank();  
* +getPreviousClanRank();  
* +getDonations();  
* +getDonationsReceived();  
  
\# means protected  
\+ means public
