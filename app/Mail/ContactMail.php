<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $subject;
    public $message;
    public $ip;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message , $subject, $name, $email, $ip)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
        $this->ip= $ip;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contact')
            ->subject($this->subject)
            ->with('identification', '')
            ->with('name', $this->name)
            ->with('email', $this->email)
            ->with('ip', $this->ip)
            ->with('message', $this->message)
            ;
    }
}
