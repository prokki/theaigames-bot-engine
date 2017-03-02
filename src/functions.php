<?php

namespace Prokki\TheaigamesBotEngine;

function size_to_readable_string($size)
{
	$unit = array('b', 'kb', 'mb', 'gb', 'tb', 'pb');
	return @round($size / pow(1024, ( $i = floor(log($size, 1024)) )), 2) . ' ' . $unit[ $i ];
}

function get_microtime_float()
{
	list($usec, $sec) = explode(" ", microtime());
	return ( (float) $usec + (float) $sec );
}
