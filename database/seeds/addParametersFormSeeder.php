<?php

use Illuminate\Database\Seeder;

/**
 * Class addParametersFormSeeder.
 */
class addParametersFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [['id' => 64, 'name' => 'GPM', 'parameters_form_category_id' => 2],
             ['id' => 65, 'name' => 'ARM', 'parameters_form_category_id' => 2],
             ['id' => 66, 'name' => 'Residential', 'parameters_form_category_id' => 9],
             ['id' => 67, 'name' => 'Commercial', 'parameters_form_category_id' => 9],
             ['id' => 68, 'name' => 'Construction', 'parameters_form_category_id' => 9],
             ['id' => 69, 'name' => 'Long-haul trucking', 'parameters_form_category_id' => 10],
             ['id' => 70, 'name' => 'ATM', 'parameters_form_category_id' => 10],
             ['id' => 71, 'name' => 'Airplanes', 'parameters_form_category_id' => 10],
             ['id' => 72, 'name' => 'Trains', 'parameters_form_category_id' => 10],
             ['id' => 73, 'name' => 'Boats', 'parameters_form_category_id' => 10],
             ['id' => 74, 'name' => 'Aircrafts', 'parameters_form_category_id' => 10],
             ['id' => 75, 'name' => 'Copiers', 'parameters_form_category_id' => 10],
             ['id' => 76, 'name' => 'Trucks', 'parameters_form_category_id' => 10],
             ['id' => 77, 'name' => 'Medical', 'parameters_form_category_id' => 10],
             ['id' => 78, 'name' => 'Construction', 'parameters_form_category_id' => 10], ];

        DB::table('parameters_forms')->insert($data);

        $data2 = [['id' => 10, 'name' => 'Purchase'],
              ['id' => 11, 'name' => 'Construction-permanent'],
    ];

        DB::table('loan_purposes')->insert($data2);
    }
}
