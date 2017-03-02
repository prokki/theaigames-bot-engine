<?php

namespace Prokki\TheaigamesBotEngine\Util;

/**
 *
 * @package Prokki\TheaigameBotEngine
 */
class Debugger
{
	/**
	 * @var Debugger
	 */
	private static $_Instance = null;

	/**
	 * @var resource
	 */
	private $_debugFileHandler = false;

	/**
	 * @param string $path
	 *
	 * @return Debugger
	 */
	public static function Init($path = '')
	{
		if( !is_null(self::$_Instance) )
		{
			// TODO error
		}

		self::$_Instance = new static($path);

		return self::$_Instance;
	}

	public static function Shutdown()
	{
		unset(self::$_Instance);

		self::$_Instance = null;
	}

	/**
	 * @param string $string
	 */
	public static function Log($string)
	{
		if( !is_null(self::$_Instance) )
		{
			self::$_Instance->addLog($string);
		}
	}

	protected function __construct($path = '')
	{
		$this->_debugFileHandler = false;

		if( !empty($path) )
		{
			$this->_debugFileHandler = fopen($path, 'w+');

			// TODO test writeable!
		}
	}

	public function __destruct()
	{
		if( is_resource($this->_debugFileHandler) )
		{
			fclose($this->_debugFileHandler);
		}
	}


	/**
	 * @param string $string
	 */
	public function addLog($string)
	{
		if( is_resource($this->_debugFileHandler) )
		{
			fwrite($this->_debugFileHandler, $string);
		}
	}
}