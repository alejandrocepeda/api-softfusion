<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(\App\ActivitiesType::class, function(Faker\Generator $faker){
	return ['name'   => ucfirst($faker->word),
			'status' => $faker->boolean,];
});

$factory->define(\App\ActivitiesStatus::class, function(Faker\Generator $faker){
	return ['name' => ucfirst($faker->word)];
});

$factory->define(\App\Activity::class, function(Faker\Generator $faker){
	return ['title'                   => ucfirst($faker->word),
			'description'             => $faker->paragraph(1),
			'activity_type_id'        => \App\ActivitiesType::inRandomOrder()->first()->id,
			'activity_status_id'      => \App\ActivitiesStatus::inRandomOrder()->first()->id,
			'activity_call_status_id' => \App\CallStatus::inRandomOrder()->first()->id,
			'user_id'                 => \App\User::inRandomOrder()->first()->id,
			'assign_to'               => \App\User::inRandomOrder()->first()->id,
			'finish_at'               => $faker->date,
			'remember_at'             => $faker->optional()->date,
			'notified'                => $faker->boolean,];
});

$factory->define(\App\ActivitiesHistory::class, function(Faker\Generator $faker){
	return ['activity_id'        => \App\Activity::inRandomOrder()->first()->id,
			'activity_status_id' => \App\ActivitiesStatus::inRandomOrder()->first()->id,
	
	];
});

$factory->define(App\Address::class, function(Faker\Generator $faker){
	return ['address'    => $faker->address,
			'suite'      => $faker->streetAddress,
			'zipcode_id' => \App\Zipcode::inRandomOrder()->first()->id,
	
	];
});

$factory->define(\App\AnnualRevenue::class, function(Faker\Generator $faker){
	return ['name'   => ucfirst($faker->word),
			'value'  => $faker->randomNumber(5),
			'status' => $faker->boolean,];
});

