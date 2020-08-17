<?php


namespace App\Dto;


use App\Models\Category;
use App\Models\Product;

class ProductInfoDto
{
    public $img, $name, $price, $category, $instance, $created_at;

    public function __construct(Product $product)
    {
        $this->name = $product->name;
        $this->price = $product->price;
        $this->category = $product->category;
        $this->img = $product->images->first();
        $this->instance = $product;
        $this->created_at = $product->created_at;
    }

    private function getImg(Product $product)
    {
        return $product->images()->first();
    }
}
