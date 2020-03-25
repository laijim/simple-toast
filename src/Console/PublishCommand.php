<?php

namespace Laijim\SimpleToast\Console;

use Illuminate\Console\Command;

class PublishCommand extends Command
{

    protected $signature = 'simple-toast:publish {--force : Overwrite any existing files}';

    protected $description = 'Publish static resources';

    public function handle()
    {
        $this->call('vendor:publish', [
            '--tag' => 'config',
            '--force' => $this->option('force'),
        ]);
        $this->call('vendor:publish', [
            '--tag' => 'html',
            '--force' => $this->option('force'),
        ]);
    }
}
