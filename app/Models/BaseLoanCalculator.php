<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BaseLoanCalculator extends Model
{
    use HasFactory;

    protected $table = "base_loan_calculators";
    protected $fillable = [
        "loan_type_calculator_id",
        "added_by"
    ];

    public static function boot()
    {
        parent::boot();

        Static::creating(function($model){
            $model->added_by = Auth::user()->id;
        });
    }
}
