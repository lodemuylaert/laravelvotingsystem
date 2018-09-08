<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ArteveldeDbReset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'artevelde:db:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'verwijderen database en uitvoeren artevelde:db:init';

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
        // Get variables from `.env`.
        $dbName = getenv('DB_DATABASE');

        // Drop database and initialize.
        $this->callSilent('artevelde:db:drop');
        $this->callSilent('artevelde:db:init');

        $this->comment("Database `${dbName}` reset!");
    }
}
