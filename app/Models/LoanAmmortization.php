<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanAmmortization extends Model
{
    use HasFactory;

    protected $table = "loan_ammortizations";
    protected $fillable = [
        "base_loan_calculator_id",
        "title",
        "currency",
        "loan_amount",
        "interest_rate",
        "ammortization_period",
        "slug"
    ];

    public function loan_ammortization_details() {
        return $this->hasMany(LoanAmmortizationDetails::class, 'loan_ammortization_id');
    }
}
