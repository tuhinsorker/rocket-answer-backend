<?php

namespace Modules\Conversation\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Customer\Entities\Customers;
use Modules\Expert\Entities\Expert;

class ConversationDetails extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function customer_sender_data(){

        return $this->belongsTo(Customers::class, 'sender_id', 'user_id')->select('id','name','image');
    }

    public function expert_sender_data(){

        return $this->belongsTo(Expert::class, 'sender_id', 'user_id')->select('id','full_name','display_name','profile_photo_url');
    }

    public function customer_receiver_data(){

        return $this->belongsTo(Customers::class, 'receiver_id', 'user_id')->select('id','name','image');
    }

    public function expert_receiver_data(){

        return $this->belongsTo(Expert::class, 'receiver_id', 'user_id')->select('id','full_name','display_name','profile_photo_url');
    }
    
}
