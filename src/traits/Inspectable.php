<?php


namespace empyrean\spam_detection\traits;


trait Inspectable
{
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