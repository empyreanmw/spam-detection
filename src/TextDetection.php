<?php


namespace empyrean\spam_detection;


use empyrean\spam_detection\traits\Inspectable;

class TextDetection implements DetectionInterface
{
    use Inspectable;

    protected $body;
    protected $detectionMethods;
    protected $errorMessages = [];

    public function __construct($subject)
    {
        $this->body = $subject;
        $this->detectionMethods = $this->setDetectionMethods();
    }
}
