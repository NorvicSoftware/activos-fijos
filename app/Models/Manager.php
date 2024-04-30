<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Manager extends Model
{
    use HasFactory;
    protected $table = "managers";

    protected $fillable = ['full_name', 'address', 'phone', 'charge'];

    public function inventories(): HasMany
    {
        return $this->hasMany(Inventory::class);
    }


}
