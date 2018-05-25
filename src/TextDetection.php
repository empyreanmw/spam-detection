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
        $this->detectionMethods = $this->setDetectionMethods();
    }

    public function inspect()
    {
        foreach ($this->detectionMethods as $methods) {
            $method = new $methods($this->body);
            if($method->detectSpam()) $this->errorMessages[] = $method->getErrorMessage();
        }

        (new ErrorHandler())->setSession($this->errorMessages);
    }

    public function setDetectionMethods()
    {
        return ConfigHandler::get('text.detectionMethods');
    }

}
