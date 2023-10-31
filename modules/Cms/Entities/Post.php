<?php

namespace Modules\Cms\Entities;

use App\Models\User;
use App\Traits\ActionBtn;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory,ActionBtn;

    const CACHE_KEY = "Post";
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(PostCategory::class,'post_category_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'created_by','id');
    }

    public function scopePostfilter($query, $request)
    {
        if(!empty($request->category_id)){
            $query->where('post_category_id', $request->category_id);
        }
        $query->whereIn('status', [0,1]);
        return $query;
    }


    protected static function boot()
    {
        parent::boot();
        if(Auth::check()){
            self::creating(function($model) {
                $model->uuid = (string) Str::uuid();
                $model->created_by = Auth::id();
                self::resetPostCache(self::CACHE_KEY);
            });
            self::updating(function($model) {
                $model->updated_by = Auth::id();
                self::resetPostCache(self::CACHE_KEY);
            });
            self::deleted(function($model){
                // $model->updated_by = Auth::id();
                // $model->save();
                // self::resetPostCache(self::CACHE_KEY);
            });
        }

    }


    /**
    * Should Have a model const named CACHE_KEY
    * @param Builder $query
    * @return Model Collections
    */
    public static function getCachePosts($request){

        $data = Cache::rememberForever(self::CACHE_KEY .request()->get('page', 1), function () use($request) {

            if($request->keyword!=''){
                $keyword = $request->keyword;
                $posts = Post::when($keyword, function ($q) use ($keyword) {
                    return $q->where('title', 'LIKE', '%' . $keyword . '%');;
                })
                ->with('user','category')->latest()->paginate(16)->appends('keyword', $keyword);
            }else{
                $posts  = Post::with('user','category')->latest()->paginate(16);
            }

            return $posts;
        });

        Log::info("cache Query ".self::CACHE_KEY .request()->get('page', 1));
        return $data;
    }

    /**
    * Should Have a model const named CACHE_KEY
    * @param Class $modelClassName
    * @return Model Collections
    */
    public static function resetPostCache($prefix){

        Cache::forget($prefix);

        // $key = '';
        // for ($i=1; $i < 1000; $i++) {
        //     $key = $prefix . $i;
        //     if (Cache::has($key)) {
        //         Cache::forget($key);
        //     } else {
        //         break;
        //     }
        // }
        Log::info("cache reseting ".$prefix);
    }


}
