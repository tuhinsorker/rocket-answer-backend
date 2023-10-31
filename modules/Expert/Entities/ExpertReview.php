<?php

namespace Modules\Expert\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Conversation\Entities\Conversations;
use Modules\Customer\Entities\Customers;

class ExpertReview extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function expert(){
        return $this->belongsTo(Expert::class,'expert_id','user_id');
    }

    public function customer(){
        return $this->belongsTo(Customers::class,'customer_id','user_id');
    }

    public function conversation(){
        return $this->belongsTo(Conversations::class);
    }

}
