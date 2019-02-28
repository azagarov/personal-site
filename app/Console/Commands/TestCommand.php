<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Hash;
use Storage;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info("I'm a test command");

//        $x = Storage::disk('s3')->allDirectories("images");
        $x = Storage::disk('s3')->allFiles("images");
        dd($x);

        return;
        $this->info(Hash::make('a'));
    }
}
