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

    protected function check($entryLevel): bool
    {
        if (empty($this->fileName)) {
            return false;
        }

        return parent::check($entryLevel);
    }

    public function handle($message)
    {
        $file = fopen($this->fileName, 'a+');

        fwrite($file, $message);
        fwrite($file, "\r\n");

        fclose($file);
    }
}
