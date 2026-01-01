<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewUserRegisteredMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $locale;

    public function __construct(User $user, $locale = 'ar')
    {
        $this->user = $user;
        $this->locale = $locale;
    }

    public function build()
    {
        if ($this->locale === 'en') {
            return $this->subject('🆕 New Customer Registered | El Amar Group')
                ->view('emails.new-user-en')
                ->with(['user' => $this->user]);
        }

        return $this->subject('📢 إشعار تسجيل عميل جديد | مجموعة العمار')
            ->view('emails.new-user')
            ->with(['user' => $this->user]);
    }
}
