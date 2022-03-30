<?php

namespace Abdulrahman\GenericChat\Commands;

use Illuminate\Console\Command;

class GenericChatCommand extends Command
{
    public $signature = 'generic-chat';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
