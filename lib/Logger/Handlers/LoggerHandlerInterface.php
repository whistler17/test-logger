<?php

namespace Logger\Handlers;

interface LoggerHandlerInterface
{
    public function handle($entryLevel, $entryMessage);
}
