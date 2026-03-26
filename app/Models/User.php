<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 't_user';
    protected $primaryKey = 't_user_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        't_user_id', 'idx', 't_user_username', 't_user_password', 
        't_bagian_id', 't_user_islogin', 't_user_status', 
        't_user_created_date', 't_user_created_by'
    ];

    protected $hidden = ['t_user_password'];

    public function getAuthPassword()
    {
        return $this->t_user_password;
    }

    /**
     * SANGAT PENTING:
     * Ini harus mengembalikan nama kolom PRIMARY KEY yang unik (t_user_id).
     * Laravel menggunakannya untuk mencari user di session.
     */
    public function getAuthIdentifierName()
    {
        return 't_user_id'; 
    }

    public function getAuthIdentifier()
    {
        return $this->t_user_id;
    }
}