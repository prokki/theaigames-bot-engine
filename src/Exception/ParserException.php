<?php

namespace Prokki\TheaigamesBotEngine\Exception;

/**
 * Class ParserException
 *
 * @package Prokki\TheaigamesBotEngine
 */
class ParserException extends \Exception
{
	/**
	 * @param string $line
	 *
	 * @return ParserException
	 */
	public static function CommandLineNotParser($line)
	{
		return new self(sprintf("Command line \"%s\" not parseable.", str_replace("\n", "", $line)), 101);
	}

	/**
	 * @param string $line
	 *
	 * @return ParserException
	 */
	public static function CommandUnknown($line)
	{
		return new self(sprintf("Unknown or incomplete command received (\"%s\").\nPlease check the documentation.", str_replace("\n", "", $line)), 102);
	}

	/**
	 * @param string $line
	 *
	 * @return ParserException
	 */
	public static function CommandIncomplete($line)
	{
		return new self(sprintf("Unknown or incomplete command received (command \"%s\").", str_replace("\n", "", $line)), 103);
	}

	/**
	 * @param string $line
	 *
	 * @param string $hint [optional]
	 *
	 * @return ParserException
	 */
	public static function CommandMissingArguments($line, $hint = '')
	{
		return new self(sprintf("Some arguments are missing for command \"%s\").%s",
			str_replace("\n", '', $line),
			empty($hint) ? '' : sprintf("\n%s", $hint)
		), 104);
	}
}