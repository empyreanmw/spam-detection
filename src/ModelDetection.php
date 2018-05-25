<?php


namespace empyrean\spam_detection;


use empyrean\spam_detection\traits\Inspectable;

class ModelDetection implements DetectionInterface
{
    use Inspectable;

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


}