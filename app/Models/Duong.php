<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duong extends Model
{
    use HasFactory;
    protected $table= "duongs";
    protected $fillable=[
        'Tenduongs',
    ];
    public function dangtin(){
        return $this->hasMany('App\Models\Dangtin','duong_id','id');
    }
}
