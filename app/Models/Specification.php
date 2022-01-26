<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    use HasFactory;

    public function label()
    {
        return $this->belongsTo(SpecificationLabel::class, 'specification_label_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_specifications');
    }
}
