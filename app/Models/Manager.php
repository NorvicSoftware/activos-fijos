<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;
    protected $table = "managers";

    protected $fillable = ['full_name', 'address', 'phone', 'charge'];

    

    // relaciones con las demas tablas
    // uno a uno, uno muchos, muchos a uno, muchos a muchos

}
