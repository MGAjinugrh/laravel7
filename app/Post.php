<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'category_id', 'slug', 'body']; //you could select what you want to fill
    //protected $guarded = []; //all will be filled

    public function category()
    {
        return $this->belongsTo(Category::class); //parameter 2 opsional, by default category_id
    }

    public function tags() //plural jadi nama fungsinya pake s
    {
        return $this->belongsToMany(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
