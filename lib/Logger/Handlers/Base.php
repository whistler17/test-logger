<?php

namespace Logger\Handlers;

use Logger\Formatters\FormatterInterface;
use Logger\Traits\WithLogEvents;

abstract class Base implements LoggerHandlerInterface
{
    use WithLogEvents;

    protected bool $isEnabled;

    protected ?FormatterInterface $formatter;

    protected array $levels;

    public function __construct($params = [])
    {
        $this->isEnabled = $params['is_enabled'] ?? true;
        $this->formatter = $params['formatter'] ?? null;
        $this->levels = $params['levels'] ?? [];
    }

    public function setIsEnabled(bool $state)
    {
        $this->isEnabled = $state;
    }

    public function log(string $entryLevel, $entryMessage)
    {
        if (!$this->check()) {
            return;
        }

        $entryMessage = $this->formatter ? $this->formatter->format($entryMessage) : $entryMessage;

        $this->handle($entryLevel, $entryMessage);
    }

    protected function check(): bool
    {
        if (!$this->isEnabled) {
            return false;
        }

        foreach ($this->levels as $level) {
            list($code, $status) = $level;
        }

        return true;
    }

    protected function isEnabled()
    {
        return $this->isEnabled;
    }

    abstract function handle($entryLevel, $entryMessage);
}
