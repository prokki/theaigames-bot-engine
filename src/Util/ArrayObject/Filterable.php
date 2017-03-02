<?php

namespace Prokki\TheaigamesBotEngine\Util\ArrayObject;

/**
 * Class Filterable
 *
 * @package Prokki\TheaigameBotEngine
 */
trait Filterable
{
	/**
	 *
	 *
	 * @param callable $callable
	 *
	 * @return static
	 */
	public function filter($callable)
	{
		$filtered_object = new static();

		foreach( $this as $_offset => $_object )
		{
			if( call_user_func($callable, $_object) )
			{
				$filtered_object->offsetSet($_offset, $_object);
			}
		}

		return $filtered_object;
	}
}