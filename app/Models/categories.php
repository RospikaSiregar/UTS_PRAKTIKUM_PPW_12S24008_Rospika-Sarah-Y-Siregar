<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'code'];

    public function equipments() {
        return $this->hasMany(Equipment::class);
    }
}
