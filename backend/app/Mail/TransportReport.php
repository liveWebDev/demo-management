<?php

namespace App\Mail;

use App\Models\Transport;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TransportReport extends Mailable
{
    use Queueable, SerializesModels;
    
    public $transport;
    
    
    /**
     * TransportReport constructor.
     *
     * @param \App\Models\Transport $transport
     */
    public function __construct(Transport $transport)
    {
        $this->transport = $transport;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.transport-report')->with('transport', $this->transport)
            ->subject('Transport Report');
    }
}
