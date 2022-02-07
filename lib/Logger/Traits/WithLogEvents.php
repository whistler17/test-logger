<?php

namespace Logger\Traits;

use Logger\LogLevel;

trait WithLogEvents
{
    public function error($entryMessage)
    {
        $this->addToLog(LogLevel::LEVEL_ERROR, $entryMessage);
    }

    public function info($entryMessage)
    {
        $this->addToLog(LogLevel::LEVEL_INFO, $entryMessage);
    }

    public function debug($entryMessage)
    {
        $this->addToLog(LogLevel::LEVEL_DEBUG, $entryMessage);
    }

    public function notice($entryMessage)
    {
        $this->addToLog(LogLevel::LEVEL_NOTICE, $entryMessage);
    }

    protected function addToLog($entryLevel, $entryMessage, $method = 'log')
    {
        if (method_exists($this, $method)) {
            $this->{$method}($entryLevel, $entryMessage);
        }
    }
}
