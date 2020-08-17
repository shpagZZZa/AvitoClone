<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $data = $this->validator($request->all())->validate();
        Category::create($data);
        return redirect(route('categories'));
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string',
        ]);
    }
}
