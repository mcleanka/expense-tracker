<?php

namespace App\Models\Api;

use App\Models\Api\Income;
use App\Models\User;
use Carbon\Carbon;
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

    protected $dates = [
        "payback_date",
    ];

    public function getPaybackInterestAttribute($value)
    {
        return number_format($value, 2, ".", ",");
    }

    public function getPaybackDateAttribute($value)
    {
        return (new Carbon($value))->format('jS F, Y');
    }

    public function getCreatedAtAttribute($value)
    {
        return (new Carbon($value))->format('jS F, Y');
    }

    public function getUpdatedAtAttribute($value)
    {
        return (new Carbon($value))->format('jS F, Y');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function income()
    {
        return $this->belongsTo(Income::class);
    }
}