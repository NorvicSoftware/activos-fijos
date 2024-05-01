<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Asset extends Model
{
    use HasFactory;
    protected $table = "assets";

    protected $fillable = ['name', 'code', 'description','brand','model','series', 'exists', 'status', 'agency_id'];

     
    public function agency(): BelongsTo 
    {
        return $this->belongsTo(Agency::class);
    }

    public function repairs(): HasMany
    {
        return $this->hasMany(Repair::class);
    }
    
}