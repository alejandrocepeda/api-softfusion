<?php

use Illuminate\Database\Seeder;

/**
 * Class stateSeeder.
 */
class stateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [['id' => '1', 'name' => 'Alaska', 'country_id' => 1],
             ['id' => '2', 'name' => 'Alabama', 'country_id' => 1],
             ['id' => '3', 'name' => 'Arkansas', 'country_id' => 1],
             ['id' => '4', 'name' => 'Arizona', 'country_id' => 1],
             ['id' => '5', 'name' => 'California', 'country_id' => 1],
             ['id' => '6', 'name' => 'Colorado', 'country_id' => 1],
             ['id' => '7', 'name' => 'Connecticut', 'country_id' => 1],
             ['id' => '8', 'name' => 'District of Columbia', 'country_id' => 1],
             ['id' => '9', 'name' => 'Delaware', 'country_id' => 1],
             ['id' => '10', 'name' => 'Florida', 'country_id' => 1],
             ['id' => '11', 'name' => 'Georgia', 'country_id' => 1],
             ['id' => '12', 'name' => 'Hawaii', 'country_id' => 1],
             ['id' => '13', 'name' => 'Iowa', 'country_id' => 1],
             ['id' => '14', 'name' => 'Idaho', 'country_id' => 1],
             ['id' => '15', 'name' => 'Illinois', 'country_id' => 1],
             ['id' => '16', 'name' => 'Indiana', 'country_id' => 1],
             ['id' => '17', 'name' => 'Kansas', 'country_id' => 1],
             ['id' => '18', 'name' => 'Kentucky', 'country_id' => 1],
             ['id' => '19', 'name' => 'Louisiana', 'country_id' => 1],
             ['id' => '20', 'name' => 'Massachusetts', 'country_id' => 1],
             ['id' => '21', 'name' => 'Maryland', 'country_id' => 1],
             ['id' => '22', 'name' => 'Maine', 'country_id' => 1],
             ['id' => '23', 'name' => 'Michigan', 'country_id' => 1],
             ['id' => '24', 'name' => 'Minnesota', 'country_id' => 1],
             ['id' => '25', 'name' => 'Missouri', 'country_id' => 1],
             ['id' => '26', 'name' => 'Mississippi', 'country_id' => 1],
             ['id' => '27', 'name' => 'Montana', 'country_id' => 1],
             ['id' => '28', 'name' => 'North Carolina', 'country_id' => 1],
             ['id' => '29', 'name' => 'North Dakota', 'country_id' => 1],
             ['id' => '30', 'name' => 'Nebraska', 'country_id' => 1],
             ['id' => '31', 'name' => 'New Hampshire', 'country_id' => 1],
             ['id' => '32', 'name' => 'New Jersey', 'country_id' => 1],
             ['id' => '33', 'name' => 'New Mexico', 'country_id' => 1],
             ['id' => '34', 'name' => 'Nevada', 'country_id' => 1],
             ['id' => '35', 'name' => 'New York', 'country_id' => 1],
             ['id' => '36', 'name' => 'Ohio', 'country_id' => 1],
             ['id' => '37', 'name' => 'Oklahoma', 'country_id' => 1],
             ['id' => '38', 'name' => 'Oregon', 'country_id' => 1],
             ['id' => '39', 'name' => 'Pennsylvania', 'country_id' => 1],
             ['id' => '40', 'name' => 'Rhode Island', 'country_id' => 1],
             ['id' => '41', 'name' => 'South Carolina', 'country_id' => 1],
             ['id' => '42', 'name' => 'South Dakota', 'country_id' => 1],
             ['id' => '43', 'name' => 'Tennessee', 'country_id' => 1],
             ['id' => '44', 'name' => 'Texas', 'country_id' => 1],
             ['id' => '45', 'name' => 'Utah', 'country_id' => 1],
             ['id' => '46', 'name' => 'Virginia', 'country_id' => 1],
             ['id' => '47', 'name' => 'Vermont', 'country_id' => 1],
             ['id' => '48', 'name' => 'Washington', 'country_id' => 1],
             ['id' => '49', 'name' => 'Wisconsin', 'country_id' => 1],
             ['id' => '50', 'name' => 'West Virginia', 'country_id' => 1],
             ['id' => '51', 'name' => 'Wyoming', 'country_id' => 1],
             ['id' => '52', 'name' => 'Not Defined', 'country_id' => 1],
             ['id' => '53', 'name' => 'Puerto Rico', 'country_id' => 1],
             ['id' => '54', 'name' => 'Alberta', 'country_id' => 3],
             ['id' => '55', 'name' => 'British Columbia', 'country_id' => 3],
             ['id' => '56', 'name' => 'Manitoba', 'country_id' => 3],
             ['id' => '57', 'name' => 'New Brunswick', 'country_id' => 3],
             ['id' => '58', 'name' => 'Newfoundland And Labrador', 'country_id' => 3],
             ['id' => '59', 'name' => 'Northwest Territories', 'country_id' => 3],
             ['id' => '60', 'name' => 'Nova Scotia', 'country_id' => 3],
             ['id' => '61', 'name' => 'Nunavut', 'country_id' => 3],
             ['id' => '62', 'name' => 'Ontario', 'country_id' => 3],
             ['id' => '63', 'name' => 'Prince Edward Island', 'country_id' => 3],
             ['id' => '64', 'name' => 'Quebec', 'country_id' => 3],
             ['id' => '65', 'name' => 'Saskatchewan', 'country_id' => 3],
             ['id' => '66', 'name' => 'Yukon', 'country_id' => 3], ];

        DB::table('states')->insert($data);
    }
}
