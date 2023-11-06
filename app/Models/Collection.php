<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use MatanYadaev\EloquentSpatial\Objects\Point;
use MatanYadaev\EloquentSpatial\Traits\HasSpatial;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Collection extends Model
{
    use HasSpatial;
    use HasFactory;

    protected $fillable = [
        'code',
        'uuid',
        'date_collection',
        'municipality_id',
        'place',
        'regional_id',
        'user_id',
    ];




    public function scopeSortBy($query, $sortField, $sortAsc)
    {
        if ($sortField === 'municipality') {
            $query->join('municipalities', 'collections.municipality_id', '=', 'municipalities.id')
                ->orderBy('municipalities.name', $sortAsc ? 'asc' : 'desc')
                ->select('collections.*');
        } elseif ($sortField === 'regional') {
            $query->join('regionals', 'collections.regional_id', '=', 'regionals.id')
                ->orderBy('regionals.name', $sortAsc ? 'asc' : 'desc')
                ->select('collections.*');
        } elseif ($sortField === 'department') {
            $query->join('municipalities', 'collections.municipality_id', '=', 'municipalities.id')
                ->join('departments', 'municipalities.department_id', '=', 'departments.id')
                ->orderBy('departments.name', $sortAsc ? 'asc' : 'desc')
                ->select('collections.*');
        } else {
            $query->orderBy($sortField, $sortAsc ? 'asc' : 'desc');
        }
    }

    public function scopeSearch($query, $terms = null)
    {
        collect(explode(' ', $terms))->filter()->each(function ($term) use ($query) {
            $query->where(function ($query) use ($term) {
                $query->where('code', 'like', '%' . $term . '%')
                    ->orWhere('place', 'like', '%' . $term . '%')
                    ->orWhere('date_collection', 'like', '%' . $term . '%')
                    ->orWhereHas('municipality', function ($query) use ($term) {
                        $query->where('name', 'like', '%' . $term . '%');
                    })
                    ->orWhereHas('regional', function ($query) use ($term) {
                        $query->where('name', 'like', '%' . $term . '%');
                    })
                    ->orWhereHas('user', function ($query) use ($term) {
                        $query->where('name', 'like', '%' . $term . '%');
                    });
            });
        });
    }
    public function Jars(): HasManyThrough
    {
        return $this->hasManyThrough(Jar::class, CollectionIteration::class);
    }

    public function collectionIterations()
    {
        return $this->hasMany(CollectionIteration::class);
    }


    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }

    public function regional()
    {
        return $this->belongsTo(Regional::class);
    }

    public function locations()
    {
        return $this->hasMany(Location::class)->first();
    }



    public function user()
    {
        return $this->belongsTo(User::class);
    }



    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
