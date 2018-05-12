<?php

namespace App\Console\Commands;


use App\User;
use App\Recipe;
use Illuminate\Console\Command;

class GenerateFoodplans extends Command
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
        $users = User::all();
        $bar = $this->output->createProgressBar(count($users));
        foreach ($users as $user) {
            $foodplan = $user->food_plan();
            $foodplanArray = [];
            foreach ($foodplan->days() as $day) {
                $foodplan->$day = Recipe::inRandomOrder()
                    ->whereNotIn('id', $foodplanArray)
                    ->first()
                    ->id;

                array_push($foodplanArray, $foodplan->$day);
            }
            $foodplan->save();
            $bar->advance();
        }
        $bar->finish();
        $this->info(' New foodplans have been generated.');
        return;
    }
}
