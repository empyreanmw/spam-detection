<?php


namespace empyrean\spam_detection\detections;

use empyrean\spam_detection\traits\Detectable;

class DoublePosts
{
    use Detectable;

    protected $errorMessage = "You can't post the same message again!";

    public function detectSpam()
    {
        if ($this->getModelBody() == $this->body) return true;
    }

    public function getModelBody()
    {
        return $this->getLatestDatabaseEntries($this->model, 1)->first()->body;
    }

}