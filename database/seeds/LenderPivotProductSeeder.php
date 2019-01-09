<?php

use App\Lender;
use Illuminate\Database\Seeder;

/**
 * Class LenderPivotProductSeeder.
 */
class LenderPivotProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Lender::where('id', '>=', 1)->where('id', '<=', 60)->each(function ($item) {
            $item->products()->syncWithoutDetaching([1, 4]);
        });
        Lender::where('id', '>=', 61)->where('id', '<=', 78)->each(function ($item) {
            $item->products()->syncWithoutDetaching([5]);
        });
        Lender::where('id', '>=', 79)->where('id', '<=', 87)->each(function ($item) {
            $item->products()->syncWithoutDetaching([6]);
        });
        Lender::where('id', '>=', 88)->where('id', '<=', 92)->each(function ($item) {
            $item->products()->syncWithoutDetaching([7]);
        });
        Lender::where('id', '>=', 93)->where('id', '<=', 101)->each(function ($item) {
            $item->products()->syncWithoutDetaching([8, 2]);
        });
        Lender::find(102)->products()->syncWithoutDetaching([3]);
        Lender::where('id', '>=', 103)->where('id', '<=', 105)->each(function ($item) {
            $item->products()->syncWithoutDetaching([9]);
        });
    }
}
