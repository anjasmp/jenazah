<?php

namespace App\Mail;

use App\UserFamilies;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TransactionSuccess extends Mailable
{
    use Queueable, SerializesModels;


    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->from('support@upj.com', 'Support UPJ')
        ->subject('Bukti Pendaftaran | UPJ Masjid Baitul Haq')
        ->view('email.transaction-success');
    }
}
