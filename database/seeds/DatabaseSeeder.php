<?php

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder.
 */
class DatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run()
	{
		
		$this->call(RoleSeeder::class);
		$this->call(PermissionSeeder::class);
		
		$this->call(productSeeder::class);
		$this->call(YearInBusinessSeeder::class);
		$this->call(HowDoYouHearSeeder::class);
		$this->call(ParametersFormCategorySeeder::class);
		$this->call(ParametersFormSeeder::class);
		$this->call(AnnualRevenueSeeder::class);
		$this->call(countrySeeder::class);
		
		//run seeder in api
		$this->call(addParametersFormSeeder::class);
		$this->call(IndustrySeeder::class);
		$this->call(LenderSeeder::class);
		$this->call(stateSeeder::class);
		$this->call(CreditScoreSeeder::class);
		$this->call(LenderPivotStateSeeder::class);
		$this->call(LenderPivotIndustrySeeder::class);
		$this->call(LenderPivotParamentersFormsSeeder::class);
		$this->call(LenderPivotProductSeeder::class);
		
		//seeder with too much data
		$this->call(zipcodeSeeder::class);
		$this->call(AddressSeeder::class);
		$this->call(BusinessSeeder::class);
		$this->call(ContactSeeder::class);
		$this->call(citySeeder::class);
		
		//new make jeyson
		$this->call(LeadStatusSeeder::class);
		$this->call(BrokerStatusSeeder::class);
		$this->call(UsersTableSeeder::class);
		$this->call(LeadSeeder::class);
		
		//para pruebas ya que no son datos reales
		$this->call(ApplicationStatusSeeder::class);
		$this->call(loanPurposeSeeder::class);
		$this->call(ApplicationSeeder::class);
		
		//Datos de prueba para construcion de activities
		$this->call(ActivitiesStatusSeeder::class);
		$this->call(CallStatusSeeder::class);
		$this->call(ActivitiesTypeSeeder::class);
		$this->call(ActivitySeeder::class);
		$this->call(AttachmentSeeder::class);
		
		//Datos de prueba para construcion de email
		$this->call(SenderEmailSeeder::class);
		$this->call(EmailsTemplateSeeder::class);
		$this->call(EmailSeeder::class);
		
		$this->call(SignatureSeeder::class);
		$this->call(ActivitiesHistorySeeder::class);
		$this->call(DocumentTypeSeeder::class);
		$this->call(DocumentSeeder::class);
		$this->call(ReadItemSeeder::class);
		
		$this->call(PeriodiCitySeeder::class);
		$this->call(ApprovalSeeder::class);
		
		$this->call(CommisionsTypeSeeder::class);
		$this->call(DynamicVarSeeder::class);
		$this->call(MathOperatorSeeder::class);
		$this->call(CommisionRuleSeeder::class);
		$this->call(TeamSeeder::class);
		
		$this->call(HasOfferStatusSeeder::class);
		$this->call(HasOffersTableSeeder::class);
		
		$this->call(BankSeeder::class);
		$this->call(BrokerInfoSeeder::class);
		
	}
}
