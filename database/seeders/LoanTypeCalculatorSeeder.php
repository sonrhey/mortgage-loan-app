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
                'description' => 'Loan Ammortization'
            ]
        ]);
    }
}
