<?php

namespace Logger;

use Logger\Handlers\LoggerHandlerInterface;
use Logger\Traits\WithLogEvents;

class Logger
{
    use WithLogEvents;

    /** @var LoggerHandlerInterface[] */
    protected array $handlers;

    public function addHandler($handler)
    {
        $this->handlers[] = $handler;
    }

    public function log($entryLevel, $entryMessage)
    {
        try {
            foreach ($this->handlers as $handler) {
                $handler->log($entryLevel, $entryMessage);
            }
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
    }

    protected function handlers(): array
    {
        return $this->handlers;
    }
}
