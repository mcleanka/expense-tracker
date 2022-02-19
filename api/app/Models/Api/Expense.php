<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        "income_id",
        "name",
        "owner",
        "amount",
        "date",
    ];

    protected $dates = [
        "date",
    ];
}