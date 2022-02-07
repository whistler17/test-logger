<?php

namespace Logger\Formatters;

abstract class Base implements FormatterInterface
{
    protected string $entryFormat;
    protected string $dateFormat;

    public function __construct($entryFormat = '', $dateFormat = '')
    {
        $this->entryFormat = $entryFormat;
        $this->dateFormat = $dateFormat;
    }
}
