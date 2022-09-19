<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Carbon;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nama,$text,$module)
    {
        //
        $now = Carbon::now();
        $this->nama = $nama;
        $this->text = $text;
        $this->module = $module.' '.$now;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this->from('admiskripsi1@gmail.com')
            ->view('email')
            ->subject($this->module)
            ->with([
                'nama' => $this->nama,
                'text' => $this->text
            ]);
    }
}
