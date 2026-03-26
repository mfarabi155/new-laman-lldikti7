<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // 1. Tentukan nama tabel existing Anda
    protected $table = 't_user';

    // 2. Tentukan Primary Key yang digunakan tabel Anda
    protected $primaryKey = 't_user_id';

    // 3. Karena t_user_id bertipe varchar(22) dan BUKAN auto-increment (integer)
    public $incrementing = false;
    protected $keyType = 'string';

    // 4. Nonaktifkan timestamps bawaan Laravel karena nama kolom Anda berbeda
    // (t_user_created_date vs created_at)
    public $timestamps = false;

    // 5. Tentukan kolom apa saja yang boleh diisi (Mass Assignment)
    protected $fillable = [
        't_user_id',
        'idx',
        't_user_username',
        't_user_password',
        't_bagian_id',
        't_user_login_temp',
        't_user_last_login',
        't_user_islogin',
        't_user_status',
        't_user_created_date',
        't_user_created_by',
        't_user_updated_date',
        't_user_updated_by',
    ];

    // 6. Sembunyikan kolom sensitif saat model di-return dalam bentuk array/JSON
    protected $hidden = [
        't_user_password',
    ];

    // 7. Beritahu Laravel nama kolom password Anda
    // Secara default Laravel mencari kolom bernama 'password', kita ubah menjadi 't_user_password'
    public function getAuthPassword()
    {
        return $this->t_user_password;
    }

    // 8. Beritahu Laravel nama kolom identifier Anda (misal login pakai username, bukan email)
    // Di Laravel 11/12, untuk menentukan kolom "username" custom pada model auth
    public function getAuthIdentifierName()
    {
        return 't_user_username';
    }
}