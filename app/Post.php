<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'caption', 'username', 'photo_id'
    ];
    
    protected $dates = ['deleted_at'];

    public static function scopeLatest($query){
        return $query -> orderBy('created_at', 'desc') -> get();
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function photo(){
        return $this->hasMany('App\Photo');
    }
}
