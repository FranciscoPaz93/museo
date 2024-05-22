<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regional extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'uuid',
        'identity',
    ];





    public function collections()
    {
        return $this->hasMany(Collection::class);
    }

    public function getCountCollectionsAttribute(): int
    {
        return $this->collections->count();
    }

    public function departments(): Attribute
    {

        return Attribute::make(
            get: fn () => $this->collections->map(function ($collection) {
                $result = [];
                $this->collections->each(function ($collection) use (&$result) {
                    $result[] = $collection->municipality->department->name;
                });
                return implode(', ', array_unique($result));
            })->first()  // Assuming you only need one string of department names
        );
    }
}
