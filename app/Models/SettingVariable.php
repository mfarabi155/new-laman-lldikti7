<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SettingVariable extends Model
{
    use HasFactory;

    protected $table = 'setting_variable';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['name', 'value'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }
}