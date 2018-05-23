<?php


namespace empyrean\spam_detection\detections;


class KeyHeldDown
{
    protected $body;
    protected $errorMessage = "You can not hold keys dummy!";
    /**
     * KeyHeldDown constructor.
     */
    public function __construct($body)
    {
        $this->body = $body;
    }

    public function detectSpam()
    {
        return preg_match('/(.)\\1{6,}/', $this->body);
    }

    public function getErrorMessage()
    {
        return $this->errorMessage;
    }
}