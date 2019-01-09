<?php

use App\Lender;
use Illuminate\Database\Seeder;

/**
 * Class LenderPivotParamentersFormsSeeder.
 */
class LenderPivotParamentersFormsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Lender::find(61)->property_types()->syncWithoutDetaching(66);
        Lender::find(62)->property_types()->syncWithoutDetaching(67);
        Lender::find(63)->property_types()->syncWithoutDetaching(66);
        Lender::find(64)->property_types()->syncWithoutDetaching(66);
        Lender::find(65)->property_types()->syncWithoutDetaching(66);
        Lender::find(66)->property_types()->syncWithoutDetaching(66);
        Lender::find(67)->property_types()->syncWithoutDetaching(66);
        Lender::find(68)->property_types()->syncWithoutDetaching(66);
        Lender::find(69)->property_types()->syncWithoutDetaching(67);
        Lender::find(70)->property_types()->syncWithoutDetaching(66);
        Lender::find(71)->property_types()->syncWithoutDetaching(68);
        Lender::find(72)->property_types()->syncWithoutDetaching(66);
        Lender::find(73)->property_types()->syncWithoutDetaching(66);
        Lender::find(74)->property_types()->syncWithoutDetaching(66);
        Lender::find(75)->property_types()->syncWithoutDetaching(66);
        Lender::find(76)->property_types()->syncWithoutDetaching(67);
        Lender::find(77)->property_types()->syncWithoutDetaching(66);
        Lender::find(77)->property_types()->syncWithoutDetaching([66, 67]);
    }
}
