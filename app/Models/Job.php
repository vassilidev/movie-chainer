<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'name',
    ];

    public function getRouteKeyName(): string
    {
        return 'label';
    }

}
