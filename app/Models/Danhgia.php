<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhgia extends Model
{
    use HasFactory;
    protected $table="danhgias";
    protected $fillable = [
        'grate',
        'user_id',
        'dangtin_id'
    ];
    public function dangtin(){
        return $this->belongsTo(Dangtin::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
