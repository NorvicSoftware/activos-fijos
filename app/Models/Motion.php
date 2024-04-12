<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motion extends Model
{
    use HasFactory;
    protected $table = 'movements';

    protected $fillable = [
        'data',
        'detail',
        'asset_id',
        'agency_previous_id',
        'agency_current_id'
    ];

    /**
     * Relación con Asset
     */
    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }

    /**
     * Relación con Agency para la agencia anterior
     */
    public function agencyPrevious()
    {
        return $this->belongsTo(Agency::class, 'agency_previous_id');
    }

    /**
     * Relación con Agency para la agencia actual
     */
    public function agencyCurrent()
    {
        return $this->belongsTo(Agency::class, 'agency_current_id');
    }
}
