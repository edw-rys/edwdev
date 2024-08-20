<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConsuladoScheduleMail extends Mailable
{
    use Queueable, SerializesModels;

    public $detail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($detail)
    {
        $this->detail = $detail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.consulado-notify')
            ->subject($this->subject)
            ->with('detail', $this->detail)
            ;
    }
}
