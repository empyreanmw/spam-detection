<?php


namespace empyrean\spam_detection\detections;


class RemoveUrls
{
    protected $body;
    protected $errorMessage = "This post contains Urls!";
    /**
     * KeyHeldDown constructor.
     */
    public function __construct($body)
    {
        $this->body = $body;
    }

    public function detectSpam()
    {
        return preg_match(
            '/\b((https?|ftp|file):\/\/|www\.)[-A-Z0-9+&@#\/%?=~_|$!:,.;]*[A-Z0-9+&@#\/%=~_|$]/i',
            $this->body);
    }

    public function getErrorMessage()
    {
        return $this->errorMessage;
    }
}