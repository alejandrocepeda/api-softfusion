<?php

use App\Lender;
use App\State;
use Illuminate\Database\Seeder;

/**
 * Class LenderPivotStateSeeder.
 */
class LenderPivotStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $lender_61 = Lender::find(61);
        $lender_61->states()->attach(State::where('country_id', 1)->pluck('id')->toArray());

        $lender_63 = Lender::find(63);
        $lender_63->states()->attach(State::whereName('Florida')->pluck('id')->toArray());

        $lender_65 = Lender::find(65);
        $lender_65->states()->attach(State::whereIn('name', ['Arizona',
                                                         'California',
                                                         'Colorado',
                                                         'Florida',
                                                         'Hawaii',
                                                         'Nevada',
                                                         'Oregon',
                                                         'Texas',
                                                         'Washington',
                                                         'Georgia',
                                                         '', ])->pluck('id')->toArray());

        $lender_69 = Lender::find(69);
        $lender_69->states()->attach(State::whereName('Florida')->pluck('id')->toArray());

        $lender_70 = Lender::find(70);
        $lender_70->states()->attach(State::where('country_id', 1)->pluck('id')->toArray());

        $lender_74 = Lender::find(74);
        $lender_74->states()->attach(State::where('country_id', 1)->pluck('id')->toArray());

        $lender_78 = Lender::find(78);
        $lender_78->states()->attach(State::where('country_id', 1)->pluck('id')->toArray());
    }
}
