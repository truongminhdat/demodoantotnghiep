<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loaiphong extends Model
{
    use HasFactory;
    protected $table= "loaiphongs";
    protected $fillable=[
        'Tenloaiphong'
    ];
    public function dangtin(){
        return $this->belongsTo(Dangtin::class);
    }

}
