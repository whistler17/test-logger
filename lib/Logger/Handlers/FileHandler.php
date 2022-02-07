<?php

namespace Logger\Handlers;

class FileHandler extends Base
{
    protected string $fileName;

    public function __construct($params = [])
    {
        parent::__construct($params);

        $this->fileName = $params['filename'] ?? '';
    }

    protected function check(): bool
    {
        if (empty($this->fileName)) {
            return false;
        }

        return parent::check();
    }

    public function handle($entryLevel, $entryMessage)
    {
        $handle = fopen($this->fileName, 'a+');

        fwrite($handle, $entryMessage);
        fwrite($handle, "\r\n");

        fwrite($handle, "\r\n");

        fclose($handle);
    }
}
