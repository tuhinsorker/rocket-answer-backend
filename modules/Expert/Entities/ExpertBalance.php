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

class ExpertBalance extends Model
{
    use HasFactory, Common;

    public function expert(){
        return $this->belongsTo(Expert::class);
    }


}
