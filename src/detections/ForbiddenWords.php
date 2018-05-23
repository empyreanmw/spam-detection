<?php


namespace empyrean\spam_detection\detections;


/**
 * Class ForbiddenWords
 * @package empyrean\spam_detection\detections
 */
class ForbiddenWords
{
    protected $body;
    protected $words;
    protected $errorMessage = "You can not use forbidden words!";
    /**
     * ForbiddenWords constructor.
     */
    public function __construct($body)
    {
        $this->body = $body;
        $this->words = config('forbidden_words');
    }

    public function detectSpam()
    {
        foreach ($this->words as $word) {
            if(strpos($this->body, $word) != false) return true;
        }
    }

    public function getErrorMessage()
    {
        return $this->errorMessage;
    }
}