<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class TicketMail extends Mailable
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
    /**
     * TicketMail
     * Mailable dùng để gửi thông tin vé sau khi đặt thành công.
     * $data: mảng chứa booking_code, movie_title, seats, total, ticket_qr
     */
    public function build()
    {
        return $this->subject('Cinema Pro - Vé điện tử của bạn')
                    ->markdown('emails.ticket_markdown', ['data' => $this->data]);
    }
}