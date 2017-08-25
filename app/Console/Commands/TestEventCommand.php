<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Events\TestEvent;

class TestEventCommand extends Command
{
    protected $signature = 'pusher:test {message}';
    protected $description = 'pusher test';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        event(new TestEvent($this->argument('message')));
    }
}
