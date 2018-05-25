<?php


namespace empyrean\spam_detection;


use Session\Session;

class ErrorHandler
{
    public function setSession($errorMessages)
    {
        if(!$errorMessages) return;

        Session::instance()->set('errors', $errorMessages);

        return $this->redirectToPreviousPage();
    }

    protected function redirectToPreviousPage()
    {
        if ($_SERVER['HTTP_REFERER']) {
            return header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
}