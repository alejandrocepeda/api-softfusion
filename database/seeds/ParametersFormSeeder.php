<?php

use Illuminate\Database\Seeder;

/**
 * Class ParametersFormSeeder.
 */
class ParametersFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [['name' => 'own', 'parameters_form_category_id' => 1],
             ['name' => 'rent ', 'parameters_form_category_id' => 1],
             ['name' => 'living rent free', 'parameters_form_category_id' => 1],
             ['name' => 'other', 'parameters_form_category_id' => 1],
             ['name' => 'Fixed Rate', 'parameters_form_category_id' => 2],
             ['name' => 'Adjustable Rate', 'parameters_form_category_id' => 2],
             ['name' => 'Not Sure', 'parameters_form_category_id' => 3],
             ['name' => 'Conventional', 'parameters_form_category_id' => 3],
             ['name' => 'FHA', 'parameters_form_category_id' => 3],
             ['name' => 'VA', 'parameters_form_category_id' => 3],
             ['name' => 'USDA', 'parameters_form_category_id' => 3],
             ['name' => 'Lower Rate', 'parameters_form_category_id' => 4],
             ['name' => 'Debt Consolidation', 'parameters_form_category_id' => 4],
             ['name' => 'Home Improvement', 'parameters_form_category_id' => 4],
             ['name' => 'Cash Out', 'parameters_form_category_id' => 4],
             ['name' => 'Unsure', 'parameters_form_category_id' => 4],
             ['name' => 'Primary Residence', 'parameters_form_category_id' => 5],
             ['name' => 'Investment Property', 'parameters_form_category_id' => 5],
             ['name' => 'Second Home', 'parameters_form_category_id' => 5],
             ['name' => 'Unsure', 'parameters_form_category_id' => 6],
             ['name' => 'Checking/Savings/Cash', 'parameters_form_category_id' => 6],
             ['name' => 'Cash Gift', 'parameters_form_category_id' => 6],
             ['name' => 'Equity From Sale of Property', 'parameters_form_category_id' => 6],
             ['name' => 'Sale of Stock/Bonds/Etc', 'parameters_form_category_id' => 6],
             ['name' => 'No Down Payment', 'parameters_form_category_id' => 6],
             ['name' => 'Alimony/Child Support Income', 'parameters_form_category_id' => 7],
             ['name' => 'Automobile/Expense Account Income', 'parameters_form_category_id' => 7],
             ['name' => 'Boarder Income', 'parameters_form_category_id' => 7],
             ['name' => 'Foster Care', 'parameters_form_category_id' => 7],
             ['name' => 'Military Base Pay', 'parameters_form_category_id' => 7],
             ['name' => 'Military Clothes Allowance', 'parameters_form_category_id' => 7],
             ['name' => 'Military Combat Pay', 'parameters_form_category_id' => 7],
             ['name' => 'Military Flight Pay', 'parameters_form_category_id' => 7],
             ['name' => 'Military Hazard Pay', 'parameters_form_category_id' => 7],
             ['name' => 'Military Overseas Pay', 'parameters_form_category_id' => 7],
             ['name' => 'Military Prop Pay', 'parameters_form_category_id' => 7],
             ['name' => 'Military Quarters Allowance', 'parameters_form_category_id' => 7],
             ['name' => 'Military Rations Allowance', 'parameters_form_category_id' => 7],
             ['name' => 'Military Variable Housing Allowance', 'parameters_form_category_id' => 7],
             ['name' => 'Mortgage Credit Certificate (MCC)', 'parameters_form_category_id' => 7],
             ['name' => 'Notes Receivable/Installment', 'parameters_form_category_id' => 7],
             ['name' => 'Other Income', 'parameters_form_category_id' => 7],
             ['name' => 'Pension/Retirement Income', 'parameters_form_category_id' => 7],
             ['name' => 'Real Estate', 'parameters_form_category_id' => 7],
             ['name' => 'Mortgage Differential Income', 'parameters_form_category_id' => 7],
             ['name' => 'Social Security/Disability Income', 'parameters_form_category_id' => 7],
             ['name'                        => 'Subject Property Net Cash Flow (two-to-four unit owner-occupied properties)',
              'parameters_form_category_id' => 7, ],
             ['name' => 'Trailing Co-Borrower Income', 'parameters_form_category_id' => 7],
             ['name' => 'Trust Income', 'parameters_form_category_id' => 7],
             ['name' => 'Unemployment/Welfare Income', 'parameters_form_category_id' => 7],
             ['name' => 'VA Benefits (Non-education)', 'parameters_form_category_id' => 7],
             ['name' => 'Checking Account', 'parameters_form_category_id' => 8],
             ['name' => 'Savings', 'parameters_form_category_id' => 8],
             ['name' => 'Bridge Loan Not Deposited', 'parameters_form_category_id' => 8],
             ['name' => 'Cash-On-Hand', 'parameters_form_category_id' => 8],
             ['name' => 'Gift', 'parameters_form_category_id' => 8],
             ['name' => 'Gift of Equity', 'parameters_form_category_id' => 8],
             ['name' => 'Money Market Fund', 'parameters_form_category_id' => 8],
             ['name' => 'Mutual Funds', 'parameters_form_category_id' => 8],
             ['name' => 'Net Equity', 'parameters_form_category_id' => 8],
             ['name' => 'Other Liquid Asset', 'parameters_form_category_id' => 8],
             ['name' => 'Secured Borrowed Funds', 'parameters_form_category_id' => 8],
             ['name' => 'Trust Fund Account', 'parameters_form_category_id' => 8], ];

        DB::table('parameters_forms')->insert($data);
    }
}
