<?php

namespace App\Models;

use App\Traits\ActionBtn;
use App\Traits\WithCache;
use Modules\Expert\Entities\Expert;
use Modules\Expert\Entities\ExpertJob;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Modules\Auth\Traits\HasProfilePhoto;
use Modules\Expert\Entities\ExpertDocument;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Modules\Expert\Entities\ExpertEducations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Customer\Entities\Customers;

class User extends Authenticatable implements JWTSubject
{
    
    use HasFactory;
    use Notifiable;
    use WithCache;
    use ActionBtn;
    use HasRoles;
    use TwoFactorAuthenticatable;
    use HasProfilePhoto;


    protected static $cacheKey = '_users_';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'user_name',
        'user_type',
        'email',
        'google_id',
        'password',
        'profile_photo_path',
        // extra field
        'phone',
        'gender',
        'age',
        'address',
        'status',
    ];


 
    public function expert(){
        return $this->hasOne(Expert::class);
    }
    
    public function customer(){
        return $this->hasOne(Customers::class);
    }
    


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Status list.
     */
    public static function statusList() : array
    {
        return [
            'Pending'   => 'Pending',
            'Active'    => 'Active',
            'Suspended' => 'Suspended',
        ];
    }

    /**
     * Gender List.
     */
    public static function genderList() : array
    {
        return [
            'Male'   => 'Male',
            'Female' => 'Female',
            'Others' => 'Others',
        ];
    }

    /**
     * Format User Created At.
     */
    public function getCreatedAtAttribute() : string
    {
        return \date('d M, Y', \strtotime($this->attributes['created_at']));
    }

    /**
     * Format User Updated At.
     */
    public function getUpdatedAtAttribute() : string
    {
        return \date('d M, Y', \strtotime($this->attributes['updated_at']));
    }

    public function favTemplate()
    {
        return $this->belongsToMany(Template::class, 'user_fav_template', 'template_id', 'user_id');
    }


    
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

}