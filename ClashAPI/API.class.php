<?php

require_once "League.class.php";
require_once "Location.class.php";
require_once "Clan.class.php";
require_once "Member.class.php";
require_once "Warlog.class.php";
require_once "LogEntry.class.php";

/**
 * Class to get JSON-decoded arrays containing information provided by SuperCell's official Clash of Clans API located at https://developer.clashofclans.com
 */

class ClashOfClans
{
	private $_apiKey = "Change_This_To_Your_Token";
	
	/**
	 * Send a Request to SuperCell's Servers and contains the authorization-Token.
	 *
	 * @param string $url
	 * @return string; response from API (json)
	 */
	protected function sendRequest($url)
	{
		$ch = curl_init(); 
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  			'authorization: Bearer '.$this->_apiKey // 
		));
		$output = curl_exec($ch);
		curl_close($ch); 

		return $output;
	}

	/**
	 * Search all clans by name
	 *
	 * @param $searchString, the clan name, e.g. foxforcefürth
	 * @return object, search results.
	 */
	public function searchClanByName($searchString)
	{
		$json = $this->sendRequest("https://api.clashofclans.com/v1/clans?name=".urlencode($searchString));
		return json_decode($json);
	}

	/** 
	 * Search for clans by using multiple parameters
	 * 
	 * @param array
	 * @return object
	 */
	public function searchClan($parameters)
	{
		/*
		Array can have these indexes: 
		* name (string)
		* warFrequency (string, {"always", "moreThanOncePerWeek", "oncePerWeek", "lessThanOncePerWeek", "never", "unknown"})
		* locationId (integer)
		* minMembers (integer)
		* maxMembers (integer)
		* minClanPoints (integer)
		* minClanLevel (integer)
		* limit (integer)
		* after (integer)
		* before (integer)
		For more information, take a look at the official documentation: https://developer.clashofclans.com/#/documentation
		*/

		$json = $this->sendRequest("https://api.clashofclans.com/v1/clans?".http_build_query($parameters));
		return json_decode($json);
	}


	/**
	 * Get information of a clan
	 *
	 * @param $tag, clantag. (e.g. #22UCCU0J)
	 * @return object, clan information.
	 */
	public function getClanByTag($tag) //#22UCCU0J = foxforcefürth
	{
		$json = $this->sendRequest("https://api.clashofclans.com/v1/clans/".urlencode($tag));
		return json_decode($json);
	}

	/**
	 * Get information about the membersof a clan
	 *
	 * @param $tag, clantag. (e.g. #22UCCU0J)
	 * @return object, member information.
	 */
	public function getClanMembersByTag($tag)
	{
		$json = $this->sendRequest("https://api.clashofclans.com/v1/clans/".urlencode($tag)."/members");
		return json_decode($json);
	}

	/**
	 * Get a list of all locations supported by SuperCell's Clan-System
	 *
	 * @return object, all locations.
	 */
	public function getLocationList()
	{
		$json = $this->sendRequest("https://api.clashofclans.com/v1/locations");
		return json_decode($json);
	}

	/**
	 * Get information about a location by providing it's id.
	 *
	 * @param $locationId
	 * @return object, location info.
	 */
	public function getLocationInfo($locationId) //32000094 = Germany
	{
		$json = $this->sendRequest("https://api.clashofclans.com/v1/locations/".$locationId);
		return json_decode($json);
	}

	/**
	 * Get information about all leages.
	 *
	 * @return object, league info.
	 */
	public function getLeagueList()
	{
		$json = $this->sendRequest("https://api.clashofclans.com/v1/leagues");
		return json_decode($json);
	}

	/**
	 * Get ranklist information about players or clans
	 *
	 * @param $locationId (tip: 32000006 is "International")
	 * @param (optional) $clans
	 * @return object, location info.
	 */
	public function getRankList($locationId, $clans = false) //if clans is not set to true, return player ranklist
	{
		if ($clans)
		{
			$json = $this->sendRequest("https://api.clashofclans.com/v1/locations/".$locationId."/rankings/clans");
		}
		else
		{
			$json = $this->sendRequest("https://api.clashofclans.com/v1/locations/".$locationId."/rankings/players");
		}
		return json_decode($json);
	}
	
	/**
	 * Get whether the war log of a specific clan is public or not 
	 *
	 * @param $tag, clan tag
	 * @return bool, warlog public yes/no.
	 */
	public function isWarlogPublic($tag)
	{
		$json = $this->sendRequest("https://api.clashofclans.com/v1/clans/".urlencode($tag)."/warlog");
		$logInfo = json_decode($json);
		if(property_exists($logInfo, "reason"))
		{
			if($logInfo->reason == "accessDenied")
			{
				return false;
			}
		}
		return true;
	}
	
	/**
	 * Get a clan's warlog by specifying it's clantag
	 *
	 * @param $tag, clan tag
	 * @param (optional) $parameters array, other parameters (before, after, limit)
	 * @return object, warlog. Dummy warlog when warlog not public.
	 */
	public function getWarlog($tag, $parameters = "")
	{
		if($this->isWarlogPublic($tag))
		{
			$json = $this->sendRequest("https://api.clashofclans.com/v1/clans/".urlencode($tag)."/warlog?".http_build_query($parameters));
			return json_decode($json);
		}
		else
		{
			//dummy warlog:
			return json_decode('{
			  "items": [
				{
				  "result": "win",
				  "endTime": "20160803T103621.000Z",
				  "teamSize": 0,
				  "clan": {
					"tag": "#22UCCU0J",
					"name": "foxforce",
					"badgeUrls": {
					  "small": "https://api-assets.clashofclans.com/badges/70/5tEhjxjRbdef_mG_PGehpowUmLJU4qPnY7zQJPv1Lj0.png",
					  "large": "https://api-assets.clashofclans.com/badges/512/5tEhjxjRbdef_mG_PGehpowUmLJU4qPnY7zQJPv1Lj0.png",
					  "medium": "https://api-assets.clashofclans.com/badges/200/5tEhjxjRbdef_mG_PGehpowUmLJU4qPnY7zQJPv1Lj0.png"
					},
					"clanLevel": 0,
					"attacks": 0,
					"stars": 0,
					"destructionPercentage": 0,
					"expEarned": 0
				  },
				  "opponent": {
					"tag": "#22UCCU0J",
					"name": "foxforce",
					"badgeUrls": {
					  "small": "https://api-assets.clashofclans.com/badges/70/LGoHdPrA6OiVcKYzDcIiF7SV8kWW1qd-EhWkvGPsARM.png",
					  "large": "https://api-assets.clashofclans.com/badges/512/LGoHdPrA6OiVcKYzDcIiF7SV8kWW1qd-EhWkvGPsARM.png",
					  "medium": "https://api-assets.clashofclans.com/badges/200/LGoHdPrA6OiVcKYzDcIiF7SV8kWW1qd-EhWkvGPsARM.png"
					},
					"clanLevel": 0,
					"stars": 0,
					"destructionPercentage": 0
				  }
				}
			  ],
			  "paging": {
				"cursors": {
				  "after": "0"
				}
			  }
			}');
		}
	}
};

?>