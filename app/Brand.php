<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Brand extends Model{

	protected $table = 'brands';
    protected $fillable = [
        'name',
        'description',
    ];

    public function product() {
        return $this->hasMany(Product::class);
    }

}