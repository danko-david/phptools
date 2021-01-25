<?php

class ObjectTools
{
	public static function copyProperties($dst, $source, ...$props)
	{
		foreach($props as $prop)
		{
			$dst->{$prop} = $source->{$prop};
		}
	}
	
	public static function copyAllProperties($dst, $source)
	{
		foreach(get_object_vars($source) as $k => $v)
		{
			$dst->{$k} = $v;
		}
	}
}