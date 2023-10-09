<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jar extends Model
{
    use HasFactory;

    protected $fillable = [
        'collection_iteration_id',
        'uuid',
        'code',
        'collector',
        'quantity',
        'identifier',
        'period',
    ];

    public function collection_iteration()
    {
        return $this->belongsTo(CollectionIteration::class);
    }

    public function bugs()
    {
        return $this->hasMany(Bug::class);
    }
}
