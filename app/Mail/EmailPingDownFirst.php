<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Equipamento;

class EmailPingDownFirst extends Mailable
{
    use Queueable, SerializesModels;

    private $equipamento;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Equipamento $equipamento)
    {
        $this->equipamento = $equipamento;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $to = explode(',',env('NOTIFICAR_EMAILS'));
        $subject = "Alerta: perdemos conexão com " . $this->equipamento->ip;         

        return $this->view('emails.email_ping_down_first')
                    ->to($to)
                    ->subject($subject)
                    ->with([
                        'equipamento' => $this->equipamento,
                    ]);
    }
}
