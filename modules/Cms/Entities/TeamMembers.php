<?php

namespace Modules\Cms\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeamMembers extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'profile',
        'designation',
        'is_active',
        'fb',
        'twitter',
        'linkedin',
    ];

}
