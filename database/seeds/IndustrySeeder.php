<?php

use Illuminate\Database\Seeder;

/**
 * Class IndustrySeeder.
 */
class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [['id' => 1, 'name' => 'Accommodation and Food Services'],
                 ['id' => 2, 'name' => 'Administrative, Support, and Waste Management'],
                 ['id' => 3, 'name' => 'Agriculture, Forestry, Fishing and Hunting'],
                 ['id' => 4, 'name' => 'Arts, Entertainment, and Recreation'],
                 ['id' => 5, 'name' => 'Construction'],
                 ['id' => 6, 'name' => 'Educational Services'],
                 ['id' => 7, 'name' => 'Finance and Insurance'],
                 ['id' => 8, 'name' => 'Health Care and Social Assistance'],
                 ['id' => 9, 'name' => 'Information Technology'],
                 ['id' => 10, 'name' => 'Manufacturing'],
                 ['id' => 11, 'name' => 'Mining, Quarrying, and Oil and Gas Extraction'],
                 ['id' => 12, 'name' => 'Other Services (except Public Administration)'],
                 ['id' => 13, 'name' => 'Professional, Scientific, and Technical Services'],
                 ['id' => 14, 'name' => 'Public Administration'],
                 ['id' => 15, 'name' => 'Real Estate and Rental Leasing'],
                 ['id' => 16, 'name' => 'Research and Development'],
                 ['id' => 17, 'name' => 'Retail Trade'],
                 ['id' => 18, 'name' => 'Transportation and Warehousing'],
                 ['id' => 19, 'name' => 'Utilities'],
                 ['id' => 20, 'name' => 'Wholesale Trade'],
                 ['id' => 21, 'name' => 'Non profit'],
                 ['id' => 22, 'name' => 'Auto sales'],
                 ['id' => 23, 'name' => 'Accounting'],
                 ['id' => 24, 'name' => 'Lawyer'],
                 ['id' => 25, 'name' => 'Travel agency'],
                 ['id' => 26, 'name' => 'Landscaping'],
                 ['id' => 27, 'name' => 'Trucking'],
                 ['id' => 28, 'name' => 'Churches'],
                 ['id' => 29, 'name' => 'Printing'],
                 ['id' => 30, 'name' => 'Money service Business'],
                 ['id' => 31, 'name' => 'Casino'],
                 ['id' => 32, 'name' => 'Gyms'],
                 ['id' => 33, 'name' => 'Furniture stores'],
                 ['id' => 34, 'name' => 'Florist'],
                 ['id' => 35, 'name' => 'US Gov'],
                 ['id' => 36, 'name' => 'Pawn Shop'], ];

        DB::table('industries')->insert($data);
    }
}
