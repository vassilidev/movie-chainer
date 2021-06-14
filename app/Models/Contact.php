<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Str;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'gender',
        'name',
        'surname',
    ];

    /*
     * Get all the films where the contact have a role
     */
    public function films(): BelongsToMany
    {
        return $this->belongsToMany(Film::class)
            ->using(ContactFilm::class)
            ->withPivot('job_id');
    }

    public function getGender(): string
    {
        return ucfirst($this->gender);
    }

    public function getName(): string
    {
        return ucfirst($this->name);
    }

    public function getSurname(): string
    {
        return Str::upper($this->surname);
    }

    public function getFullName()
    {
        return $this->getGender() . ' ' . $this->getName() . ' ' . $this->getSurname();
    }
}
