<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $keyType = 'string';
    public $incrementing= false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'firstname',
        'othername',
        'username',
        'password',
        'telephone',
        'gender',
        'email',
        'confirm_telephone',
        'confirm_email',
        'mode',
        'image',
        'role',
        'permission',
        'added_id',
        'added_date',
        'updated_by',
        'status',
        'status',
        'archived',
        'updated_date',
        'assign_user'
    ];


    public function getAvatarUrl()
    {
        return Storage::url($this->avatar);
    }
    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function get_user()
    {
        
    }
}
