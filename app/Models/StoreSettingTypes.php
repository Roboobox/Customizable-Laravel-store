<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreSettingTypes extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function settings()
    {
        return $this->hasMany(StoreSettings::class, 'setting_type_id');
    }

    public function setting()
    {
        return $this->hasOne(StoreSettings::class, 'setting_type_id')->first();
    }
}
