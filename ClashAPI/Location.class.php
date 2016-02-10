<?php

class CoC_Location
{
	protected $api;
	protected $locationId;
	protected $location = NULL;
    
	/**
	 * Constructor of CoC_Location
	 * 
	 * @param $locationId
	 */
	public function __construct($location)
	{
		$this->api = new ClashOfClans();
		if(is_object($location))
		{
			$this->location = $location;
		}
		else
		{
			$this->locationId = $location;
			$this->getLocation();
		}
	}
    
	/**
	 * Gets an stdClass containing location-information
	 *
	 * @return stdClass, location
	 */
	protected function getLocation()
	{
		if($this->location == NULL)
		{
			foreach ($this->api->getLocationList()->items as $location) 
			{
				if ($location->id == $this->locationId) 
				{
					$this->location = $location;
					return $this->location;
				}
			}
			return 0;
		}
		else
		{
			return $this->location;
		}
	}
    
	/**
	 * Sets the location by providing it's exact name
	 *
	 * @param string, location name
	 * @return bool, success or fail
	 */
	public function setLocationByName($name)
	{
		foreach ($this->api->getLocationList()->items as $location) 
		{
			if ($location->name == $name) 
			{
				$this->locationId = $location->id;
				$this->location = $location;
				return 1;
			}
		}
		return 0;
	}

	/**
	 * Sets the location by providing it's country code
	 *
     * @param string
     * @return bool
     */
	public function setLocationByCode($cc)
	{
		foreach ($this->api->getLocationList()->items as $location) 
		{
			if ($location->countryCode == $cc) 
			{
				$this->locationId = $location->id;
				$this->location = $location;
				return 1;
			}
		}
		return 0;
	}

	/**
	 * Gets the location ID
	 *
	 * @return int
	 */
	public function getLocationId()
	{
		return $this->getLocation()->id;
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