/* @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Application::class, function(Faker\Generator $faker){
	return ['lead_id'               => \App\Lead::inRandomOrder()->first()->id,
			'loan_amount'           => $faker->randomNumber(5),
			'product_id'            => \App\Product::where('id','>',0)->where('id','<',5)->first()->id,
			'loan_purpose_id'       => \App\LoanPurpose::inRandomOrder()->first()->id,
			'business_id'           => \App\Business::inRandomOrder()->first()->id,
			'application_status_id' => \App\ApplicationStatus::inRandomOrder()->first()->id,
			'processor_id'          => \App\User::role('processor')->inRandomOrder()->first()->id,
			'bankruptcy'            => $faker->boolean,
			'collateral'            => $faker->boolean,
			'coborrower_id'         => \App\Contact::inRandomOrder()->first()->id,
			'exist_debt'            => $faker->optional()->randomNumber(3),
			'status'                => $faker->boolean,];
});

$factory->define(\App\ApplicationStatus::class, function(Faker\Generator $faker){
	return ['name'   => $faker->word,
			'step'   => $faker->randomNumber(1),
			'level'  => $faker->randomElement(['success', 'warning', 'danger']),
			'status' => $faker->boolean,];
});

$factory->define(\App\Attachment::class, function(Faker\Generator $faker){
	return ['url'         => $faker->url,
			'activity_id' => $faker->randomNumber(1), // \App\Activity::inRandomOrder()->first()->id,
	];
});

$factory->define(\App\BrokerInfo::class, function(Faker\Generator $faker){
	return [
	
	];
});

$factory->define(\App\Business::class, function(Faker\Generator $faker){
	return ['name'                 => $faker->company,
			'federal_tax_id'       => $faker->randomNumber(7),
			'address_id'           => \App\Address::inRandomOrder()->first()->id,
			'years_in_business_id' => \App\YearsInBusiness::inRandomOrder()->first()->id,
			'annual_revenue_id'    => \App\AnnualRevenue::inRandomOrder()->first()->id,
			'credit_score_id'      => \App\CreditScore::inRandomOrder()->first()->id,
			'industry_id'          => \App\Industry::inRandomOrder()->first()->id,
			'how_do_you_hear_id'   => \App\HowDoYouHear::inRandomOrder()->first()->id,
			'phone'                => 3145535632
,
			'phone_ext'            => $faker->randomNumber(3),
			'web'                  => $faker->domainName,
			'status'               => $faker->boolean,
	
	];
});

$factory->define(\App\City::class, function(Faker\Generator $faker){
	return ['name'     => ucfirst($faker->word),
			'state_id' => \App\State::inRandomOrder()->first()->id,];
});

$factory->define(\App\Contact::class, function(Faker\Generator $faker){
	return ['name'            => $faker->name,
			'email'           => $faker->email,
			'address_id'      => \App\Address::inRandomOrder()->first()->id,
			'business_id'     => \App\Business::inRandomOrder()->first()->id,
			'phone'           => 3145535632
,
			'phone_ext'       => $faker->randomNumber(3),
			'social_security' => $faker->randomNumber(8),
			'birthdate'       => $faker->optional()->date,
			'ownership'       => $faker->randomNumber(2),
			'status'          => $faker->boolean,];
});

$factory->define(\App\Country::class, function(Faker\Generator $faker){
	return ['name' => ucfirst($faker->word)];
});

$factory->define(\App\CreditScore::class, function(Faker\Generator $faker){
	return ['name'   => ucfirst($faker->word),
			'value'  => $faker->randomNumber(5),
			'status' => $faker->boolean,];
});

$factory->define(\App\DocumentType::class, function(Faker\Generator $faker){
	return ['name'                    => $faker->word,
			'document_periodicity_id' => $faker->randomNumber(2),
			'status'                  => $faker->boolean,];
});

$factory->define(\App\Document::class, function(Faker\Generator $faker){
	return ['name'             => $faker->word,
			'url'              => $faker->url,
			'document_type_id' => \App\DocumentType::inRandomOrder()->first()->id,
			];
});

$factory->define(\App\EmailsTemplate::class, function(Faker\Generator $faker){
	return ['title'   => ucfirst($faker->word),
			'subject' => $faker->sentence,
			'body'    => $faker->randomHtml(),
			'status'  => $faker->boolean,];
});

$factory->define(\App\Email::class, function(Faker\Generator $faker){
	return ['email_template_id' => \App\EmailsTemplate::inRandomOrder()->first()->id,
			'subject'           => $faker->sentence,
			'body'              => $faker->randomHtml(),
			'activity_id'       => $faker->numberBetween(1, 14),
	
	];
});

$factory->define(\App\HasOffers::class, function(Faker\Generator $faker){
	return ['lead_id'             => \App\Lead::inRandomOrder()->first()->id,
			'application_id'      => \App\Application::inRandomOrder()->first()->id,
			'transaction_id'      => str_random(10),
			'has_offer_status_id' => \App\HasOfferStatus::inRandomOrder()->first()->id,
			'offer_id'            => $faker->randomNumber(1),
			'affiliate_id'        => $faker->randomNumber(3),
			'broker_id'           => \App\User::role('broker')->inRandomOrder()->first()->id,
			'ip'                  => $faker->ipv4,];
});

$factory->define(\App\HasOfferStatus::class, function(Faker\Generator $faker){
	return ['name'   => $faker->word,
			'status' => $faker->boolean,];
});

$factory->define(\App\HowDoYouHear::class, function(Faker\Generator $faker){
	return ['name'   => ucfirst($faker->word),
			'status' => $faker->boolean,];
});

$factory->define(\App\Image::class, function(Faker\Generator $faker){
	return ['url'  => $faker->imageUrl(400, 400),
			'name' => $faker->name,];
});

$factory->define(\App\Industry::class, function(Faker\Generator $faker){
	return ['name'        => ucfirst($faker->word),
			'description' => $faker->paragraph,
			'status'      => $faker->boolean,];
});

$factory->define(\App\Lead::class, function(Faker\Generator $faker){
	return [
		
		'contact_id'     => \App\Contact::inRandomOrder()->first()->id,
		'executive_id'   => \App\User::role('broker')->inRandomOrder()->first()->id,
		'lead_status_id' => \App\LeadStatus::inRandomOrder()->first()->id,
		'follow_up'      => $faker->boolean,
		'source'         => $faker->url,
		'status'         => $faker->boolean,];
});

$factory->define(\App\LeadStatus::class, function(Faker\Generator $faker){
	return [
		
		'name'   => $faker->word,
		'step'   => $faker->randomNumber(1),
		'level'  => $faker->randomElement(['success', 'warning', 'danger']),
		'status' => $faker->boolean,
	
	];
});

$factory->define(\App\Lender::class, function(Faker\Generator $faker){
	return ['name'                    => ucfirst($faker->name),
			'email'                   => $faker->companyEmail,
			'contact_id'              => \App\Contact::inRandomOrder()->first()->id,
			'min_loan_size'           => $faker->optional()->randomNumber(5),
			'max_loan_size'           => $faker->optional()->randomNumber(9),
			'min_terms'               => $faker->optional()->randomNumber(1),
			'max_terms'               => $faker->optional()->randomNumber(2),
			'min_interest'            => $faker->optional()->randomFloat(1, 1, 10),
			'max_interest'            => $faker->optional()->randomFloat(1, 1, 10),
			'max_loan_position'       => $faker->optional()->randomNumber(1),
			'max_ltv'                 => $faker->optional()->randomNumber(1),
			'min_credit_score_id'     => \App\CreditScore::inRandomOrder()->first()->id,
			'years_in_business_id'    => \App\YearsInBusiness::inRandomOrder()->first()->id,
			'annual_revenue_id'       => \App\AnnualRevenue::inRandomOrder()->first()->id,
			'negative_days'           => $faker->optional()->randomNumber(1),
			'consolidation_refinance' => $faker->boolean,
			'weekly_payments'         => $faker->boolean,
			'puerto_rico'             => $faker->boolean,
			'favorite'                => $faker->boolean,
			'status'                  => $faker->boolean,];
});

$factory->define(\App\LoanPurpose::class, function(Faker\Generator $faker){
	return ['name'   => ucfirst($faker->word),
			'status' => $faker->boolean,];
});

$factory->define(\App\ParametersForm::class, function(Faker\Generator $faker){
	return ['name'                        => ucfirst($faker->word),
			'parameters_form_category_id' => \App\ParametersFormCategory::inRandomOrder()->first()->id,
			'status'                      => $faker->boolean,];
});

$factory->define(\App\ParametersFormCategory::class, function(Faker\Generator $faker){
	return ['name'   => ucfirst($faker->word),
			'status' => $faker->boolean,];
});

$factory->define(\Spatie\Permission\Models\Permission::class, function(Faker\Generator $faker){
	return ['name'        => ucfirst($faker->word),
			'description' => $faker->paragraph,];
});

$factory->define(\App\Product::class, function(Faker\Generator $faker){
	return ['name'       => ucfirst($faker->word),
			'status'     => $faker->boolean,
			'commercial' => $faker->boolean,];
});

$factory->define(\App\ReadItem::class, function(Faker\Generator $faker){
	return ['read'    => $faker->boolean,
			'user_id' => \App\User::inRandomOrder()->first()->id,
	
	];
});

$factory->define(\Spatie\Permission\Models\Role::class, function(Faker\Generator $faker){
	return ['name'        => ucfirst($faker->word),
			'description' => $faker->paragraph,];
});

$factory->define(\App\SenderEmail::class, function(Faker\Generator $faker){
	return ['name'   => ucfirst($faker->word),
			'email'  => $faker->email,
			'status' => $faker->boolean,];
});

$factory->define(\App\Signature::class, function(Faker\Generator $faker){
	return ['application_id' => \App\Application::inRandomOrder()->first()->id,
			'signature'      => $faker->sha1,
			'contact_id'     => \App\Contact::inRandomOrder()->first()->id,
			'signer_ip'      => $faker->ipv4,];
});

$factory->define(\App\State::class, function(Faker\Generator $faker){
	return ['name'       => ucfirst($faker->word),
			'country_id' => \App\Country::inRandomOrder()->first()->id,];
});

$factory->define(App\User::class, function(Faker\Generator $faker){
	static $password;
	
	return ['name'           => $faker->name,
			'email'          => $faker->unique()->safeEmail,
			'password'       => $password ?: $password = bcrypt('secret'),
			'remember_token' => str_random(10),
			'contact_id'     => \App\Contact::inRandomOrder()->first()->id,
			'status'         => $faker->boolean,];
});

$factory->define(\App\YearsInBusiness::class, function(Faker\Generator $faker){
	return ['name'   => ucfirst($faker->word),
			'order'  => $faker->unique()->randomNumber(2),
			'value'  => $faker->randomNumber(2),
			'status' => $faker->boolean,];
});

$factory->define(\App\Zipcode::class, function(Faker\Generator $faker){
	return ['id'        => $faker->unique()->randomNumber(8),
			'longitude' => $faker->longitude,
			'latitude'  => $faker->latitude,
			'city_id'   => \App\City::inRandomOrder()->first()->id,
			'county'    => $faker->city,];
});

/*
|--------------------------------------------------------------------------
| States User
|--------------------------------------------------------------------------
|
*/

