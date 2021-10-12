<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model{

	protected $table = 'categories';
    protected $fillable = [
        'name',
        'description',
    ];

    public function products() {
        return $this->belongsToMany(Product::class, "product_category");
    }


}