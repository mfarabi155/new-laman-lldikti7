<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyProfesi extends Model
{
    protected $table = 'survey_profesi';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function responden()
    {
        return $this->hasMany(SurveyResponden::class, 'profesi_id');
    }
}
