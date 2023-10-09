<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bug extends Model
{
    use HasFactory;

    protected $fillable  = [
        'uuid',
        'order',
        'family',
        'subfamily',
        'genus',
        'species',
        'genitalia',
        'gender',
        'color',
        'size',
        'frontal_tubercle_length',
        'distance_between_frontal_tubercle',
        'epistome_brush_length',
        'epistome_process_wide',
        'eye_length',
        'eye_wide',
        'distance_between_eyes',
        'pronotum_head_length',
        'pronotum_length',
        'metatorax_midline_length',
        'abdominal_length',
        'eliters_length',
        'user_id',
        'jar_id',
    ];
}
