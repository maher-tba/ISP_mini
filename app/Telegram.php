<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telegram extends Model
{
    protected $fillable = [
        'token', 'chat_id','user_id','message'
    ];

    ########################### start telegram Relationship ########################
    public function user(){
        return $this->belongsTo('App\user');
    }
    ########################### end telegram Relationship ########################
}
