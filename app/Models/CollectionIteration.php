<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionIteration extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'collection_id',
        'date',
        'code',
        'collector',
        'identifier',
        'period',
    ];




    public function scopeSearchYear($query, $year = null)
    {
        if (!$year) {
            return $query;
        }
        return $query->whereYear('date', $year);
    }

    public function scopeSearchMonth($query, $month = null)
    {
        if (!$month) {
            return $query;
        }
        return $query->whereMonth('date', $month);
    }

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }


    public function jars()
    {
        return $this->hasMany(Jar::class);
    }

    public function scopeYearsForFilter($query, $collection_id = null)
    {
        return $query->where('collection_id', $collection_id)->selectRaw('YEAR(date) as year')->distinct()->pluck('year');
    }



    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
