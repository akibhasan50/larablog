<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = [
        'name','status',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    //convert title into slug attribute name should be same as field 
    public function setNameAttribute($cat)
    {
       
        $this->attributes['name'] = $cat;
        return $this->attributes['slug'] = Str::slug($cat);

        
    }
}
