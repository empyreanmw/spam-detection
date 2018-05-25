<?php


namespace empyrean\spam_detection\traits;


trait Detectable
{
    protected $body;
    protected $user;
    protected $model;

    public function __construct($body, $user, $model)
    {
        $this->body = $body;
        $this->user = $user;
        $this->model = $model;
    }

    public function getLatestDatabaseEntries($model, $numberOfEntries)
    {
        return $model::where('user_id', $this->user)->latest()->take($numberOfEntries)->get();
    }

    public function getErrorMessage()
    {
        return $this->errorMessage;
    }
}