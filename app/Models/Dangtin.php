<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dangtin extends Model
{
    use HasFactory;

    protected $table = "dangtins";
    protected $fillable = [
        'Tieude',
        'Diachi',
        'Giaphong',
        'Dientich',
        'Sdt',
        'Mota',
        'Hinhanh',
        'tiennghi',
        'soluongphong',
        'loaiphong_id',
        'phuong_id',
        'user_id',
        'status'
    ];

    public function phuong()
    {
        return $this->belongsTo(Phuong::class);
    }

    public function loaiphong()
    {
        return $this->belongsTo(Loaiphong::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function like()
    {
        return $this->hasMany(Like::class, 'dangtin_id')->sum('like');
    }

    public function danhgia()
    {
        return $this->hasMany(Danhgia::class);
    }

    public function quan()
    {
        return $this->belongsTo(Quan::class);
    }

    public function datPhong()
    {
        return $this->hasMany(Datphong::class,'dangtin_id');
    }
}
