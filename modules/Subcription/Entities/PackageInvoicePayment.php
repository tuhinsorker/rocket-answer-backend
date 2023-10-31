<?php

namespace Modules\Subcription\Entities;

use App\Traits\HasCreatedUpdateBy;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class PackageInvoicePayment extends Model
{

    use HasCreatedUpdateBy;
    use HasFactory;

    protected $fillable = ['invoice_id','package_payment_method_id','total_amount','received_date'];
    
    public function packagePaymentMethod(){
       return $this->belongsTo(PackagePaymentMethod::class);
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

}
