<?php

namespace Logger;

use Logger\LogLevel\Error;
use Logger\LogLevel\Info;
use Logger\LogLevel\Debug;
use Logger\LogLevel\Notice;

class LogLevel
{
    const LEVEL_ERROR = Error::class;

    const LEVEL_INFO = Info::class;

    const LEVEL_DEBUG = Debug::class;

    const LEVEL_NOTICE = Notice::class;
}
