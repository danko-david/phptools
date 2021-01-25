<?php

namespace PhpTools\Primitives;

class StringTools
{
	public static function getFirstBetween($src, $before, $after, $def = null)
	{
		$min = strpos($src, $before);
		if(false === $min)
		{
			return $def;
		}
		$min += strlen($before);

		$max = strpos($src, $after, $min);
		if(false === $max)
		{
			return $def;
		}

		return substr($src, $min, $max-$min);
	}

	public static function startsWith($haystack, $needle)
	{
		$length = strlen($needle);
		return (substr($haystack, 0, $length) === $needle);
	}

	public static function endsWith($haystack, $needle)
	{
		$length = strlen($needle);
		if ($length == 0) {
			return true;
		}

		return (substr($haystack, -$length) === $needle);
	}

	public static function isNullOrTrimEmpty($str)
	{
		return null == $str || 0 == strlen(trim($str));
	}
	
	public static function generateRandomString($length = 10)
	{
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for($i=0;$i<$length;$i++)
	    {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
}
