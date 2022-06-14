<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phuong extends Model
{
    use HasFactory;
    protected $table= "phuongs";
    protected $fillable=[
        'TenPhuong'
    ];
    public function dangtin(){
        return $this->hasMany(Dangtin::class);
    }
    public function quan(){
        return $this->belongsTo(Quan::class);
    }
}
