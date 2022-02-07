<?php

namespace Logger\Handlers;

use Logger\Entry;

interface LoggerHandlerInterface
{
    public function handle(Entry $entry);
}
