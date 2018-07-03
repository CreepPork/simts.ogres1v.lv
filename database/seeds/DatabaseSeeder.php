<?php

use Illuminate\Database\Seeder;
use App\Event;
use App\Gift;
use App\Recommendation;
use App\Work;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Have to run app:setup to make work factories work.
        Artisan::call('app:setup');

        // Make a user (tester) so we don't have to run an additional command.
        Artisan::call('make:user');

        // Event
        factory(Event::class, 8)->create();

        // Gift
        factory(Gift::class, 5)->create();

        // Recommendation
        factory(Recommendation::class, 3)->create();

        // Works
        // Planned works
        factory(Work::class, 20)->create(['work_status_id' => 1]);

        // Current works
        factory(Work::class, 20)->create(['work_status_id' => 2]);

        // Completed works
        factory(Work::class, 20)->create(['work_status_id' => 3]);
    }
}
