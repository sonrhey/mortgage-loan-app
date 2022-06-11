<?php

namespace App\Models\ViewModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $fillable = [
        "response_code",
        "message",
        "data"
    ];
}
