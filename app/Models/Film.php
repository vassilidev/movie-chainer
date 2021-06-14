<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'year',
    ];

    public function contacts(): BelongsToMany
    {
        return $this->belongsToMany(Contact::class)
            ->using(ContactFilm::class)
            ->withPivot('job_id');
    }
}
