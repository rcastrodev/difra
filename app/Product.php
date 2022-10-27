<?php

namespace App;

use App\Color;
use App\Category;
use App\ProductPicture;
use App\VariableProduct;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id',  'name', 'description', 'order', 'extra', 'extra2', 'extra3', 'extra4', 'extra5', 'extra6','extra7', 'outstanding'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductPicture::class);
    }

    public function variableProducts()
    {
        return $this->hasMany(VariableProduct::class);
    }
}
