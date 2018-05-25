<?php


namespace empyrean\spam_detection\detections;

class DoublePosts
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

    protected $errorMessage = "You can't post the same message again!";

    public function detectSpam()
    {
        if ($this->getModelBody() == $this->body) return true;
    }

    public function getModelBody()
    {
        return $this->getLatestDatabaseEntries($this->model, 1)->first()->body;
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