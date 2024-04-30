<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Manager;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventory extends Model
{
    protected $fillable = [
        'name', 'start_date', 'final_date', 'details', 'read', 'not_read', 'agency_id', 'manager_id'
    ];

    protected $dates = [
        'start_date', 'final_date'
    ];

    public function agency(): BelongsTo 
    {
        return $this->belongsTo(Agency::class);
    }

    public function manager(): BelongsTo
    {
        return $this->belongsTo(Manager::class);
    }
}
