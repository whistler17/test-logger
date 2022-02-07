<?php

namespace Logger\Formatters;

use Logger\Entry;

interface FormatterInterface
{
    public function formattedMessage(Entry $entry): string;
}
