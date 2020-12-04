<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Questionnaire extends Model
{
    protected $guarded = [];
    public function path()
    {
        return url('/questionnaire/' . $this->id);
    }
    public function publicPath()
    {
        return url('/survey/' . $this->id . '-' . Str::slug($this->title));
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function surveys()
    {
        return $this->hasMany(Survey::class);
    }
    public $timestamps = false;
}