$factory->state(App\User::class, 'image', function(Faker\Generator $faker){
	return ['image' => \Illuminate\Http\UploadedFile::fake()->image('avatar.jpg')];
});

$factory->state(App\User::class, 'dates', function(Faker\Generator $faker){
	return ['created_at' => now(), 'updated_at' => now()];
});

/*
|--------------------------------------------------------------------------
| States Lender
|--------------------------------------------------------------------------
|
*/

$factory->state(App\Lender::class, 'image', function(Faker\Generator $faker){
	return ['image' => \Illuminate\Http\UploadedFile::fake()->image('avatar.jpg')];
});

$factory->state(App\Lender::class, 'dates', function(Faker\Generator $faker){
	return ['created_at' => now(), 'updated_at' => now()];
});

/*
|--------------------------------------------------------------------------
| States Approval
|--------------------------------------------------------------------------
|
*/

$factory->define(\App\Periodicity::class, function(Faker\Generator $faker){
	return ['name'   => ucfirst($faker->word),
			'value'  => $faker->randomNumber(4),
			'status' => $faker->boolean,];
});


$factory->define(\App\Approval::class, function(Faker\Generator $faker){
	return ['lender_id'      => \App\Lender::inRandomOrder()->first()->id,
			'amount'         => $faker->randomNumber(4),
			'periodicity_id' => \App\Periodicity::inRandomOrder()->first()->id,
			'payback'        => $faker->randomNumber(4),
			'terms'          => $faker->randomNumber(4),
			'interest_rate'  => $faker->randomNumber(4),
			'application_id' => \App\Application::inRandomOrder()->first()->id,
			'status'         => $faker->boolean,
			'funded'         => $faker->boolean,];
});

