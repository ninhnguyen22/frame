<?php

namespace Nin\Libs\Notification;

class SlackNotification extends Notification
{
    public function getDriver(): NotificationDriver
    {
        return new SlackDriver();
    }
}

