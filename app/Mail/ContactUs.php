<?php

namespace App\Mail;

use App\Http\Requests\HomeContactRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $contact_email;
    public $subject;
    public $contact_message;

    /**
     * Create a new message instance.
     *
     * @param HomeContactRequest $request
     */
    public function __construct(HomeContactRequest $request)
    {
        $this->ini($request);
    }

    /**
     * @param $request
     */
    private function ini($request)
    {
        $this->name = $request->contact_name;
        $this->contact_email = $request->contact_email;
        $this->subject = $request->contact_subject;
        $this->contact_message = $request->contact_message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->from($this->contact_email,$this->name)
             ->subject($this->subject)
             ->to(env('DEFAULT_EMAIL'))
             ->view('emails.contact_us');
    }
}
