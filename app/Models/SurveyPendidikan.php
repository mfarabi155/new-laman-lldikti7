<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyPendidikan extends Model
{
    protected $table = 'survey_pendidikan';
    protected $fillable = ['pendidikan'];

    public $timestamps = false; 
}
