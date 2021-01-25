<?php

class ArrayTools
{
    public static function get(array $arr, $index)
    {
        if(isset($arr[$index]))
        {
            return $arr[$index];
        }
        
        return null;
    }
}
