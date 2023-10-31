<?php

namespace Modules\Expert\Entities;

use App\Models\JpOnlineUser;
use Modules\Cms\Entities\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Modules\Subcription\Entities\Pricing;
use Modules\Conversation\Entities\Conversations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExpertCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * append icon
     */
    protected $appends = ['icon','image_url'];

    public function ExpertSubCategory(){
        return $this->hasMany(ExpertSubCategory::class);
    }

    public function page(){
        return $this->hasOne(Post::class,'post_category_id','id');
    }

    public function pricing(){
        return $this->hasOne(Pricing::class,'category_id','id');
    }
    
    public function onlineUser(){
        return $this->hasOne(JpOnlineUser::class,'category_id','id');
    }

    public function conversations(){
        return $this->belongsTo(Conversations::class,'expert_category_id','id');
    }

    public function scopeFilter($query,$request){
        if(!empty($request->category_id)){
            $query->where('id', $request->category_id);
        }
        $query->where('is_active', 1);
        return $query;
    }
    /**
     * get icon attribute
     *
     * @return string
     */
    public function getIconAttribute()
    {
        return $this->icon_path?storage_asset($this->icon_path):null;
    }

    public function getImageUrlAttribute()
    {
        return $this->image_path?storage_asset($this->image_path):null;
    }



}
