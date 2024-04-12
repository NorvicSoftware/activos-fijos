<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivoFijo extends Model
{
    protected $fillable = [
        'marca', 'modelo', 'serie', 'existencia', 'eliminado', 'agencia_id',
    ];

    /*
    public function agencia()
    {
        return $this->belongsTo(Agencia::class);
    }
    */
}