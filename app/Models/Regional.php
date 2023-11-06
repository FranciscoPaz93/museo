<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regional extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'identity',
    ];

    public function collections()
    {
        return $this->hasMany(Collection::class);
    }

    public function getCountCollectionsAttribute()
    {
        return $this->collections->count();
    }
}
