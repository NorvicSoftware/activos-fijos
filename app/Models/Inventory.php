<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Manager;

class Inventory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'start_date', 'final_date', 'details', 'number_books', 'manager_id'
    ];

    protected $dates = [
        'start_date', 'final_date'
    ];

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }
}
