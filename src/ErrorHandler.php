<?php


namespace empyrean\spam_detection;


use Session\Session;

class ErrorHandler
{
    protected $messages = [];
    /**
     * ErrorHandler constructor.
     */
    public function __construct($messages)
    {
        $this->messages = $messages;
    }

    public function setSession()
    {
        if(!$this->messages) return;

        Session::instance()->set('errors', $this->messages);

        return $this->redirectToPreviousPage();
    }

    protected function redirectToPreviousPage()
    {
        return header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}