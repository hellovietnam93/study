<?php

namespace studyhub\Mailers\Contracts;

interface MailerInterface
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
    public function sendTo($user, $subject, $view, $data = []);

    /**
     * Send an email with account activation link to user.
     *
     * @param $user
     * @param $code
     * @return mixed
     */
    public function emailAccountActivationUrl($user, $code);
}
