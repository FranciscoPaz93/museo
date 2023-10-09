<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'job',
        'uuid',
        'pending_jobable_type',
        'pending_jobable_id',
        'model_type',
        'model_id',
        'status',
    ];

    public function pending_jobable()
    {
        return $this->morphTo();
    }
}
