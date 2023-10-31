<?php

namespace Modules\Subcription\Entities;
use App\Traits\HasCreatedUpdateBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Expert\Entities\ExpertCategory;

use Modules\Role\Entities\Module;
class Package extends Model
{

    use HasCreatedUpdateBy;
    use HasFactory;
    protected $fillable = ['title','price','duration','expert_categories_id','service_number','offer','offer_price','offer_discount','offer_start_date','offer_duration','offer_status','status'];

    public function category(){
        return $this->belongsTo(ExpertCategory::class,'expert_categories_id','id');
    }

    public function categorys(){
        return $this->belongsToMany(ExpertCategory::class,'package_modules','package_id','expert_categories_id');
    }
    
}
