<?php

namespace studyhub\Mailers;

use studyhub\Mailers\Contracts\MailerInterface;

class Mailer implements MailerInterface
{
    /**
     * Send email to a specific user.
     *
     * @param $user
     * @param $subject
     * @param $view
     * @param array $data
     * @return mixed
     */
    public function sendTo($user, $subject, $view, $data = [])
    {
        $mailer = app('Illuminate\Mail\Mailer');
        $mailer->queue($view, $data, function ($message) use ($user, $subject) {
            $message->to($user->email)->subject($subject);
        });
    }

    /**
     * Send an email with account activation link to user.
     *
     * @param $user
     * @param $code
     * @return mixed
     */
    public function emailAccountActivationUrl($user, $code)
    {
        $subject = trans('mailer.account_activation_subject');
        $view = 'emails.auth.account_activation';
        $data = ['activationLink' => route('auth::activate', $code)];
        $this->sendTo($user, $subject, $view, $data);
    }
}
