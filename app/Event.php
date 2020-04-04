<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'content',
        'from',
        'to',
        'user_id',
    ];


    public function user(){
        return $this->belongsTo('App\User');
    }

}
