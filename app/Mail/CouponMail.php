<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Sichikawa\LaravelSendgridDriver\SendGrid;
use App\Coupon;

class CouponMail extends Mailable
{
    use SendGrid, Queueable, SerializesModels;

    public $coupon;
    public $course;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($coupon, $course)
    {
        $this->coupon = $coupon;
        $this->course = $course;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.coupon')->sendgrid([]);
    }
}
