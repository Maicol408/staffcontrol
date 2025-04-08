<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CredencialesEmpleadoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $email;
    public $password;

    public function __construct($nombre, $email, $password)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
    }

    public function build()
    {
        return $this->subject('Tus credenciales de acceso')
                    ->view('emails.credenciales-empleado');
    }
}
