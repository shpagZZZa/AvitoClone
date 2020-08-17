<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view();
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $product = $this->saveProduct($request);
        $files = $request->file('image');
        $this->storeImages($files, $product);
        return redirect(route('product', $product->id));
    }

    public function preview(Request $request)
    {
        $product = $this->profileValidator($request->all())->validate();
        $product['user'] = auth()->user();
        $product['images'] = $request->file('images');
        return view('product.preview', compact('product'));
    }

    public function delete(Product $product)
    {
        $product->delete();
        return redirect(route('profile', auth()->user()->profile));
    }

    private function saveProduct(Request $request)
    {
        $data = $this->profileValidator($request->all())->validate();
        $data['category_id'] = $request->input('category');
        return auth()->user()->profile->products()->create($data);
    }

    private function storeImages(array $files, Product $product)
    {
        foreach ($files as $file)
        {
            $originalName = $file->getClientOriginalName();
            $name = hash('md5', $originalName);
            $extension = pathinfo($originalName)['extension'];
            $fullName = "$name.$extension";
            $path = '/storage/images/product/';
            $file->move(public_path().$path, $fullName);
            $product->images()->create(['path' => $path.$fullName]);
        }
    }

    private function profileValidator(array $data)
    {
        return Validator::make($data, [
            'name' => [],
            'description' => [],
            'price' => [],
            'tags' => [],
        ]);
    }
}