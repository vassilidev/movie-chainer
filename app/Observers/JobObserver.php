<?php

namespace App\Observers;

use App\Models\Job;
use Str;

class JobObserver
{
    /**
     * Handle the Job "created" event.
     *
     * @param Job $job
     * @return void
     */
    public function created(Job $job)
    {
        $job->label = Str::slug($job->label);
        $job->saveQuietly();
    }

    /**
     * Handle the Job "updated" event.
     *
     * @param Job $job
     * @return void
     */
    public function updated(Job $job)
    {
        $job->label = Str::slug($job->label);
        $job->save();
    }
}
