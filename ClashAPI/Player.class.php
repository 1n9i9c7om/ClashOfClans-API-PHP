<?php
	class CoC_Player
	{
		protected $api;
		protected $tag; 
		protected $player = NULL;

		/**
		 * Constructor of CoC_Clan
		 * Either pass the clan tag or a stdClass containing all clan information.
		 */
		public function __construct($tag)
		{
			$this->api = new ClashOfClans();
			$this->tag = $tag;
			$this->getPlayer();
	   	}
		
		/**
		 * Sending requests over through API.class.php;
		 */
	   	protected function getPlayer()
	   	{
	   		if($this->player == NULL)
			{
				$this->player = $this->api->getPlayer($this->tag);
			}
			return $this->player;
	   	}

	   	/**
	   	 * Getting current player tag.
	   	 *
	   	 * @return string, tag
	   	 */
	   	public function getTag()
	   	{
	   		return $this->player->tag;
	   	}

	   	/**
	   	 * Getting current player name.
	   	 *
	   	 * @return string, name 
	   	 */
	   	public function getName()
	   	{
	   		return $this->player->name;
	   	}

	   	/**
	   	 * Getting current player townhall level.
	   	 *
	   	 * @return int, townhallLevel
	   	 */
	   	public function getTownhallLevel()
	   	{
	   		return $this->player->townhallLevel;
	   	}

	   	/**
	   	 * Getting current player's experience level.
	   	 *
	   	 * @return int, expLevel
	   	 */
	   	public function getExp()
	   	{
	   		return $this->player->expLevel;
	   	}

	   	/**
	   	 * Getting current player's trophy.
	   	 *
	   	 * @return int, trophy
	   	 */
	   	public function getTrophies()
	   	{
	   		return $this->player->trophies;
	   	}

	   	/**
	   	 * Getting current player's highest trophy count.
	   	 *
	   	 * @return int, highestTrophy
	   	 */
	   	public function getBestTrophies()
	   	{
	   		return $this->player->bestTrophies;
	   	}

	   	/**
	   	 * Getting current player's war stars.
	   	 *
	   	 * @return int, warStars
	   	 */
	   	public function getWarStars()
	   	{
	   		return $this->player->warStars;
	   	}

	   	/**
	   	 * Getting current player's defense/attack wins.
	   	 *
	   	 * @return int, attackWins/defenseWins
	   	 */
	   	public function getWins($attack = true)
	   	{
	   		if ($attack == true)
	   		{
	   			return $this->player->attackWins;
	   		}
	   		else
	   		{
	   			return $this->player->defenseWins;
	   		}
	   	}

	   	/**
	   	 * Getting current player's role.
	   	 *
	   	 * @return string, role
	   	 */
	   	public function getRole()
	   	{
	   		return $this->player->role;
	   	}

	   	/**
	   	 * Getting current player's donations.
	   	 *
	   	 * @return int, donations
	   	 */
	   	public function getDonations()
	   	{
	   		return $this->player->donations;
	   	}

	   	/**
	   	 * Getting current player's donations received.
	   	 *
	   	 * @return int, donationsReceived
	   	 */
	   	public function getDonationsReceived()
	   	{
	   		return $this->player->donationsReceived;
	   	}

	   	/**
	   	 * Getting player's clan details.
	   	 *
	   	 * @param string, detail (tag, badgeUrls, name, clanLevel)
	   	 */
	   	public function getPlayerClan($detail = "tag")
	   	{
	   		return $this->player->clan->$detail;
	   	}

	   	/**
	   	 * Getting player's league details.
	   	 *
	   	 * @param string, detail (id, name, iconUrls[small, tiny, medium])
	   	 */
	   	public function getLeague($detail = "name")
	   	{
	   		return $this->player->league->$detail;
	   	}

	   	/**
	   	 * Getting player's achievements by index.
	   	 *
	   	 * @param int, achievements
	   	 */
	   	public function getAchievements($achievement = 0)
	   	{
	   		return $this->player->achievements[$achievement];
	   	}

	   	/**
	   	 * Getting player's troops detail by index.
	   	 *
	   	 * @param int, troop (index)
	   	 */
	   	public function getTroops($troop = 0)
	   	{
	   		return $this->player->troops[$troop];
	   	}

	   	/**
	   	 * Getting player's spells detail by index.
	   	 *
	   	 * @param int, spell (index)
	   	 */
	   	public function getSpells($spell = 0)
	   	{
	   		return $this->player->spells[$spell];
	   	}
	}
?>