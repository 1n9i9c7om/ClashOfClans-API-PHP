<?php

class CoC_Location
{
    protected $api;
    protected $locationId;
    
    public function __construct($locationId)
    {
        $this->api        = new ClashOfClans();
        $this->locationId = $locationId;
    }
    
    protected function getLocation()
    {
        $location;
        foreach ($this->api->getLocationList() as $location) 
        {
            if ($location->id == $this->locationId) 
            {
                return $league;
            }
        }
        return 0;
    }
    
    public function setLocationByName($name)
    {
        foreach ($this->api->getLocationList() as $location) 
        {
            if ($location->name == $name) 
            {
                $this->locationId = $league->id;
                return 1;
            }
        }
        return 0;
    }
    
    public function getLocationName()
    {
        return $this->getLocation()->name;
    }

    public function isCountry()
    {
    	return $this->getLocation()->isCountry;
    }

    public function getCountryCode()
    {
    	if($this->isCountry())
    	{
    		return $this->getLocation()->countryCode;
    	}
    	else
    	{
    		return "nA";
    	}
    }
}

?>