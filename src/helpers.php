<?php

function config($parameter)
{
    return (new \empyrean\spam_detection\ConfigHandler())->get($parameter);
}

function errorHandler($message)
{
    return (new \empyrean\spam_detection\ErrorHandler($message))->setSession();
}

function getErrors()
{
    return Session\Session::instance()->get('errors');
}