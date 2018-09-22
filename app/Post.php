<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function getImageAttribute($value){
        $imageUrl = '';
        if(!is_null($value)){
            $path = public_path().'/img/'.$value;
            if(file_exists($path)){
                $imageUrl=asset("img/".$value);
            }
        }
        return $imageUrl;
    }

    public function user(){
        return $this->belongsTo(User::class,'author_id');
    }

    public function getPublishedAtAttribute($value){
        return is_null($value) ? "" : Carbon::parse($value)->diffForHumans();
    }
}
