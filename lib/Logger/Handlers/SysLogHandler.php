<?php

namespace Logger\Handlers;

class SysLogHandler extends Base
{
    const DEFAULT_PREFIX = 'custom_debug';
    const DEFAULT_FLAGS = LOG_PID;
    const DEFAULT_FACILITY = LOG_USER;

    protected string $prefix;
    protected int $flags;
    protected int $facility;

    public function __construct(array $params = [])
    {
        parent::__construct($params);

        $this->prefix = $params['prefix'] ?? self::DEFAULT_PREFIX;
        $this->flags = $params['flags'] ?? self::DEFAULT_FLAGS;
        $this->facility = $params['facility'] ?? self::DEFAULT_FACILITY;
    }

    public function handle($entry)
    {
        # todo doesn't work for some reason :)

        openlog($this->prefix, $this->flags, $this->facility);

        syslog(
            LOG_INFO, # todo get priority based on entry's level
            $this->formatter->formattedMessage($entry)
        );

        closelog();
    }
}
