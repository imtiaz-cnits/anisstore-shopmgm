<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory, \App\Traits\HasStorageImage;

    protected $fillable = [
        'name',
        'logo',
        'status',
        'user_id',
    ];

    public function getLogoAttribute($value)
    {
        return $this->formatImageUrl($value);
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }

}
