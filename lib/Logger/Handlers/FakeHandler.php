<?php

namespace Logger\Handlers;

use Logger\Entry;

class FakeHandler extends Base
{
    public function handle(Entry $entry)
    {
        // do nothing
    }
}
