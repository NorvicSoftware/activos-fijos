<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name', 'Start_date', 'final_date', 'Details', 'Number-books', 'manager_id'
    ];

    public function encargado()
    {
        return $this->belongsTo(Encargado::class);
    }
}
