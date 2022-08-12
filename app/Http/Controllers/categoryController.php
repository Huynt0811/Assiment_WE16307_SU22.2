<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class categoryController extends Controller
{
    public function index()
    {
        $categories = category::select('id', 'name_category')->get();

        return view('category.list', ['categories' => $categories]);
    }
    public function create()
    {
        return view('category.create');
    }
    public function delete($id_category)
    {
        $category = category::find($id_category);
        $category->delete();
        return redirect()->back();
    }
}