<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreSettings extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function type()
    {
        return $this->belongsTo(StoreSettingTypes::class, 'setting_type_id');
    }

}
