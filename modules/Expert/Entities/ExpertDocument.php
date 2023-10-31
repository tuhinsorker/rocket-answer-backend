<?php

namespace Modules\Expert\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExpertDocument extends Model
{
    use HasFactory;

    protected $guarded = [];
    // append path
    protected $appends = ['path'];

    // path
    public function getPathAttribute()
    {
        if($this->doc_path){
            return asset('storage/' . $this->doc_path);
        }else{
            return '';
        }
    }

    protected static function newFactory()
    {
        return \Modules\Expert\Database\factories\ExpertFactory::new();
    }
}
