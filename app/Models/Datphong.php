<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datphong extends Model
{
    use HasFactory;

    protected $table= "datphongs";

    protected $fillable= [
        'user_id',
        'dangtin_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dangTin()
    {
        return $this->belongsTo(Dangtin::class);
    }
}
