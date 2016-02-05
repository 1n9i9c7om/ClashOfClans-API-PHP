# ClashOfClans-API-PHP

This is a wrapper for SuperCell's official Clash Of Clans-API located at https://developer.clashofclans.com/#/

Before trying to use this, you have to create an account and request a token on their website. After that, **change the token** located in the **API.class.php** to yours.

I'm working on the documentation, for now, you have to figure out how to use it for yourself. 
There's an example in the repository, though.

Live-Demo of example: http://1n9i9c7om.com/coc/test.php
Keep in mind I'm not a web designer, this page is just to show how this wrapper works.

#Requirements
PHP with cURL support.

# ClashOfClans-API-PHP

**API.class.php** - gets the information from the API and sends the requests to Supercell's Servers.  
* \#sendRequest(\$url);  
* +searchClanByName(\$searchString);  
* +getClanByTag(\$tag);  
* +getClanMembersByTag(\$tag);  
* +getLocationList();  
* +getLocationInfo();  
* +getLeagueList();  
* +getRankList();  

**Clan.class.php** - gets information about a clan by using a tag  
* +__construct(\$tag);  
* +getTag();  
* +getName();  
* +getDescription();  
* +getType();  
* +getLocationId();  
* +getBadgeUrl(\$size);  
* +getWarFrequency();  
* +getLevel();  
* +getWarWins();  
* +getPoints();  
* +getRequiredTrophies();  
* +getMemberCount();  
* +getMemberByIndex(\$index);  
* +getAllMembers();  
* +getMemberByName(\$name);  
  
**League.class.php** - gets information about a league by using a league ID.  
* +__construct(\$leagueId);  
* +getLeague();  
* +setLeagueByName();  
* +getLeagueIcon(\$size);  
  
**Location.class.php** - gets information about a location by using a location ID.  
* +__construct(\$locationId);  
* +getLocation();  
* +setLocationByName();  
* +getLocationName();  
* +isCountry();  
* +getCountryCode();  
  
**Member.class.php** - gets information about a location by using an stdClass returned by *Clan.class.php*  
* +__construct($memberObj);  
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