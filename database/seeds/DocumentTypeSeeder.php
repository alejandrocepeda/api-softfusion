<?php

use App\DocumentType;
use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class DocumentTypeSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run()
	{
		
		DocumentType::create(['id' => '1', 'name' => 'Current Appraisal']);
		DocumentType::create(['id' => '2', 'name' => 'Rent Roll']);
		DocumentType::create(['id' => '3', 'name' => 'Credit Report']);
		DocumentType::create(['id' => '4', 'name' => 'Purchase Agreement']);
		DocumentType::create(['id' => '5', 'name' => 'Invoice']);
		DocumentType::create(['id' => '6', 'name' => 'Business Ownership Proof']);
		DocumentType::create(['id' => '7', 'name' => 'Not Defined']);
		DocumentType::create(['id' => '8', 'name' => 'Bank Statement']);
		DocumentType::create(['id' => '9', 'name' => 'Driver License']);
		DocumentType::create(['id' => '10', 'name' => 'Business License']);
		DocumentType::create(['id' => '11', 'name' => 'Income Taxes']);
		DocumentType::create(['id' => '12', 'name' => 'Pay Off Letter']);
		DocumentType::create(['id' => '13', 'name' => 'P & L']);
		DocumentType::create(['id' => '14', 'name' => 'Lease Agreement']);
		DocumentType::create(['id' => '15', 'name' => 'Loan Application']);
		DocumentType::create(['id' => '16', 'name' => 'Other']);
		DocumentType::create(['id' => '17', 'name' => 'Voided Check']);
		DocumentType::create(['id' => '18', 'name' => 'Credit Card Statements']);
		
		//brokers
		DocumentType::create(['id' => '19', 'name' => 'Contract']);
		DocumentType::create(['id' => '20', 'name' => 'ACH']);
		DocumentType::create(['id' => '21', 'name' => 'Voided Check']);
		DocumentType::create(['id' => '22', 'name' => 'W9']);
		
		\App\Product::find(1)->documentType()->attach(DocumentType::find(15), ['required'=>1,'order'=>1,'quantity'=>1,'periodicity_id'=>1]);
		\App\Product::find(1)->documentType()->attach(DocumentType::find(9), ['required'=>1,'order'=>3,'quantity'=>1,'periodicity_id'=>1]);
		\App\Product::find(1)->documentType()->attach(DocumentType::find(6), ['required'=>1,'order'=>3,'quantity'=>1,'periodicity_id'=>1]);
		\App\Product::find(1)->documentType()->attach(DocumentType::find(10), ['required'=>0,'order'=>3,'quantity'=>1,'periodicity_id'=>1]);
		\App\Product::find(1)->documentType()->attach(DocumentType::find(17), ['required'=>1,'order'=>3,'quantity'=>1,'periodicity_id'=>1]);
		\App\Product::find(1)->documentType()->attach(DocumentType::find(11), ['required'=>1,'order'=>3,'quantity'=>1,'periodicity_id'=>1]);
		\App\Product::find(1)->documentType()->attach(DocumentType::find(14), ['required'=>1,'order'=>3,'quantity'=>1,'periodicity_id'=>1]);
		\App\Product::find(1)->documentType()->attach(DocumentType::find(8), ['required'=>1,'order'=>2,'quantity'=>4,'periodicity_id'=>4]);
		
		\App\Product::find(2)->documentType()->attach(DocumentType::find(15), ['required'=>1,'order'=>1,'quantity'=>1,'periodicity_id'=>1]);
		\App\Product::find(2)->documentType()->attach(DocumentType::find(4), ['required'=>1,'order'=>1,'quantity'=>1,'periodicity_id'=>1]);
		\App\Product::find(2)->documentType()->attach(DocumentType::find(8), ['required'=>1,'order'=>1,'quantity'=>6,'periodicity_id'=>4]);
		\App\Product::find(2)->documentType()->attach(DocumentType::find(11), ['required'=>1,'order'=>1,'quantity'=>2,'periodicity_id'=>6]);
		\App\Product::find(2)->documentType()->attach(DocumentType::find(3), ['required'=>1,'order'=>1,'quantity'=>1,'periodicity_id'=>1]);
		\App\Product::find(2)->documentType()->attach(DocumentType::find(2), ['required'=>0,'order'=>1,'quantity'=>1,'periodicity_id'=>1]);
		
		\App\Product::find(3)->documentType()->attach(DocumentType::find(15), ['required'=>1,'order'=>1,'quantity'=>1,'periodicity_id'=>1]);
		\App\Product::find(3)->documentType()->attach(DocumentType::find(8), ['required'=>1,'order'=>1,'quantity'=>4,'periodicity_id'=>4]);
		\App\Product::find(3)->documentType()->attach(DocumentType::find(11), ['required'=>1,'order'=>1,'quantity'=>1,'periodicity_id'=>1]);
		\App\Product::find(3)->documentType()->attach(DocumentType::find(3), ['required'=>1,'order'=>1,'quantity'=>1,'periodicity_id'=>1]);
		\App\Product::find(3)->documentType()->attach(DocumentType::find(2), ['required'=>0,'order'=>1,'quantity'=>1,'periodicity_id'=>1]);
		\App\Product::find(3)->documentType()->attach(DocumentType::find(18), ['required'=>0,'order'=>1,'quantity'=>1,'periodicity_id'=>1]);
		
		\App\Product::find(4)->documentType()->attach(DocumentType::find(15), ['required'=>1,'order'=>1,'quantity'=>1,'periodicity_id'=>1]);
		\App\Product::find(4)->documentType()->attach(DocumentType::find(8), ['required'=>1,'order'=>1,'quantity'=>4,'periodicity_id'=>4]);
		\App\Product::find(4)->documentType()->attach(DocumentType::find(5), ['required'=>1,'order'=>1,'quantity'=>1,'periodicity_id'=>1]);
		
	}
}
