<?php

use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(\App\Activity::class, 100)->create()->each(function ($staff) {
            factory(\App\Lead::class)->create()->activities()->save($staff);
        });

        factory(\App\Activity::class, 100)->create()->each(function ($staff) {
            factory(\App\Application::class)->create()->activities()->save($staff);
        });

        factory(\App\Activity::class, 100)->create()->each(function ($staff) {
            factory(\App\Lender::class)->create()->activities()->save($staff);
        });
    }
}
