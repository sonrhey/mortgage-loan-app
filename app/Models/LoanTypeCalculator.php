<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanTypeCalculator extends Model
{
  use HasFactory;

  protected $table = 'loan_type_calculators';
  protected $fillable = [
    'base_url',
    'slug',
    'is_enabled',
    'class_name',
    'description'
  ];
}
