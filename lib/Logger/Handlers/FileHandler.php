<?php

namespace Logger\Handlers;

use Logger\Entry;

class FileHandler extends Base
{
    protected string $fileName;

    public function __construct(array $params = [])
    {
        parent::__construct($params);

        $this->fileName = $params['filename'] ?? '';
    }

    protected function check($entryLevel): bool
    {
        if (empty($this->fileName)) {
            return false;
        }

        return parent::check($entryLevel);
    }

    public function handle(Entry $entry)
    {
        $file = fopen($this->fileName, 'a+');

        fwrite($file, $this->formatter->formattedMessage($entry));
        fwrite($file, "\r\n");

        fclose($file);
    }
}
