<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyResponden extends Model
{
    protected $table = 'survey_responden';
    protected $guarded = ['id'];
    
    // Karena di screenshot Anda ada created_at tapi tidak ada updated_at, 
    // sesuaikan dengan settingan timestamps di database Anda.
    public $timestamps = false; 

    public function profesi()
    {
        return $this->belongsTo(SurveyProfesi::class, 'profesi_id');
    }

    public function usia()
    {
        return $this->belongsTo(SurveyUsia::class, 'usia_id');
    }

    public function jawaban()
    {
        return $this->hasMany(SurveyJawaban::class, 'responden_id');
    }
}
