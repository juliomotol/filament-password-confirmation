<?php

namespace JulioMotol\FilamentPasswordConfirmation\Commands;

use Illuminate\Console\Command;

class FilamentPasswordConfirmationCommand extends Command
{
    public $signature = 'filament-password-confirmation';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
