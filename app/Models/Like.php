<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $table="likes";
    protected $fillable = [
        'like',
        'user_id',
        'dangtin_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function dangtin(){
        return $this->belongsTo(Dangtin::class);
    }
}
