<?php

namespace Modules\Expert\Entities;

use App\Models\User;
use App\Traits\Common;
use Illuminate\Database\Eloquent\Model;
use Modules\Expert\Entities\Expert;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Modules\Conversation\Entities\Conversations;
use Modules\Setting\Entities\CardTypes;
use Modules\Setting\Entities\PaymentMethods;

class PaymentTransaction extends Model
{
    use HasFactory, Common;

    protected $guarded = [];
    protected $appends = ['attachment_url'];



    public function expert(){
        return $this->belongsTo(Expert::class,'expert_id','user_id');
    }

    public function payment_method(){
        return $this->belongsTo(PaymentMethods::class, 'payment_method_id', 'id');
    }

    public function conversation(){
        return $this->belongsTo(Conversations::class);
    }

    public function withdraw_request(){
        return $this->belongsTo(ExpertWithdrawRequest::class);
    }

    public function getattachmentUrlAttribute(){
        return $this->attachment?asset('storage/'.$this->attachment):asset('img/default.png');
    }

    protected static function boot()
    {
        parent::boot();
        if (Auth::check()) {
            self::created(function ($model) {
                // $model->created_by = Auth::id();
                $model->code = str_pad($model->id, 4, 0, STR_PAD_LEFT);
                $model->save();
            });

            self::updating(function ($model) {
                // $model->updated_by = Auth::id();
            });
        }

    }

}
