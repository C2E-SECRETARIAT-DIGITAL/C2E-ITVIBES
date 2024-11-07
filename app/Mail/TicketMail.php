<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketMail extends Mailable
{
    use Queueable, SerializesModels;
    public $maildata;
    public $pdf;
    public $pdf_nom;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($maildata, $pdf, $pdf_nom)
    {
        $this->maildata = $maildata;
        $this->pdf = $pdf ;
        $this->pdf_nom = $pdf_nom;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd($this->maildata);
        return $this->markdown('emails.TicketMail')
                ->subject("Ticket de l'activité It-PAIYA")
                ->attachData($this->pdf->output(), $this->pdf_nom);
    }
}
