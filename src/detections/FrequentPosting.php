<?php


namespace empyrean\spam_detection\detections;

use Carbon\Carbon;
use empyrean\spam_detection\Detectable;

class FrequentPosting
{
    use Detectable;

    protected $errorMessage = "You are posting too frequently";

    public function detectSpam()
    {
        $counter = 0;
        foreach($this->getLatestDatabaseEntries($this->model, 3) as $entry)
        {
            if ($entry->created_at->diffInSeconds(Carbon::now()) < config('model.frequent_posting'))
            {
                $counter++;
                if($counter == 3)
                {
                    return true;
                }
            }
        }
    }
}