<?php

namespace Prokki\TheaigamesBotEngine;

use Prokki\TheaigamesBotEngine\Bot\Bot;
use Prokki\TheaigamesBotEngine\Command\Computable;
use Prokki\TheaigamesBotEngine\Util\Debugger;

require_once __DIR__ . '/functions.php';

if( !defined('PROKKIBOT_MAX_SERVER_TIMEOUT') )
{
	define('PROKKIBOT_MAX_SERVER_TIMEOUT', 60); // [s]
}

/**
 * Class Client
 *
 * @package Prokki\TheaigameBotEngine
 */
class Client
{

	/**
	 * @var resource
	 */
	protected $_input = null;

	/**
	 * @var resource
	 */
	protected $_output = null;

	/**
	 * @var Bot
	 */
	protected $_bot = null;

	/**
	 * Warlight2Bot constructor.
	 *
	 * @param Bot $bot
	 */
	public function __construct(Bot $bot)
	{
		global $argc, $argv;

		$this->_parseCliArguments($argc, $argv);

		Debugger::Log("test\n");

		$this->_bot = $bot;

		$this->_input  = fopen('php://stdin', 'r');
		$this->_output = fopen('php://stdout', 'w');


	}

	/**
	 * Method is not testable (STDIN/STDOPUT problem),see http://stackoverflow.com/questions/15957533/how-test-stdin-in-phpunit or
	 * http://stackoverflow.com/questions/9158155/how-to-write-unit-tests-for-interactive-console-app
	 *
	 * @todo throw error one false!
	 *
	 */
	public function run()
	{
		// streams
		$read = [$this->_input];

		$write  = null;
		$except = null;

		// stream ends?
		$end_of_stream = false;

		do
		{

			$changed_streams = stream_select($read, $write, $except, PROKKIBOT_MAX_SERVER_TIMEOUT);

			if( false === $changed_streams )
			{
				die();
			}

			foreach( $read as $_handle )
			{

				$time_start = get_microtime_float();

				$string = trim(fgets($_handle));

				if( empty($string) )
				{
					$end_of_stream = true;
					continue;
				}

				Debugger::Log(sprintf("received: %s\n", $string));

				$end_of_stream = feof($_handle);

//				try
//				{

				$command = $this->_bot->getParser()->run($string);

				//				Debugger::Log(get_class($command) . "\n");

				$command->apply($this->_bot);

//					Debugger::Log(sprintf("Round: %d, Remaining: %d, Last: %d\n",
//						$this->_environment->getCurrentRoundNo(),
//						$this->_environment->getRemainingRounds(),
//						$this->_environment->isLastRound()
//					));

				if( $command->isComputable() )
				{

					/** @var Computable $command */
					$send = $command->compute($this->_bot);

					$duration = ( get_microtime_float() - $time_start );
//					Bot::Debug("TIME: " . $duration . "\n");

					if( defined('PROKKIBOT_MIN_COMPUTATION_TIME') && !empty(PROKKIBOT_MIN_COMPUTATION_TIME) && $duration < ( PROKKIBOT_MIN_COMPUTATION_TIME * 1000 ) )
					{
						usleep(( PROKKIBOT_MIN_COMPUTATION_TIME * 1000 ) - $duration); // wait until at least 1ms are gone

//						$duration = ( get_microtime_float() - $time_start );
//						Client::Debug("TIME: " . $duration . "\n");
					}

					fwrite($this->_output, $send . "\n");

					Debugger::Log(sprintf("send: %s\n", $send));
				}
//
//				}
//				catch( \Exception $exception )
//				{
//					Debugger::Log(sprintf("Exception:%s\n\n%s", $exception->getMessage(), $exception->getTraceAsString()));
//
//					$send = "Aborting due an error :-(";
//
//					fwrite($this->_output, $send . "\n");
//
//					Debugger::Log(sprintf("send: %s\n", $send));
//
//					$end_of_stream = true;
//				}

			}
		}
		while( !$end_of_stream && !empty($changed_streams) );

		Debugger::Log("MEM: " . size_to_readable_string(memory_get_usage(true)) . "\n");

		Debugger::Log("END!\n");

		fclose($this->_input);

	}

	/**
	 *
	 * @param integer $argc
	 * @param string  $argv
	 */
	protected function _parseCliArguments($argc, $argv)
	{
		$this->_parseCliArgumentHelp($argv);
		$this->_parseCliArgumentDebug($argv);
	}

	/**
	 *
	 * @param string $argv
	 */
	protected function _parseCliArgumentHelp($argv)
	{
		if( count(array_diff(['--help', '-h'], $argv)) < 2 )
		{
			$this->_exitWithUsage($argv);
		}
	}

	/**
	 *
	 * @param string $argv
	 *
	 * @return Debugger
	 */
	protected function _parseCliArgumentDebug($argv)
	{
		if( count(array_diff(['--debug', '-d'], $argv)) === 2 )
		{
			return Debugger::Init();
		}

		$arg_debug_key = array_search('--debug', $argv);

		if( false === $arg_debug_key )
		{
			$arg_debug_key = array_search('-d', $argv);
		}

		if( !array_key_exists($arg_debug_key + 1, $argv) )
		{
			$this->_exitWithUsage($argv);
		}

		$file = trim($argv[ $arg_debug_key + 1 ]);

		if( empty($file) )
		{
			$this->_exitWithUsage($argv);
		}

		return Debugger::Init($file);
	}

	protected function _exitWithUsage($argv)
	{
		printf("usage: php %s [--debug FILE]\n", basename(realpath($argv[ 0 ])));
		exit(0);
	}

}