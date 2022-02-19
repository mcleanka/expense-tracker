<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "owner",
        "amount",
        "date",
    ];

    protected $dates = [
        "date",
    ];
}