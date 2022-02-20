<?php

namespace App\Models\Api;

use App\Models\Api\Income;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "income_id",
        "payback_date",
        "payback_interest",
        "paid",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function income()
    {
        return $this->belongsTo(Income::class);
    }
}