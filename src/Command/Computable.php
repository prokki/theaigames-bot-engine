<?php

namespace Prokki\TheaigamesBotEngine\Command;

use Prokki\TheaigamesBotEngine\Bot\Bot;

/**
 * Interface Computable
 *
 * @package Prokki\TheaigamesBotEngine
 */
interface Computable
{
	/**
	 * @param Bot $bot
	 *
	 * @return String
	 */
	public function compute(Bot $bot);
}