<?php

namespace App\Models\Api;

use App\Models\Api\Income;
use App\Models\User;
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function income()
    {
        return $this->belongsTo(Income::class);
    }
}