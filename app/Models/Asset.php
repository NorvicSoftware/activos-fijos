<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    protected $table = "assets";

protected $fillable = ['name', 'code', 'description','brand','model','series', 'exists', 'status', 'agency_id'];

     
    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }
    
}