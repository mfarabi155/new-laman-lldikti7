<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyUsia extends Model
{
    protected $table = 'survey_usia';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function responden()
    {
        return $this->hasMany(SurveyResponden::class, 'usia_id');
    }
}
