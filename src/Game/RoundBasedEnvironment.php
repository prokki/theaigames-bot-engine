<?php

namespace Prokki\TheaigamesBotEngine\Game;

/**
 * Class RoundBasedEnvironment
 *
 * @package Prokki\TheaigamesBotEngine
 */
class RoundBasedEnvironment implements Environment
{
	/**
	 * current round number
	 *
	 * @var integer
	 */
	protected $_currentRoundNo = 0;

	/**
	 * amount of maximum rounds
	 *
	 * @var integer
	 */
	protected $_maxRounds = 0;

	/**
	 * @var \ArrayObject
	 */
	protected $_rounds = null;

	/**
	 * RoundBasedEnvironment constructor.
	 *
	 * @param integer $max_rounds amount of max rounds
	 */
	public function __construct($max_rounds = 0)
	{
		$this->setMaxRounds($max_rounds);

		$this->_rounds = new \ArrayObject();
		$this->_rounds->offsetSet($this->_currentRoundNo, $this->getNewRound());
	}

	protected function getNewRound()
	{
		return new Round($this->_currentRoundNo);
	}

	/**
	 * @return \ArrayObject
	 */
	public function getRounds()
	{
		return $this->_rounds;
	}

	/**
	 * Returns the actual (latest) round.
	 *
	 * @param integer $round_no
	 *
	 * @return Round
	 */
	public function getRound($round_no)
	{
		// TODO check if exists!
		return $this->_rounds->offsetGet($round_no);
	}

	/**
	 * Returns the current round.
	 *
	 * @return Round
	 */
	public function getCurrentRound()
	{
		// TODO check if exists!
		return $this->getRound($this->_currentRoundNo);
	}

	/**
	 * Returns the actual (latest) round number.
	 *
	 * @return integer
	 */
	public function getCurrentRoundNo()
	{
		return $this->_currentRoundNo;
	}

	/**
	 * Creates the next round and returns the new current round.
	 *
	 * @return Round
	 */
	public function addRound()
	{
		++$this->_currentRoundNo;

		$new_round = $this->getNewRound();

		$this->_rounds->offsetSet($this->_currentRoundNo, $new_round);

		return $new_round;
	}

	/**
	 * Returns the amount of remaing rounds.
	 *
	 * @return integer
	 */
	public function getRemainingRounds()
	{
		return $this->_maxRounds - $this->_currentRoundNo;
	}

	/**
	 * Returns `true` if the current round is the last round, else `false`.
	 *
	 * @return integer
	 */
	public function isLastRound()
	{
		return $this->getRemainingRounds() === 0;
	}

	/**
	 * @param integer $maxRounds
	 *
	 * @return RoundBasedEnvironment
	 *
	 * @author Falko Matthies <falko.ma@web.de>
	 */
	public function setMaxRounds($maxRounds)
	{
		$this->_maxRounds = $maxRounds;
		return $this;
	}

}