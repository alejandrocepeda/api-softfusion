<?php

use App\Industry;
use App\Lender;
use Illuminate\Database\Seeder;

/**
 * Class LenderPivotIndustrySeeder.
 */
class LenderPivotIndustrySeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run()
	{
		Lender::find(1)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Accounting',
																						  'Auto sales',
																						  'Finance and Insurance',
																						  'Lawyer',
																						  'Money service Business',
																						  'Non profit',])
																	->pluck('id')
																	->toArray());
		Lender::find(2)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Lawyer',
																						  'Non profit',])
																	->pluck('id')
																	->toArray());
		Lender::find(3)
			  ->industries()
			  ->syncWithoutDetaching(Industry::whereNotIn('name', ['Real Estate and Rental Leasing',
																   'Trucking',
																   'Landscaping',
																   'Travel agency',])->pluck('id')->toArray());
		Lender::find(4)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Non profit'])
																	->pluck('id')
																	->toArray());
		Lender::find(5)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Lawyer',
																						  'Accounting',
																						  'Non profit',
																						  'Travel agency',])
																	->pluck('id')
																	->toArray());
		Lender::find(6)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Manufacturing'])
																	->pluck('id')
																	->toArray());
		Lender::find(7)->industries()->syncWithoutDetaching(Industry::all()->pluck('id')->toArray());
		Lender::find(8)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Auto sales',
																						  'Accounting',
																						  'Non profit',
																						  'Travel agency',])
																	->pluck('id')
																	->toArray());
		//excel 10
		Lender::find(9)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Auto sales',
																						  'Non profit',])
																	->pluck('id')
																	->toArray());
		Lender::find(10)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Auto sales',
																						   'Accounting',
																						   'Non profit',
																						   'Finance and Insurance',
																						   'Lawyer',])
																	 ->pluck('id')
																	 ->toArray());
		Lender::find(11)->industries()->syncWithoutDetaching(Industry::all()->pluck('id')->toArray());
		Lender::find(12)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Auto sales',
																						   'Lawyer',
																						   'Non profit',
																						   'Pawn Shop',])
																	 ->pluck('id')
																	 ->toArray());
		Lender::find(13)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Manufacturing'])
																	 ->pluck('id')
																	 ->toArray());
		Lender::find(14)->industries()->syncWithoutDetaching(Industry::all()->pluck('id')->toArray());
		Lender::find(15)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Auto sales',
																						   'Finance and Insurance',
																						   'Non profit',])
																	 ->pluck('id')
																	 ->toArray());
		Lender::find(16)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Auto sales',
																						   'Lawyer',])
																	 ->pluck('id')
																	 ->toArray());
		Lender::find(17)->industries()->syncWithoutDetaching(Industry::whereIn('name', ['Auto sales'])
																	 ->pluck('id')
																	 ->toArray());
		
		//excel 20
		Lender::find(18)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Lawyer',
																						   'Travel agency',])
																	 ->pluck('id')
																	 ->toArray());
		Lender::find(19)->industries()->syncWithoutDetaching(Industry::all()->pluck('id')->toArray());
		Lender::find(20)->industries()->syncWithoutDetaching(Industry::all()->pluck('id')->toArray());
		Lender::find(21)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Lawyer',
																						   'Money service Business',
																						   'Auto sales',])
																	 ->pluck('id')
																	 ->toArray());
		Lender::find(22)->industries()->syncWithoutDetaching(Industry::all()->pluck('id')->toArray());
		Lender::find(23)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Money service Business',
																						   'Finance and Insurance',
																						   'Lawyer',])
																	 ->pluck('id')
																	 ->toArray());
		Lender::find(24)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Construction'])
																	 ->pluck('id')
																	 ->toArray());
		Lender::find(25)->industries()->syncWithoutDetaching(Industry::all()->pluck('id')->toArray());
		Lender::find(25)->industries()->syncWithoutDetaching([7  => ['favorite' => 1],
															  22 => ['favorite' => 1],
															  21 => ['favorite' => 1],]);
		Lender::find(26)->industries()->syncWithoutDetaching(Industry::whereIn('name', ['Construction',
																						'Mining, Quarrying, and Oil and Gas Extraction',
																						'Trucking',
																						'Auto sales',])
																	 ->pluck('id')
																	 ->toArray());
		Lender::find(27)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Lawyer',
																						   'Travel agency',
																						   'Non profit',])
																	 ->pluck('id')
																	 ->toArray());
		
		//excel 30
		Lender::find(28)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Auto sales'])
																	 ->pluck('id')
																	 ->toArray());
		Lender::find(29)->industries()->syncWithoutDetaching(Industry::all()->pluck('id')->toArray());
		Lender::find(30)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Auto sales', 'Lawyer'])
																	 ->pluck('id')
																	 ->toArray());
		Lender::find(31)->industries()->syncWithoutDetaching(Industry::all()->pluck('id')->toArray());
		Lender::find(32)->industries()->syncWithoutDetaching(Industry::all()->pluck('id')->toArray());
		Lender::find(33)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Money service Business',
																						   'Finance and Insurance',
																						   'Non profit',
																						   'Lawyer',])
																	 ->pluck('id')
																	 ->toArray());
		Lender::find(34)->industries()->syncWithoutDetaching(Industry::all()->pluck('id')->toArray());
		Lender::find(35)->industries()->syncWithoutDetaching(Industry::all()->pluck('id')->toArray());
		Lender::find(36)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Auto sales',
																						   'Finance and Insurance',
																						   'Travel agency',
																						   'Pawn Shop',])
																	 ->pluck('id')
																	 ->toArray());
		
		//excel 40
		Lender::find(37)
			  ->industries()
			  ->syncWithoutDetaching(Industry::whereNotIn('name', ['Real Estate and Rental Leasing',
																   'Finance and Insurance',
																   'Lawyer',])->pluck('id')->toArray());
		Lender::find(38)->industries()->syncWithoutDetaching(Industry::all()->pluck('id')->toArray());
		Lender::find(39)->industries()->syncWithoutDetaching(Industry::all()->pluck('id')->toArray());
		Lender::find(40)->industries()->syncWithoutDetaching(Industry::all()->pluck('id')->toArray());
		Lender::find(41)
			  ->industries()
			  ->syncWithoutDetaching(Industry::whereIn('name', ['Health Care and Social Assistance'])
											 ->pluck('id')
											 ->toArray());
		Lender::find(42)->industries()->syncWithoutDetaching(Industry::all()->pluck('id')->toArray());
		Lender::find(43)->industries()->syncWithoutDetaching(Industry::whereIn('name', ['Construction',
																						'Accounting',
																						'Real Estate and Rental Leasing',
																						'Non profit',])
																	 ->pluck('id')
																	 ->toArray());
		Lender::find(44)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Auto sales',
																						   'Non profit',
																						   'Real Estate and Rental Leasing',
																						   'Travel agency',
																						   'Lawyer',])
																	 ->pluck('id')
																	 ->toArray());
		Lender::find(45)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Auto sales',
																						   'Non profit',
																						   'Real Estate and Rental Leasing',
																						   'Travel agency',
																						   'Lawyer',])
																	 ->pluck('id')
																	 ->toArray());
		
		//Excel 50
		Lender::find(46)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Furniture stores',
																						   'Gyms',
																						   'Travel agency',
																						   'Lawyer',])
																	 ->pluck('id')
																	 ->toArray());
		Lender::find(46)->industries()->syncWithoutDetaching([22 => ['favorite' => 1]]);
		Lender::find(47)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Travel agency',
																						   'Lawyer',])
																	 ->pluck('id')
																	 ->toArray());
		Lender::find(47)->industries()->syncWithoutDetaching([7  => ['favorite' => 1],
															  15 => ['favorite' => 1],
															  21 => ['favorite' => 1],
															  22 => ['favorite' => 1],
															  27 => ['favorite' => 1],]);
		Lender::find(48)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Auto sales',
																						   'Trucking',
																						   'Finance and Insurance',
																						   'Lawyer',])
																	 ->pluck('id')
																	 ->toArray());
		Lender::find(49)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Auto sales',
																						   'Real Estate and Rental Leasing',
																						   'Finance and Insurance',
																						   'Lawyer',])
																	 ->pluck('id')
																	 ->toArray());
		Lender::find(50)->industries()->syncWithoutDetaching(Industry::all()->pluck('id')->toArray());
		Lender::find(51)->industries()->syncWithoutDetaching(Industry::all()->pluck('id')->toArray());
		Lender::find(52)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Non profit',
																						   'Lawyer',])
																	 ->pluck('id')
																	 ->toArray());
		Lender::find(53)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Lawyer'])
																	 ->pluck('id')
																	 ->toArray());
		Lender::find(53)->industries()->syncWithoutDetaching([22 => ['favorite' => 1],
															  7  => ['favorite' => 1],]);
		Lender::find(54)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Lawyer',
																						   'Auto sales',
																						   'Furniture stores',
																						   'Florist',])
																	 ->pluck('id')
																	 ->toArray());
		
		//Excel 60
		Lender::find(55)->industries()->syncWithoutDetaching(Industry::all()->pluck('id')->toArray());
		Lender::find(56)->industries()->syncWithoutDetaching(Industry::all()->pluck('id')->toArray());
		Lender::find(57)->industries()->syncWithoutDetaching(Industry::all()->pluck('id')->toArray());
		Lender::find(58)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Auto sales'])
																	 ->pluck('id')
																	 ->toArray());
		Lender::find(59)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Auto sales'])
																	 ->pluck('id')
																	 ->toArray());
		Lender::find(60)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Auto sales',
																						   'Non profit',
																						   'Lawyer',])
																	 ->pluck('id')
																	 ->toArray());
		Lender::find(60)->industries()->syncWithoutDetaching([5  => ['favorite' => 1],
															  8  => ['favorite' => 1],
															  27 => ['favorite' => 1],]);
		
		Lender::find(79)
			  ->industries()
			  ->syncWithoutDetaching(Industry::whereIn('name', ['Health Care and Social Assistance'])
											 ->pluck('id')
											 ->toArray());
		
		//Excel 2
		Lender::find(79)
			  ->industries()
			  ->syncWithoutDetaching(Industry::whereIn('name', ['Health Care and Social Assistance'])
											 ->pluck('id')
											 ->toArray());
		
		Lender::find(80)->industries()->syncWithoutDetaching(Industry::all()->pluck('id')->toArray());
		Lender::find(81)->industries()->syncWithoutDetaching(Industry::all()->pluck('id')->toArray());
		Lender::find(82)
			  ->industries()
			  ->syncWithoutDetaching(Industry::whereNotIn('name', ['Health Care and Social Assistance',
																   'Construction',
																   'US Gov',])->pluck('id')->toArray());
		
		Lender::find(83)->industries()->syncWithoutDetaching(Industry::whereIn('name', ['Manufacturing',
																						'Mining, Quarrying, and Oil and Gas Extraction',
																						'Retail Trade',
																						'US Gov',
																						'Other Services (except Public Administration)',
																						'Wholesale Trade',])
																	 ->pluck('id')
																	 ->toArray());
		
		Lender::find(84)
			  ->industries()
			  ->syncWithoutDetaching(Industry::whereIn('name', ['Health Care and Social Assistance'])
											 ->pluck('id')
											 ->toArray());
		Lender::find(85)->industries()->syncWithoutDetaching(Industry::whereIn('name', ['Construction'])
																	 ->pluck('id')
																	 ->toArray());
		Lender::find(86)->industries()->syncWithoutDetaching(Industry::all()->pluck('id')->toArray());
		Lender::find(87)
			  ->industries()
			  ->syncWithoutDetaching(Industry::whereIn('name', ['Mining, Quarrying, and Oil and Gas Extraction',
																'Manufacturing',
																'Professional, Scientific, and Technical Services',
																'Transportation and Warehousing',
																'Trucking',])->pluck('id')->toArray());
		
		Lender::find(102)->industries()->syncWithoutDetaching(Industry::whereNotIn('name', ['Construction',
																							'Finance and Insurance',
																							'Lawyer',
																							'Health Care and Social Assistance',
																							'US Gov',])
																	  ->pluck('id')
																	  ->toArray());
		Lender::find(60)->industries()->syncWithoutDetaching([27 => ['favorite' => 1],
															  18 => ['favorite' => 1],
															  10 => ['favorite' => 1],
															  17 => ['favorite' => 1],
															  20 => ['favorite' => 1],]);
	}
}
