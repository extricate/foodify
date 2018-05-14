<?php

namespace App\Console\Commands;


use App\User;
use App\Recipe;
use Illuminate\Console\Command;
use App\Listeners\GenerateFoodplans;

class CLIGenerateFoodplans extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'foodify:generate-foodplans';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the weekly foodplans for all users.';

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
        $this->info('--------------------------');
        $this->info('Initializing the foodplan generation sequence.');
        /**
         * Save all existing foodplans to the history of all users.
         */
        $this->call('foodify:save-foodplans');

        event(new GenerateFoodplans);

        $this->info(' New foodplans are being generated.');
        $this->info('--------------------------');

        return;
    }
}
