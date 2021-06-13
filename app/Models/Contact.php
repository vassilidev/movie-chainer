<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'gender',
        'name',
        'surname',
    ];

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
