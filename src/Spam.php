<?php
namespace empyrean\spam_detection;

use Session\Session;

class Spam
{
    public function check(DetectionInterface $detection)
    {
        return $detection->inspect();
    }

    public function getErrors()
    {
        return Session::instance()->get('errors');
    }
}