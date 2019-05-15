<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = ['body','answer_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function answer()
    {
        return $this->belongsTo('App\Answer');
    }

    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
