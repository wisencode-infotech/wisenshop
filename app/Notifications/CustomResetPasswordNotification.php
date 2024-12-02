<?php

namespace App\Notifications;

use App\Models\EmailTemplate;
use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CustomResetPasswordNotification extends ResetPasswordNotification
{
    use Queueable;

    /**
     * Get the reset password URL for the given notifiable.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    protected function resetUrl($notifiable)
    {
        return url(route('frontend.password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        // Fetch the email template from the database
        $template = EmailTemplate::where('locale', app()->getLocale())->where('name', 'password_reset')->first();

        if(empty($template)){
            $template = EmailTemplate::where('locale', 'en')->where('name', 'password_reset')->first();
        }

        // Default values if template is not found
        $subject = $template->subject ?? 'Reset Password Notification';
        $body_text = $template->body_text ?? null;
        $body_html = $template->body_html ?? null;

        $placeholders = [
            '{{ reset_url }}' => $this->resetUrl($notifiable),
            '{{ user_email }}' => $notifiable->getEmailForPasswordReset(),
            '{{ app_name }}' => config('app.name'),
        ];

        $body_text = $body_text ? strtr($body_text, $placeholders) : null;
        $body_html = $body_html ? strtr($body_html, $placeholders) : null;

        $mailMessage = (new MailMessage)->subject($subject);

        if ($body_html) {
            $mailMessage->view('emails.password_reset_html', ['body_html' => $body_html, 'body_text' => $body_text]);
        }

        return $mailMessage;

    }
}
