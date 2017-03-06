<?php

namespace Prokki\TheaigamesBotEngine\Command;

use Prokki\TheaigamesBotEngine\Bot;

/**
 * A EmptyReceivableCommand command can be assigned to requests, that do not need to be handled.
 *
 * Normally this command class is for testing or new request commands.
 *
 * @package Prokki\TheaigamesBotEngine
 */
class EmptyReceivableCommand extends Command
{
	/**
	 * The apply method is empty.
	 *
	 * @inheritdoc
	 */
	public function apply(Bot $bot) { }
}