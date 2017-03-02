<?php

namespace Prokki\TheaigamesBotEngine\Command;

use Prokki\TheaigamesBotEngine\Exception\ParserException;

/**
 * Interface Parser
 *
 * @package Prokki\TheaigamesBotEngine
 */
interface Parser
{
	/**
	 * @param $string
	 *
	 * @return Command
	 *
	 * @throws ParserException
	 */
	public function run($string);
}