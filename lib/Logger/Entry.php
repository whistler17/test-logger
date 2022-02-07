<?php

namespace Logger;

use Logger\LogLevel\LogLevelInterface;

class Entry
{
    protected string $message;

    protected LogLevelInterface $logLevel;

    public function __construct($message, LogLevelInterface $logLevel)
    {
        $this->logLevel = $logLevel;

        $this->message = $message;
    }

    public function level(): LogLevelInterface
    {
        return $this->logLevel;
    }

    public function message(): string
    {
        return $this->message;
    }
}
