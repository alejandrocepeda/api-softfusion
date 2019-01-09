<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function(Request $request){
    return $request->user();
});*/

Route::group(['prefix' => 'v1'], function () {
    //  approval ==================================================================================================.
    Route::apiResource('approvals', 'Api\Approval\ApprovalController');
    Route::apiResource('applications.approvals', 'Api\Application\ApplicationApprovalController');

    // Activities routes ===============================================================================================.
    Route::apiResource('activities', 'Api\Activity\ActivityController');
    Route::apiResource('activities.attachments', 'Api\Activity\ActivityAttachmentController');
    Route::apiResource('activities.emails', 'Api\Activity\ActivityEmailController');
    Route::apiResource('activities.activities-histories', 'Api\Activity\ActivityActivityHistoryController');
    Route::apiResource('activities-histories', 'Api\Activity\ActivitiesHistoryController');
    Route::apiResource('activities-statuses', 'Api\Activity\ActivitiesStatusController');
    Route::apiResource('activities-statuses.activities-histories', 'Api\Activity\ActivitiesStatusActivityHistoryController');
    Route::apiResource('activities-statuses.activities', 'Api\Activity\ActivitiesStatusActivityController');
    Route::apiResource('activities-types', 'Api\Activity\ActivitiesTypeController');
    Route::apiResource('activities-types.activities', 'Api\Activity\ActivitiesTypeActivityController');
    Route::apiResource('activities-call-statuses', 'Api\Activity\ActivityCallStatusController');

    // Address routes ==================================================================================================.
    Route::apiResource('addresses', 'Api\Address\AddressController');
    Route::apiResource('addresses.businesses', 'Api\Address\AddressBusinessController');
    Route::apiResource('addresses.contacts', 'Api\Address\AddressContactController');

    // Annual Revenues routes ============================================.
    Route::apiResource('annual-revenues', 'Api\AnnualRevenue\annualRevenueController');
    Route::apiResource('annual-revenues.businesses', 'Api\AnnualRevenue\AnnualRevenueBusinessController');
    Route::apiResource('annual-revenues.lenders', 'Api\AnnualRevenue\annualRevenueLenderController');

    // Applications routes =============================================================================================.
    Route::apiResource('applications', 'Api\Application\applicationController');
    Route::apiResource('applications.activities', 'Api\Application\ApplicationActivityController');
    Route::apiResource('applications.coborrowers', 'Api\Application\ApplicationCoborrowerController');
    Route::apiResource('applications.documents', 'Api\Application\ApplicationDocumentController');
    Route::apiResource('applications.has-offers', 'Api\Application\ApplicationHasOffersController');
    Route::apiResource('applications.read-items', 'Api\Application\ApplicationReadItemController');
    Route::apiResource('applications.signatures', 'Api\Application\ApplicationSignatureController');
    Route::apiResource('application-statuses', 'Api\Application\ApplicationStatusController');
    Route::apiResource('application-statuses.applications', 'Api\Application\ApplicationStatusApplicationController');

    // Attachment routes ===============================================================================================.
    Route::apiResource('attachments', 'Api\Attachment\AttachmentController');

    // Banks routes ====================================================================================================.
    Route::apiResource('banks', 'Api\Bank\bankController');

    // Businesses routes ===============================================================================================.
    Route::post('businesses/check-tax-id', 'Api\Business\BusinessController@checkTaxId');
    Route::apiResource('businesses', 'Api\Business\BusinessController')->except(['checkTaxId']);
    Route::apiResource('businesses.applications', 'Api\Business\BusinessApplicationController');
    Route::apiResource('businesses.addresses', 'Api\Business\BusinessAddressController');
    Route::apiResource('businesses.activities', 'Api\Business\BusinessActivityController');
    Route::apiResource('businesses.contacts', 'Api\Business\BusinessContactController');
    Route::apiResource('businesses.images', 'Api\Business\BusinessImageController');


    // Broker-infos routes ===============================================================================================.
    Route::apiResource('brokers', 'Api\User\BrokerController');
    Route::apiResource('broker-infos', 'Api\BrokerInfo\BrokerInfoController');
    Route::apiResource('broker-statuses', 'Api\User\BrokerStatusController');

    // Contacts routes =================================================================================================.
    Route::post('contacts/check-email', 'Api\Contact\ContactController@checkemail');
    Route::apiResource('contacts', 'Api\Contact\ContactController')->except(['checkemail']);
    Route::apiResource('contacts.addresses', 'Api\Contact\ContactAddressController');
    Route::apiResource('contacts.activities', 'Api\Contact\ContactActivityController');
    Route::apiResource('contacts.businesses', 'Api\Contact\ContactBusinessController');
    Route::apiResource('contacts.images', 'Api\Contact\ContactImageController');
    Route::apiResource('contacts.leads', 'Api\Contact\ContactLeadController');
    Route::apiResource('contacts.lenders', 'Api\Contact\ContactLenderController');
    Route::apiResource('contacts.signatures', 'Api\Contact\ContactSignatureController');
    Route::apiResource('contacts.users', 'Api\Contact\ContactUserController')->only(['index', 'update']);
    Route::apiResource('coborrowers.applications', 'Api\Contact\CoborrowerApplicationController');

    // Cities routes ===================================================================================================.
    Route::apiResource('cities', 'Api\City\cityController');
    Route::apiResource('cities.zipcodes', 'Api\City\cityZipcodeController');

    // Client Advanced ===================================================================================================.
    Route::apiResource('client-advanceds', 'Api\ClientAdvanced\clientAdvancedController');

    // Credit Scores ===================================================================================================.
    Route::apiResource('credit-scores', 'Api\CreditScore\CreditScoreController');
    Route::apiResource('credit-scores.businesses', 'Api\CreditScore\CreditScoreBusinessController');
    Route::apiResource('credit-scores.lenders', 'Api\CreditScore\CreditScoreLenderController');

    // Countries routes ================================================================================================.
    Route::apiResource('countries', 'Api\Country\countryController');
    Route::apiResource('countries.states', 'Api\Country\countryStateController');

    //Commisions routes
    Route::apiResource('commision-rules', 'Api\CommisionRule\CommisionRuleController');
    Route::apiResource('commisions-types', 'Api\CommisionRule\CommisionsTypeController');
    Route::apiResource('commisions-types.commision-rules', 'Api\CommisionRule\CommisionsTypeCommisionRuleController');

    // Document routes =================================================================================================.
    Route::apiResource('documents', 'Api\Document\DocumentController');
    Route::apiResource('document-types', 'Api\Document\DocumentTypeController');
    Route::apiResource('document-types.documents', 'Api\Document\DocumentTypeDocumentController');
    Route::apiResource('documents-periodi-cities', 'Api\DocumentsPeriodiCity\DocumentsPeriodiCityController');

    //Dinamic Var routes
    Route::apiResource('dynamic-vars', 'Api\DynamicVar\DynamicVarController');
    Route::apiResource('dynamic-vars.commision-rules', 'Api\DynamicVar\DynamicVarCommisionRuleController');

    // Emails_templates routes =========================================================================================.
    Route::apiResource('emails', 'Api\Email\EmailController');
    Route::apiResource('emails-templates', 'Api\Email\EmailsTemplateController');
    Route::apiResource('emails-templates.emails', 'Api\Email\EmailsTemplateEmailController');
    Route::apiResource('sender-emails', 'Api\SenderEmail\SenderEmailController');
    Route::apiResource('sender-emails.emails', 'Api\SenderEmail\SenderEmailEmailController');

    // Hasoffers routes ================================================================================================.
    Route::apiResource('has-offers', 'Api\HasOffers\HasOffersController');
    Route::apiResource('has-offer-statuses', 'Api\HasOffers\HasOfferStatusController');
    Route::apiResource('has-offer-statuses.has-offers', 'Api\HasOffers\HasOfferStatusHasOffersController');

    // How do you hear =================================================================================================.
    Route::apiResource('how-do-you-hears', 'Api\HowDoYouHear\HowDoYouHearController');
    Route::apiResource('how-do-you-hears.businesses', 'Api\HowDoYouHear\HowDoYouHearBusinessController'); //cambiar a leads

    // Images routes ===================================================================================================.
    Route::apiResource('images', 'Api\Image\imageController');

    // Industries routes ===============================================================================================.
    Route::apiResource('industries', 'Api\Industry\industryController');
    Route::apiResource('industries.businesses', 'Api\Industry\IndustryBusinessController');

    // Leads routes ====================================================================================================.
    Route::apiResource('leads', 'Api\Lead\LeadController');
    Route::apiResource('leads.activities', 'Api\Lead\LeadActivityController');
    Route::apiResource('leads.applications', 'Api\Lead\LeadApplicationController');
    Route::apiResource('leads.has-offers', 'Api\Lead\LeadHasOffersController');
    Route::apiResource('leads.read-items', 'Api\Lead\LeadReadItemController');
    Route::apiResource('lead-statuses', 'Api\Lead\LeadStatusController');

    // Lenders =========================================================================================================.
    Route::post('lenders/check-email', 'Api\Lender\LenderController@checkemail');
    Route::apiResource('lenders', 'Api\Lender\LenderController')->except('checkemail');
    Route::apiResource('lenders.activities', 'Api\Lender\LenderActivityController');
    Route::apiResource('lenders.approvals', 'Api\Lender\LenderApprovalController');
    Route::apiResource('lenders.images', 'Api\Lender\LenderImageController');
    Route::apiResource('lenders.industries', 'Api\Lender\LenderIndustryController');
    Route::apiResource('lenders.products', 'Api\Lender\LenderProductController');
    Route::apiResource('lenders.property-types', 'Api\Lender\LenderPropertyTypesController');
    Route::apiResource('lenders.states', 'Api\Lender\LenderStateController');

    // Loan purpose routes =============================================================================================.
    Route::apiResource('loan-purposes', 'Api\LoanPurpose\loanPurposeController');
    Route::apiResource('loan-purposes.applications', 'Api\LoanPurpose\LoanPurposeApplicationController');

    // Oauth ===========================================================================================================.
    Route::post('oauth/login', 'Api\Passport\passportController@login');
    Route::post('oauth/token', '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');

    //Math-operators routes
    Route::apiResource('math-operators', 'Api\MathOperator\MathOperatorController');
    Route::apiResource('math-operators.commision-rules', 'Api\MathOperator\MathOperatorCommisionRuleController');

    // Password ========================================================================================================.
    Route::post('password/email', 'Auth\ForgotPasswordController@getResetPassword');
    Route::post('password/reset', 'Auth\ResetPasswordController@setResetPassword');

    // Parameters Form routes ==========================================================================================.
    Route::apiResource('parameters-form', 'Api\ParametersForm\ParametersFormController');
    Route::apiResource('parameters-form-categories', 'Api\ParametersForm\ParametersFormCategoryController');
    Route::apiResource('parameters-form-categories.parameters', 'Api\ParametersForm\ParametersFormCategoryParametersController');

    // Periodicities ========================================================================================================.
    Route::apiResource('periodicities', 'Api\Periodicity\PeriodicityController');
    Route::apiResource('periodicities.approvals', 'Api\Periodicity\PeriodicityApprovalController');
    Route::apiResource('periodicities.documents-periodicities', 'Api\Periodicity\PeriodicityDocumentsPeriodicityController');

    // Permissions ======================================================================================================.
    Route::apiResource('permissions', 'Api\Permission\permissionController');
    Route::apiResource('permissions.roles', 'Api\Permission\PermissionRoleController');
    Route::apiResource('permissions.users', 'Api\Permission\PermissionUserController');
    Route::apiResource('roles.permissions', 'Api\Permission\RolePermissionController');

    // Products ========================================================================================================.
    Route::apiResource('products', 'Api\Product\productController');
    Route::apiResource('products.applications', 'Api\Product\ProductApplicationController');

    // Read Item routes ================================================================================================.
    Route::apiResource('read-items', 'Api\ReadItem\ReadItemController');

    // Roles ===========================================================================================================.
    Route::apiResource('roles', 'Api\Permission\roleController');
    Route::apiResource('roles.permissions', 'Api\Permission\RolePermissionController');
    Route::apiResource('roles.users', 'Api\Permission\RoleUserController');

    // signature routes ================================================================================================.
    Route::apiResource('signatures', 'Api\Signature\SignatureController');

    // State routes ====================================================================================================.
    Route::apiResource('states', 'Api\State\stateController');
    Route::apiResource('states.cities', 'Api\State\stateCityController');
    Route::apiResource('states.lenders', 'Api\State\stateLenderController');

    // Team routes =====================================================================================================.
    Route::apiResource('teams', 'Api\Team\TeamController');
    Route::apiResource('teams.users', 'Api\Team\TeamUserController');
    Route::apiResource('teams.activities', 'Api\Team\TeamActivityController');
    Route::apiResource('teams.images', 'Api\Team\TeamImageController');
    
    // Underwritings routes ============================================================================================.
    Route::apiResource('underwritings', 'Api\Underwriting\underwritingController');

    // Users routes ====================================================================================================.
    Route::apiResource('users/me', 'Api\User\meController');
    Route::apiResource('users', 'Api\User\userController');
    Route::apiResource('users.activities', 'Api\User\UserActivityController');
    Route::apiResource('users.applications', 'Api\User\UserApplicationController');
    Route::apiResource('users.has-offers', 'Api\User\UserHasOfferController');
    Route::apiResource('users.leads', 'Api\User\UserLeadController');
    Route::apiResource('users.permissions', 'Api\User\UserPermissionController');
    Route::apiResource('users.roles', 'Api\User\UserRoleController');

    // Year in Business routes =========================================================================================.
    Route::apiResource('years-in-business', 'Api\YearsInBusiness\yearsInBusinessController');
    Route::apiResource('years-in-business.businesses', 'Api\YearsInBusiness\YearsInBusinessBusinessController');
    Route::apiResource('years-in-business.lenders', 'Api\YearsInBusiness\YearsInBusinessLenderController');

    // Zipcode routes ==================================================================================================.
    Route::apiResource('zipcodes', 'Api\Zipcode\zipcodeController');


});
