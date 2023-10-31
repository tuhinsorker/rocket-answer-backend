<?php

namespace Modules\Conversation\Entities;

use App\Traits\ActionBtn;
use Modules\Expert\Entities\Expert;
use Illuminate\Database\Eloquent\Model;
use Modules\Customer\Entities\Customers;
use Modules\Expert\Entities\ExpertCategory;
use Modules\Expert\Entities\ExpertSubCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Conversation\Entities\ConversationDetails;

class Activity extends Model
{
    use HasFactory;
    use ActionBtn;

    protected $guarded = [];
    protected $table = 'jp_activity';


    public function details()
    {
        return $this->hasMany(ConversationDetails::class, 'conversation_id', 'id');
    }

    public function customer(){
        return $this->belongsTo(Customers::class);
    }

    public function expert(){
        return $this->belongsTo(Expert::class);
    }

    public function expert_category(){
        return $this->belongsTo(ExpertCategory::class);
    }

    public function expert_sub_category(){
        return $this->belongsTo(ExpertSubCategory::class);
    }

}
