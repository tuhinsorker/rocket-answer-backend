<?php

namespace Modules\Subcription\Entities;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Modules\Expert\Entities\ExpertCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Customer\Entities\Customers;

class SubscriptionPayment extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function subscription(){
        return $this->belongsTo(Subscription::class);
    }

    public function category() {
        return $this->belongsTo(ExpertCategory::class,'category_id','id');
    }

    protected static function boot(){
        parent::boot();
        if(Auth::check()){
            self::creating(function($model) {
                $model->created_by = Auth::id();
            });

            self::updating(function($model) {
                $model->updated_by = Auth::id();
            });
        }

        static::addGlobalScope('sortByLatest', function (Builder $builder) {
            $builder->orderByDesc('id');
        });
    }

    public function customer(){
        return $this->belongsTo(Customers::class);
    }
}
