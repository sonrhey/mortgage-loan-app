<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanAmmortizationDetails extends Model
{
    use HasFactory;

    protected $table = "loan_ammortization_details";
    protected $fillable = [
        "loan_ammortization_id",
        "month",
        "payment",
        "principal",
        "interest",
        "balance"
    ];
}
