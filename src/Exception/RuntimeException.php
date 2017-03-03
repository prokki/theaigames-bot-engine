<?php

namespace Prokki\TheaigamesBotEngine\Exception;

/**
 * Class RuntimeException
 *
 * @package Prokki\TheaigamesBotEngine
 */
class RuntimeException extends \Exception
{
	/**
	 * @return RuntimeException
	 */
	public static function EnvironmentFactoryNotInitialized()
	{
		return new self("The environment factory class was not initialized yet.\nPlease call EnvironmentFactory::Init() first.");
	}

	/**
	 * @return RuntimeException
	 */
	public static function EnvironmentFactoryAlreadyInitialized()
	{
		return new self("The environment factory was already initialized.\nPlease call EnvironmentFactory::Init() only once.");
	}
}