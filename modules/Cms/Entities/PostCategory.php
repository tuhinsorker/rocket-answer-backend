<?php

namespace Modules\Cms\Entities;

use Modules\Cms\Entities\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostCategory extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function posts()
    {
        return $this->hasMany(Post::class,'post_category_id','id');
    }


    
    
    
   
}
