<?php

namespace Prokki\TheaigamesBotEngine\Util\ArrayObject;

/**
 * Trait GetOffsetable
 *
 * @package Prokki\TheaigameBotEngine
 */
trait GetOffsetable
{
	/**
	 * @return integer[]
	 */
	public function getOffsets()
	{
		$offsets = array();

		foreach( $this as $_offset => $_ )
		{
			array_push($offsets, $_offset);
		}

		return $offsets;
	}
}