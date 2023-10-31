<?php

namespace Modules\Customer\Entities;

use App\Traits\ActionBtn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactQuery extends Model
{
    use HasFactory;
    use ActionBtn;

    protected $fillable = [
        'name',
        'email',
        'message',
    ];


}
