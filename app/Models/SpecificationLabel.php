<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecificationLabel extends Model
{
    use HasFactory;

    public function specifications()
    {
        return $this->hasMany(Specification::class, 'specification_label_id', 'id');
    }
}
