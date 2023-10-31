<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Conversation\Entities\Conversations;
use Modules\Expert\Entities\PaymentTransaction;

class Notifications extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function transactions()
    {
        return $this->belongsTo(transactions::class, 'transaction_id', 'id');
    }

    public function payment_transaction(){
        return $this->belongsTo(PaymentTransaction::class, 'payment_transaction_id', 'id');
    }

    public function conversation()
    {
        return $this->belongsTo(Conversations::class, 'conversation_id', 'id');
    }

}
