<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Actuallymab\LaravelComment\Commentable;

class Post extends Model
{
    //
    protected $table = 'posts';
    protected $guarded = ['user_id'];

     public function user()
    {
        return $this->belongsTo('App\User');
    }


}
