<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyPertanyaan extends Model
{
    protected $table = 'survey_pertanyaan';
    protected $guarded = ['id'];
    public $timestamps = false;
}
