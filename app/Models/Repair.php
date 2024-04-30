<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Repair extends Model
{
    use HasFactory;
    protected $table = "repairs";

    protected $fillable = ['repair_date', 'price', 'detail', 'asset_id'];

    public function asset(): BelongsTo
    {
        return $this->belongsTo(Asset::class);
    }

}
