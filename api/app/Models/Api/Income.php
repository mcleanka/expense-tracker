<?php

namespace App\Models\Api;

use App\Models\User;
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
