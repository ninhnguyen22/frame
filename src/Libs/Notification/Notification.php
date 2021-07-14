<?php

namespace Nin\Libs\Notification;

abstract class Notification
{
    abstract public function getDriver(): NotificationDriver;

    public function send(string $message): void
    {
        $driver = $this->getDriver();
        $driver->connect();
        $driver->send($message);
    }
}
