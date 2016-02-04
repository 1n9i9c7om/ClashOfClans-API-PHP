<?php

class CoC_Member
{
	protected $memberObj;

	function __construct($memberObj)
	{
		$this->memberObj = $memberObj;
	}

	public function getName()
	{
		return $this->memberObj->name;
	}

	public function getRole()
	{
		return $this->memberObj->role;
	}

	public function getLevel()
	{
		return $this->memberObj->expLevel;
	}

	public function getLeagueId()
	{
		return $this->memberObj->league->id;
	}

	public function getTrophies()
	{
		return $this->memberObj->trophies;
	}

	public function getClanRank()
	{
		return $this->memberObj->clanRank;
	}

	public function getPreviousClanRank()
	{
		return $this->memberObj->previousClanRank;
	}

	public function getDonations()
	{
		return $this->memberObj->donations;
	}

	public function getDonationsReceived()
	{
		return $this->memberObj->donationsReceived;
	}
}

?>