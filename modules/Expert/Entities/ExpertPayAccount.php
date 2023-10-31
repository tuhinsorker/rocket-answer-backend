<?php

namespace Modules\Expert\Entities;

use App\Traits\Common;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Setting\Entities\CardTypes;
use Modules\Setting\Entities\PaymentMethods;

class ExpertPayAccount extends Model
{
    use HasFactory, Common;

    protected $guarded = [];


    public function expert(){
        return $this->belongsTo(Expert::class);
    }

    public function payment_method(){
        return $this->belongsTo(PaymentMethods::class);
    }

    public function card_type(){
        return $this->belongsTo(CardTypes::class);
    }
}
