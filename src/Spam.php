<?php
namespace empyrean\spam_detection;

class Spam
{
    public function check(DetectionInterface $detection)
    {
        return $detection->inspect();
    }
}