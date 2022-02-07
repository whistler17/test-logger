<?php

namespace Logger\Formatters;

use Logger\Entry;

interface FormatterInterface
{
    public function format(Entry $entry): string;
}
