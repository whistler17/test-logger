<?php

namespace Logger\Formatters;

interface FormatterInterface
{
    public function format($text): string;
}
