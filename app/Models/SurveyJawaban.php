<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyJawaban extends Model
{
    protected $table = 'survey_jawaban';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function pertanyaan()
    {
        return $this->belongsTo(SurveyPertanyaan::class, 'pertanyaan_id');
    }

    public function responden()
    {
        return $this->belongsTo(SurveyResponden::class, 'responden_id');
    }
}
