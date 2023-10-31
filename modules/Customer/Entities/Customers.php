<?php

namespace Modules\Customer\Entities;

use App\Traits\ActionBtn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Setting\Entities\Country;
use Modules\Subcription\Entities\Subscription;

class Customers extends Model
{
    use HasFactory;
    use ActionBtn;

    protected $fillable = [
        'name',
        'user_id',
        'code',
        'email',
        'phone',
        'country_id',
        'address',
        'dob',
        'image',
        'status',
    ];

    protected $appends = [
        'joining_date'
    ];

    public function getJoiningDateAttribute(){
        return $this->created_at->toFormattedDayDateString();
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Status list.
     */
    public static function statusList() : array
    {
        return [
            '1'   => 'Pending',
            '2'    => 'Active',
            '0' => 'Suspended',
        ];
    }

    public static function getCountryList(){
        $data = DB::table("countries")->get();
        if($data){
            return $data;
        }else{
            return false;
        }
    }

    public static function getCustomerList(){
        $data = DB::table("customers")->where('status', 2)->get();
        if($data){
            return $data;
        }else{
            return false;
        }
    }

    public function subscriptions(){
        return $this->hasMany(Subscription::class, 'customer_id', 'id');
    }
}
