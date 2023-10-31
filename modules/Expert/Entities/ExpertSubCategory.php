<?php

namespace Modules\Expert\Entities;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExpertSubCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * append icon
     */
    protected $appends = ['icon'];


    /**
     * get icon attribute
     *
     * @return string
     */
    public function getIconAttribute()
    {
        return $this->icon_path?storage_asset($this->icon_path):null;
    }

    // expert_subcategory belongs to expert_category
    public function expert_category()
    {
        return $this->belongsTo(ExpertCategory::class);
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
