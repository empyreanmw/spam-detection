<?php


namespace empyrean\spam_detection\detections;

use Carbon\Carbon;
use empyrean\spam_detection\ConfigHandler;
use empyrean\spam_detection\traits\Detectable;

class FrequentPosting
{
    use Detectable;

    protected $errorMessage = "You are posting too frequently";

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
}