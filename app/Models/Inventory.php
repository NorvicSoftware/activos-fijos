<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $table = 'inventories';

    protected $fillable = ['name', 'start_Date', 'final_date', 'details', 'number_books', 'manager_id'];

    // Define relaciones aquí, si las hay
    public function manager()
{
    return $this->belongsTo(Manager::class);
}

}
