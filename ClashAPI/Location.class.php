<?php

class CoC_Location
{
    protected $api;
    protected $locationId;
    
    /**
    * Constructor of CoC_Location
    * 
    * @param $locationId
    */
    public function __construct($locationId)
    {
        $this->api        = new ClashOfClans();
        $this->locationId = $locationId;
    }
    
    /**
     * Gets an stdClass containing location-information
     *
     * @return stdClass, location
     */
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
    
    /**
     * Sets the location by providing it's exact name
     *
     * @param string, location name
     * @return bool, success or fail
     */
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
    
    /**
     * Gets the location name
     *
     * @return string, name
     */
    public function getLocationName()
    {
        return $this->getLocation()->name;
    }

    /**
     * Check whether the given location is a country or a region
     *
     * @return bool
     */
    public function isCountry()
    {
    	return $this->getLocation()->isCountry;
    }

    /**
     * Gets the country code for the given location
     *
     * @return string, country code
     */
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