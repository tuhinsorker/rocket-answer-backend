<?php

namespace Modules\Subcription\Entities;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Modules\Customer\Entities\Customers;
use Modules\Expert\Entities\ExpertCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function category() {
        return $this->belongsTo(ExpertCategory::class,'category_id','id');
    }

    public function customer(){
        return $this->belongsTo(Customers::class,'customer_id','id');
    }


    public function scopeCheckFiltter($query,$request)
    {
        if(!empty($request->subscription_id)){
            $query->where('subscription_id', $request->subscription_id);
        }
        if(!empty($request->customer_id)){
            $query->where('customer_id', $request->customer_id);
        }
        if(!empty($request->category_id)){
            $query->where('category_id', $request->category_id);
        }
        return $query;
    }


    protected static function boot()
    {
        parent::boot();
        if (Auth::check()) {

            self::created(function ($model) {
                $model->created_by = Auth::id();
            });

            self::updating(function ($model) {
                $model->updated_by = Auth::id();
            });
        }

    }
}
