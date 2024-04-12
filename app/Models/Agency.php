<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;
    protected $table = 'table_agency';
    protected $fillable = [
        'name',
        'address',
        'phoneNumber'
    ];

    public function getName()
    {
        return $this->name;
    }
    public function getAddress()
    {
        return $this->address;
    }
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
    public function setName()
    {
        $this->name = $name;
    }
    public function setAddress()
    {
        $this->address = $address;
    }
    public function setPhoneNumber()
    {
        $this->phoneNumber = $phoneNumber;
    }
    public function related_table()
    {
        return $this->belongsToMany(Manager::class);
    }
}
