<?php

namespace IvanAquino\JetAdmin\Commands;

use Illuminate\Console\Command;

class JetAdminCommand extends Command
{
    public $signature = 'jet-admin';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
