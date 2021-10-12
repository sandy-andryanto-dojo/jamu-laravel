<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Brand;
use App\Category;

class Product extends Model{

	protected $table = 'products';
    protected $fillable = [
        'code',
        'name',
        'price',
        'expired',
        'brand_id',
        'photos',
    ];

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class, "product_category");
    }

}