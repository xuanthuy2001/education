<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    protected   $table="users";
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
        'phone',
        'avatar',
        'role_id',
        'status',
        'last_login',
        'last_logout',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $hidden = [
        'password', 
        // 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
    public  function role()
    {
        // role_id để đảm bảo khóa ngoại đúng,
        // nếu không khai báo thì mặc định name_id
        return $this->belongsTo(Role::class,'role_id','id');
    }
}
