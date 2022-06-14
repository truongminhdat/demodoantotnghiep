<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quan extends Model
{
    use HasFactory;
    protected $table= "quans";
    protected $fillable=[
        'Tenquan'
    ];
    public function phuong(){
        return $this->hasMany(Phuong::class);
    }

    public function dangTin() {
        return $this->hasMany(dangtin::class);
    }
}
