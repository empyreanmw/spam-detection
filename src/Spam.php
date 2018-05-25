<?php
namespace empyrean\spam_detection;

use Session\Session;

class Spam
{
    public static function check(DetectionInterface $detection)
    {
        return $detection->inspect();
    }

    public static function getErrors()
    {
        return Session::instance()->get('errors');
    }
}