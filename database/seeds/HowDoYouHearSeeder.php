<?php

use Illuminate\Database\Seeder;

/**
 * Class HowDoYouHearSeeder.
 */
class HowDoYouHearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            ['id' => '1', 'name' => 'Blog/Article'],
            ['id' => '2', 'name' => 'Direct Mail'],
            ['id' => '3', 'name' => 'Email Marketing'],
            ['id' => '4', 'name' => 'Google Search'],
            ['id' => '5', 'name' => 'Personal Reference'],
            ['id' => '6', 'name' => 'Sales Associate'],
            ['id' => '7', 'name' => 'Social Media'],
            ['id' => '8', 'name' => 'Word of Mouth'],
            ['id' => '9', 'name' => 'Other'],
        ];

        DB::table('how_do_you_hears')->insert($data);
    }
}
