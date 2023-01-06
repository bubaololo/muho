<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'image',
        'description',
    ];
    protected function image(): Attribute
    {
//        return Attribute::make(
//            get: fn ($value) => 'images/tmpimg/'.$value,
//        );
        return Attribute::make(
            get: fn ($value) => Storage::url($value),
        );
    }

}
