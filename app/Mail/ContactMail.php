<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->markdown('emails.index');
        // return $this->from('john@webslesson.info')->subject('New Customer Equiry')->view('emails.index')->with('data', $this->data);

        return $this->from($this->name)
            ->replyTo($this->email)
            ->subject('Έχετε ένα μήνυμα από ' . $this->name)
            ->view('emails.index');
    }
}
