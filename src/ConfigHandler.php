<?php


namespace empyrean\spam_detection;


class ConfigHandler
{
    protected $file;
    /**
     * ConfigHandler constructor.
     */
    public function __construct()
    {
        $this->file = dot(require "Config.php");
    }

    public function get($parameter)
    {
        return $this->file->get($parameter);
    }
}