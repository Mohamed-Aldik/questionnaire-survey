<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];
    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::calss);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
