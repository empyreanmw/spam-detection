<?php

function spamConfig($parameter)
{
    return (new \empyrean\spam_detection\ConfigHandler())->get($parameter);
}

function spamErrorHandler($message)
{
    return (new \empyrean\spam_detection\ErrorHandler($message))->setSession();
}

function spamGetErrors()
{
    return Session\Session::instance()->get('errors');
}