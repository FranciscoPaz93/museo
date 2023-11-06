<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MatanYadaev\EloquentSpatial\Objects\Point;
use MatanYadaev\EloquentSpatial\Traits\HasSpatial;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $fillable = [
        'coordinates',
        'altitude',
        'collection_id',
        'reason',
    ];

    protected $casts = [
        'coordinates' => Point::class,
    ];

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }
}