/*
|--------------------------------------------------------------------------
| New processs
|--------------------------------------------------------------------------
|
*/

$factory->define(\App\Team::class, function(Faker\Generator $faker){
	return ['name' => ucfirst($faker->word),'user_id'=>\App\User::role('manager')->inRandomOrder()->first()->id,];
});

$factory->define(\App\CommisionsType::class, function(Faker\Generator $faker){
	return ['name' => ucfirst($faker->word),];
});

$factory->define(\App\MathOperator::class, function(Faker\Generator $faker){
	return ['name'  => ucfirst($faker->word),
			'value' => $faker->randomNumber(4),];
});

$factory->define(\App\DynamicVar::class, function(Faker\Generator $faker){
	return ['name'   => ucfirst($faker->word),
			'column' => ucfirst($faker->word),
			'table'  => ucfirst($faker->word),
			'status' => $faker->boolean,];
});

$factory->define(\App\CommisionRule::class, function(Faker\Generator $faker){
	return ['commision_type_id' => \App\CommisionsType::inRandomOrder()->first()->id,
			'dynamic_var_id'    => \App\DynamicVar::inRandomOrder()->first()->id,
			'math_operator_id'  => \App\MathOperator::inRandomOrder()->first()->id,
			'value'             => $faker->randomNumber(4),
			'commision'         => $faker->randomFloat(1, 1, 10),];
});
