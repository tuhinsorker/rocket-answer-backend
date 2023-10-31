<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $data;
    public function __construct( $data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->view('emailtemplate.resetemail')->with('data',$this->data);
    }
}
