<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $table = 'articles';
    protected $guarded = ['user_id'];

     public function user()
    {
        return $this->belongsTo('App\User');
    }
}
