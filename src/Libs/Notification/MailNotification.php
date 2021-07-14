<?php

namespace Nin\Libs\Notification;

class MailNotification extends Notification
{
    protected string $mail;
    protected string $password;

    public function __construct(string $mail, string $password)
    {
        $this->mail = $mail;
        $this->password = $password;
    }

    public function getDriver(): NotificationDriver
    {
        return new MailDriver($this->mail, $this->password);
    }

}
