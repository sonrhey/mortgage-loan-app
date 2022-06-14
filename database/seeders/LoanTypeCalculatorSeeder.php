<?php

namespace Database\Seeders;

use App\Models\LoanTypeCalculator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoanTypeCalculatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LoanTypeCalculator::insert([
            [
                'base_url' => 'loan-ammortization-calculator',
                'slug' => 'loan-ammortization',
                'description' => 'Loan Ammortization',
                'is_enabled' => '',
                'class_name' => 'btn-primary'
            ],
            [
                'base_url' => '#',
                'slug' => 'loan-calculator-1',
                'description' => 'Loan Calculator 1',
                'is_enabled' => 'disabled',
                'class_name' => 'btn-warning'
            ],
            [
                'base_url' => '#',
                'slug' => 'loan-calculator-2',
                'description' => 'Loan Calculator 2',
                'is_enabled' => 'disabled',
                'class_name' => 'btn-danger'
            ]
        ]);
    }
}
