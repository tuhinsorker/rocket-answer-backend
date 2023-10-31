<?php

namespace Modules\Expert\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class ExpertPaymentSetup extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function expert()
    {
        return $this->belongsTo(Expert::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();
        if (Auth::check()) {
            self::created(function ($model) {
                // $model->created_by = Auth::id();
                $model->created_by = auth()->user()->id;
                $model->save();
            });

            self::updating(function ($model) {
                $model->updated_by = Auth::id();
            });
        }

    }
}
