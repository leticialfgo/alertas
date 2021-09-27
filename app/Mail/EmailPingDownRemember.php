<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailPingDownRemember extends Mailable
{
    use Queueable, SerializesModels;

    private $equipamentos;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($equipamentos)
    {
        $this->equipamentos = $equipamentos;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $to = explode(',',$this->equipamento->emails);
        $subject = "Lembrete Alerta " . date("d/m/Y H:i");;         

        return $this->view('emails.email_ping_down_remember')
                    ->to($to)
                    ->subject($subject)
                    ->with([
                        'equipamentos' => $this->equipamentos
                    ]);
    }
}
