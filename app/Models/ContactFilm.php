<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ContactFilm extends Pivot
{

    /*
    * Get the job in the film for the contact
    */
    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }

}
