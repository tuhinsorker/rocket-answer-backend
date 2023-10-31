<?php

namespace Modules\Expert\Entities;

use App\Models\User;
use App\Traits\Common;
use Illuminate\Database\Eloquent\Model;
use Modules\Expert\Entities\Expert;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Modules\Setting\Entities\CardTypes;

class ExpertWithdrawRequest extends Model
{
    use HasFactory, Common;

    protected $guarded = [];

    public function approved_by(){
        return $this->belongsTo(User::class,'approve_by','id');
    }

    public function expert(){
        return $this->belongsTo(Expert::class,'expert_id','user_id');
    }


    public function card_type(){
        return $this->belongsTo(CardTypes::class);
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
