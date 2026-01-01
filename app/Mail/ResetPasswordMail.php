<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $resetUrl;
    public $locale;

    public function __construct(string $resetUrl, string $locale = 'en')
    {
        $this->resetUrl = $resetUrl;
        $this->locale   = $locale;
    }

    public function build()
    {
        $subject = $this->locale === 'ar'
            ? 'إعادة تعيين كلمة المرور - مجموعة العمار'
            : 'Reset your El Amar password';

        return $this->subject($subject)
                    ->view('emails.reset-password')
                    ->with([
                        'resetUrl' => $this->resetUrl,
                        'locale'   => $this->locale,
                    ]);
    }
}
