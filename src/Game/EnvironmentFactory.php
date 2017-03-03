<?php

namespace Prokki\TheaigamesBotEngine\Game;

use Prokki\TheaigamesBotEngine\Exception\RuntimeException;

abstract class EnvironmentFactory
{
	/**
	 * @var static
	 */
	private static $_Instance = null;

	/**
	 * @return static
	 *
	 * @throws RuntimeException
	 */
	public static function Init()
	{
		if( !is_null(self::$_Instance) )
		{
			throw RuntimeException::EnvironmentFactoryAlreadyInitialized();
		}

		self::$_Instance = new static();

		return self::$_Instance;
	}

	/**
	 * @return static
	 *
	 * @throws RuntimeException
	 */
	public static function Get()
	{
		if( is_null(self::$_Instance) )
		{
			throw RuntimeException::EnvironmentFactoryNotInitialized();
		}

		return self::$_Instance;
	}

	/**
	 * EnvironmentFactory constructor.
	 *
	 * Singleton: The constructor __construct() is declared as protected to prevent creating a new instance outside of the class via the new operator.
	 */
	protected function __construct() { }

	/**
	 * Singleton: The magic method __clone() is declared as private to prevent cloning of an instance of the class via the clone operator.
	 */
	private function __clone() { }

	/**
	 * Singleton: The magic method __wakeup() is declared as private to prevent unserializing of an instance of the class via the global function unserialize() .
	 */
	private function __wakeup() { }

	/**
	 * @return Environment
	 */
	abstract public function newEnvironment();
}