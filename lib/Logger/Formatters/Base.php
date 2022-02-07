<?php

namespace Logger\Formatters;

use Logger\Entry;

abstract class Base implements FormatterInterface
{
    const DEFAULT_MESSAGE_FORMAT = '%date%  %level_code%  %level%  %message%';
    const DEFAULT_DATE_FORMAT = 'Y-m-d H:i:s';

    protected string $messageFormat;
    protected string $dateFormat;

    public function __construct($messageFormat = self::DEFAULT_MESSAGE_FORMAT, $dateFormat = self::DEFAULT_DATE_FORMAT)
    {
        $this->messageFormat = $messageFormat;
        $this->dateFormat = $dateFormat;
    }

    public function format(Entry $entry): string
    {
        if ($this->messageFormat) {
            $message = $this->messageFormat;

            $message = str_replace('%date%', date($this->dateFormat, time()), $message);
            $message = str_replace('%level_code%', $entry->level()->code(), $message);
            $message = str_replace('%level%', $entry->level()->status(), $message);
            $message = str_replace('%message%', $entry->message(), $message);

            return $message;
        }

        return $entry->message();
    }
}
