<?php

namespace Prokki\TheaigamesBotEngine\Command;

use Prokki\TheaigamesBotEngine\Bot\Bot;

/**
 * Class Command
 *
 * @package Prokki\TheaigamesBotEngine
 */
abstract class Command
{

	/**
	 * @param Bot $bot
	 */
	abstract public function apply(Bot $bot);

	/**
	 * Returns `true` if the command is computable (has method `compute()`, see interface {@see Computable), else `false`.
	 *
	 * @return boolean
	 */
	public function isComputable()
	{
		return in_array(Computable::class, class_implements($this));
	}

}