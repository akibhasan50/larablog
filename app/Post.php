<?php

namespace App;

use App\Events\PostCreated;
use App\Events\PostDeleted;
use App\Events\PostUpdated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'title', 'description', 'image','status'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

  

    //converting title into slug
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        return $this->attributes['slug'] = Str::slug($value);
    
    }
    //show slug in url
    public function getUrlAttribute()
    {
        return route('post.show',$this->slug);
    }

    public function  getCreateDateAttribute()
    {
      return $this->created_at->format('d F  Y');
    }

    protected $dispatchesEvents = [
        'created' => PostCreated::class,
        'updated' => PostUpdated::class,
        'deleted' => PostDeleted::class,
    ];
}
