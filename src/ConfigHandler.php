<?php


namespace empyrean\spam_detection;


class ConfigHandler
{
    public static function get($parameter)
    {
        return dot(require "Config.php")->get($parameter);
    }
}