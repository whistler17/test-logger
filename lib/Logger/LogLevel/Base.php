<?php

namespace Logger\LogLevel;

abstract class Base implements LogLevelInterface
{
    protected string $code;

    protected string $status;

    public function code(): string
    {
        return $this->code;
    }

    public function status(): string
    {
        return $this->status;
    }
}
