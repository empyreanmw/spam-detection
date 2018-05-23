<?php


namespace empyrean\spam_detection;


class TextDetection implements DetectionInterface
{
    protected $body;
    protected $detectionMethods;
    protected $errorMessages = [];

    public function __construct($subject)
    {
        $this->body = $subject;
        $this->detectionMethods = config('text.detectionMethods');
    }

    public function inspect()
    {
        foreach ($this->detectionMethods as $methods) {
            $method = new $methods($this->body);
            if($method->detectSpam()) $this->errorMessages[] = $method->getErrorMessage();
        }

        errorHandler($this->errorMessages);
    }
}
