<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'city',
        'country',
        'postcode',
        'mobile',
        'user_id',
        'company_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
