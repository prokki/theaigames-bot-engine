<?php

namespace Prokki\TheaigamesBotEngine;

use Prokki\TheaigamesBotEngine\Command\Parser;
use Prokki\TheaigamesBotEngine\Game\Environment;

/**
 * Interface Bot
 *
 * @package Prokki\TheaigamesBotEngine
 */
interface Bot
{
	/**
	 * @return Environment
	 */
	public function getEnvironment();

	/**
	 * @return Parser
	 */
	public function getParser();
}