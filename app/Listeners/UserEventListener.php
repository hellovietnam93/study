<?php

namespace studyhub\Listeners;

use Illuminate\Events\Dispatcher;
use studyhub\Events\UserHasRegistered;
use studyhub\Mailers\Contracts\MailerInterface;

class UserEventListener
{
    private $mailer;

    /**
     * Constructor.
     *
     * @param MailerInterface $mailer
     */
    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handler user registration event.
     *
     * @param UserHasRegistered $event
     */
    public function onUserRegister(UserHasRegistered $event)
    {
        $this->mailer->emailAccountActivationUrl($event->user, $event->user->activation_code);
    }

    /**
     * Subscribe all user events.
     *
     * @param Dispatcher $events
     */
    public function subscribe(Dispatcher $events)
    {
        $events->listen(
            \studyhub\Events\UserHasRegistered::class,
            'studyhub\Listeners\UserEventListener@onUserRegister'
        );
    }
}
