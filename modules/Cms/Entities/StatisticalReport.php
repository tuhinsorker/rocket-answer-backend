<?php

namespace Modules\Cms\Entities;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Modules\Setting\Entities\Currency;
use Illuminate\Database\Eloquent\Model;
use Modules\EkoAdmin\Entities\Industry;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StatisticalReport extends Model
{
    use HasFactory;
    const CACHE_KEY ='StatisticalReport';
    protected $guarded = [];

    public function industry()
    {
        return $this->hasOne(Industry::class,'id','industry_id');
    }

    public function currency()
    {
        return $this->hasOne(Currency::class,'id','currency_id');
    }

    public function scopeFilter($query, $request)
    {
        
        if(!empty($request->industry)){
            $query->where('industry_id', $request->industry);
        }
        if(!empty($request->project_stage)){
            $query->where('project_stage', $request->project_stage);
        }
        if(!empty($request->type_of_researcher)){
            $query->where('type_of_researcher', $request->type_of_researcher);
        }
        if(!empty($request->patent_level)){
            $query->where('patent_level', $request->patent_level);
        }
        return $query;
    }


    protected static function boot()
    {
        parent::boot();

        self::creating(function($model) {
            $model->uuid = (string) Str::uuid();
            self::resetReportCache(self::CACHE_KEY);
        });

        if(Auth::check()){
            self::creating(function($model) {
                $model->created_by = Auth::id();
                self::resetReportCache(self::CACHE_KEY);
            });
            self::updating(function($model) {
                $model->updated_by = Auth::id();
                self::resetReportCache(self::CACHE_KEY);
            });
            self::deleted(function($model){
                // $model->updated_by = Auth::id();
                // $model->save();
                // self::resetReportCache(self::CACHE_KEY);
            });
        }

    }


    /** 
    * Should Have a model const named CACHE_KEY
    * @param Builder $query
    * @return Model Collections
    */
    public static function getCacheReport($request){

        $data = Cache::rememberForever(self::CACHE_KEY. request('page', 1), function () use($request) {
            if($request->keyword!=''){
                $keyword = $request->keyword;
                $reports = StatisticalReport::when($keyword, function ($q) use ($keyword) {
                    return $q->where('research_title', 'LIKE', '%' . $keyword . '%');;
                })
                ->with('industry')->paginate(12)->appends('keyword', $keyword);
            }else{
                $reports = StatisticalReport::with('industry')->orderBy('id', 'DESC')->Filter($request)->paginate(12);
            }
            return $reports;
        });

        Log::info("cache Query ".self::CACHE_KEY. request('page', 1));
        return $data;
    }

    /** 
    * Should Have a model const named CACHE_KEY
    * @param Class $modelClassName
    * @return Model Collections
    */
    public static function resetReportCache($prefix){

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
