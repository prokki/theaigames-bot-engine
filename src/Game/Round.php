<?php

namespace Prokki\TheaigamesBotEngine\Game;

/**
 * Class Round
 *
 * @package Prokki\TheaigamesBotEngine
 */
class Round
{
	/**
	 * @var integer
	 */
	protected $_no = 0;

	/**
	 * Round constructor.
	 *
	 * @param     $no
	 */
	public function __construct($no)
	{
		$this->_no = $no;
	}
}