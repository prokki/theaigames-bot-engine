<?php

namespace Prokki\TheaigamesBotEngine\Game;

abstract class RoundBasedEnvironmentFactory extends EnvironmentFactory
{
	/**
	 * @param integer $round_no
	 *
	 * @return Round
	 */
	public function newRound($round_no)
	{
		return new Round($round_no);
	}
}