<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;

class AccountLocked extends Mailable
{
    use Queueable, SerializesModels;

    public $email;

    /**
     * Tạo một thông báo mới cho người dùng.
     *
     * @param string $email
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Xây dựng thông báo gửi qua email.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Thông báo tài khoản đã bị khóa')
                    ->view('admin.thanhvien.email_lock')
                    ->with([
                        'email' => $this->email,
                    ]);
    }
}
