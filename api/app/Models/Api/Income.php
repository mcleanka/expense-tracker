<?php

namespace App\Models\Api;

use App\Models\User;
use Carbon\Carbon;
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

    public function getAmountAttribute($value)
    {
        return number_format($value, 2, ".", ",");
    }

    public function getDateAttribute($value)
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
}