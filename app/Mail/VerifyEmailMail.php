<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmailMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $locale;
    public $activationUrl;

    public function __construct(User $user, $locale = 'ar')
    {
        $this->user = $user;
        $this->locale = $locale;
        // ✅ إضافة اللغة في رابط التفعيل
        $this->activationUrl = config('app.url') . '/activate/' . $user->activation_token . '?locale=' . $this->locale;
    }

    public function build()
    {
        $subject = $this->locale === 'en'
            ? 'Activate Your El Amar Account'
            : 'تفعيل حسابك في مجموعة العمار';

        $view = $this->locale === 'en'
            ? 'emails.verify-email-en'
            : 'emails.verify-email-ar';

        return $this->from(config('mail.from.address'), config('mail.from.name'))
                    ->replyTo(config('mail.from.address'), config('mail.from.name'))
                    ->subject($subject)
                    ->view($view)
                    ->with([
                        'user' => $this->user,
                        'activationUrl' => $this->activationUrl,
                    ]);
    }
}
