<?php

class CoC_League
{
    protected $api;
    protected $leagueId;
    
    public function __construct($leagueId)
    {
        $this->api      = new ClashOfClans();
        $this->leagueId = $leagueId;
    }
    
    protected function getLeague()
    {
        $league;
        foreach ($this->api->getLeagueList() as $league) 
        {
            if ($league->id == $this->leagueId) 
            {
                return $league;
            }
        }
        return 0;
    }
    
    public function setLeagueByName($name)
    {
        foreach ($this->api->getLeagueList() as $league) 
        {
            if ($league->name == $name) 
            {
                $this->leagueId = $league->id;
                return 1;
            }
        }
        return 0;
    }
    
    public function getLeagueName()
    {
        return $this->getLeague()->name;
    }
    
    public function getLeagueIcon($size = "") //small, tiny, medium
    {
        $league = $this->getLeague();
        switch ($size) {
            case "small":
                return $league->iconUrls->small;
                break;
            case "medium":
                return $league->iconUrls->medium;
                break;
            case "tiny":
                return $league->iconUrls->tiny;
                break;
            default:
                return $league->iconUrls->small; //medium is not always available, so lets chose small on default
                break;
        }
    }
}

?>