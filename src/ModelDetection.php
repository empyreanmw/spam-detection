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
        $this->detectionMethods = config("model.detectionMethods");
    }

    public function inspect()
    {
        foreach ($this->detectionMethods as $methods) {
            $method = new $methods($this->body, $user = $this->user, $model = $this->model);
            if($method->detectSpam()) $this->errorMessages[] = $method->getErrorMessage();
        }

        errorHandler($this->errorMessages);
    }
}