<?php


namespace empyrean\spam_detection;

class ModelDetection implements DetectionInterface
{
    protected $body;
    protected $model;
    protected $user;
    protected $detectionMethods;
    protected $errorMessages = [];

    /**
     * ModelDetection constructor.
     * @param array $detectionMethods
     */
    public function __construct($body, $user=null, $model=null)
    {
        $this->body = $body;
        $this->model = $model;
        $this->user = $user;
        $this->detectionMethods = $this->setDetectionMethods();
    }

    public function inspect()
    {
        foreach ($this->detectionMethods as $methods) {
            $method = new $methods($this->body, $user = $this->user, $model = $this->model);
            if($method->detectSpam()) $this->errorMessages[] = $method->getErrorMessage();
        }

        (new ErrorHandler())->setSession($this->errorMessages);
    }

    public function setDetectionMethods()
    {
        return ConfigHandler::get('model.detectionMethods');
    }

}