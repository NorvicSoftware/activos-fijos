<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Agency extends Model
{
    use HasFactory;
    protected $table = 'agencies';
    protected $fillable = [
        'name',
        'address',
        'phoneNumber'
    ];


    public function inventories(): HasMany
    {
        return $this->hasMany(Inventory::class);
    }
    
    public function assets(): HasMany
    {
        return $this->hasMany(Manager::class);
    }
}
