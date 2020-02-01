<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    public $directory = '/images/';

    protected $fillable = [
        'file'
    ];

    public function getFileAttribute($photo){
        $file = $this->directory . $photo;
        return $file;
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function post() {
        return $this->belongsTo('App\Post');
    }
}
