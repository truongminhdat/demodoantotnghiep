<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = "comments";
    protected $fillable = [
        "noidung",
        "status",
        "user_id",
        "dangtin_id"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dangtin()
    {
        return $this->belongsTo(Dangtin::class);
    }
}
