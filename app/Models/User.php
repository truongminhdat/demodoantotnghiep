<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function dangtin()
    {
        return $this->hasMany(Dangtin::class);
    }

    public function danhgia()
    {
        return $this->belongsTo(Danhgia::class);
    }

    public function permissions()
    {
        return ['admin.quan', 'admin.phuong', 'admin.dangtin'];
    }

    public function hasPermission($route)
    {
        $routes = $this->routes();
        return in_array($route, $routes) ? true : false;

    }

    public function routes()
    {
        $data = [];
        foreach ($this->getRoles as $role) {
            $permission = json_decode($role->permissions);
            foreach ($permission as $per) {
                if (!in_array($per, $data)) {
                    array_push($data, $per);
                }
            }
        }
        return $data;
    }

    public function getRoles()
    {
        return $this->belongsToMany(Roles::class, 'user_roles', 'user_id', 'role_id');
    }

    public function datPhong()
    {
      return $this->hasMany(Datphong::class);
    }
}
