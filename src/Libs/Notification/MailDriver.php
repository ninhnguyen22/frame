<?php

namespace Nin\Libs\Notification;

class MailDriver implements NotificationDriver
{
    protected string $mail;
    protected string $password;

    public function __construct(string $mail, string $password)
    {
        $this->mail = $mail;
        $this->password = $password;
    }

    public function connect(): void
    {
        // TODO: Connect mail with mail and password.
    }

    public function send(string $message): void
    {
        // TODO: mail send
    }
}
