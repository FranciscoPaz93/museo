<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genitalia extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'species_id',
    ];
}
