<?php


namespace empyrean\spam_detection\detections;

use Carbon\Carbon;
use empyrean\spam_detection\ConfigHandler;

class FrequentPosting
{
    protected $body;
    protected $user;
    protected $model;
    protected $errorMessage = "You are posting too frequently";

    public function __construct($body, $user, $model)
    {
        $this->body = $body;
        $this->user = $user;
        $this->model = $model;
    }

    public function detectSpam()
    {
        $counter = 0;
        foreach($this->getLatestDatabaseEntries($this->model, 3) as $entry)
        {
            if ($entry->created_at->diffInSeconds(Carbon::now()) < $this->getPostingFrequency())
            {
                $counter++;
                if($counter == 3)
                {
                    return true;
                }
            }
        }
    }

    protected function getPostingFrequency()
    {
        return ConfigHandler::get('model.frequent_posting');
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