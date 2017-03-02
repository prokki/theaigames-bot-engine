<?php

namespace Prokki\TheaigamesBotEngine\Util\ArrayObject;

/**
 * Class Loadable
 *
 * @package Prokki\TheaigameBotEngine
 */
trait Loadable
{
	/**
	 * @var boolean
	 *
	 */
	protected $_loaded = false;

	/**
	 *
	 */
	public function setLoaded()
	{
		$this->_loaded = true;
	}

	/**
	 * @return boolean
	 *
	 */
	public function isLoaded()
	{
		return $this->_loaded;
	}
}