<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<ProductFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    public function imageUrl(): string
    {
        if (str_starts_with($this->image, 'uploads/products/')) {
            return asset('storage/'.$this->image);
        }

        return asset('images/'.ltrim($this->image, '/'));
    }
}
