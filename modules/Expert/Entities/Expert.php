<?php

namespace Modules\Expert\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Conversation\Entities\Conversations;
use Modules\Setting\Entities\Country;

class Expert extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['profile_img', 'completed_consultancy', 'incomplete_consultancy'];

    public function documents(){
        return $this->hasMany(ExpertDocument::class);
    }

    public function educations(){
        return $this->hasMany(ExpertEducations::class);
    }

    public function jobs(){
        return $this->hasMany(ExpertJob::class);
    }

    public function getTotalEarnings(){
        return PaymentTransaction::where('transaction_type',1)->where('expert_id',$this->user_id)->sum('amount');
    }

    public function country(){
        return $this->hasOne(Country::class,'id','country_id');
    }

    public function category(){
        return $this->hasOne(ExpertCategory::class,'id','category_id');
    }

    public function subCategory(){
        return $this->hasOne(ExpertSubCategory::class,'id','sub_category_id');
    }
    public function accepted_withdraw_requests(){
        return $this->hasMany(ExpertWithdrawRequest::class,'expert_id','id')->where('is_approve', 1);
    }

    public function conversations(){
        return $this->hasMany(Conversations::class,'expert_id','id');
    }

    public function reviews(){
        return $this->hasMany(ExpertReview::class,'expert_id','id');
    }

    public function getFullNameAttribute(){
        return $this->first_name.' '.$this->last_name;
    }

    public function getProfileImgAttribute(){
        return $this->profile_photo_url?asset('storage/'.$this->profile_photo_url):nanopkg_asset('image/blank.png');
    }

    public function getCompletedConsultancyAttribute(){
        return $this->conversations()->where('is_expert_closed', 1)->count();
    }

    public function getIncompleteConsultancyAttribute(){
        return $this->conversations()->where('is_expert_closed', 0)->count();
    }



}
