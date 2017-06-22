<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    //
    protected $table = 'contests';
    protected $guarded = ['user_id'];

     public function user()
    {
        return $this->belongsTo('App\User');
    }
}
