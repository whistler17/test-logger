<?php

namespace Logger\Handlers;

use Logger\Entry;
use Logger\Formatters\DefaultFormatter;
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
        $this->formatter = $params['formatter'] ?? new DefaultFormatter();
        $this->levels = $params['levels'] ?? [];
    }

    public function setIsEnabled(bool $state)
    {
        $this->isEnabled = $state;
    }

    public function log(string $entryLevel, $entryMessage)
    {
        if (!$this->check($entryLevel)) {
            return;
        }

        $entry = new Entry($entryMessage, (new $entryLevel));

        $this->handle($this->formatter->format($entry));
    }

    protected function check($entryLevel): bool
    {
        if (!$this->isEnabled()) {
            return false;
        }

        if (!class_exists($entryLevel) || !$this->hasSuitableLevel($entryLevel)) {
            return false;
        }

        return true;
    }

    protected function isEnabled(): bool
    {
        return $this->isEnabled;
    }

    protected function hasSuitableLevel($entryLevel): bool
    {
        if (!empty($this->levels)) {
            return in_array($entryLevel, $this->levels);
        }

        return true;
    }

    abstract function handle($message);
}
