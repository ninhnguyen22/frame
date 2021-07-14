<?php

namespace Nin\Libs\Notification;

interface NotificationDriver
{
    public function connect(): void;

    public function send(string $message): void;
}

