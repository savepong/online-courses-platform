<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Sichikawa\LaravelSendgridDriver\SendGrid;

class SendGridMail extends Mailable
{
    use SendGrid;
    
    public function build()
    {
        return $this
            ->view('layouts.email')
            ->subject('Welcome')
            ->from('supporter@ideagital.com')
            ->to(['ideagital.mail@gmail.com'])
            ->sendgrid([
                'personalizations' => [
                    [
                        'substitutions' => [
                            ':myname' => 's-ichikawa',
                        ],
                    ],
                ],
            ]);
    }
}