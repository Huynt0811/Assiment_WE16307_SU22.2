<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;
use phpDocumentor\Reflection\Types\Void_;
use Session;
use Cart;

session_start();

class IndexController extends Controller
{

    public function index()
    {
        $products = product::select('id', 'name', 'price', 'category_id', 'thumbnail_url', 'status')->get();
        $categories = category::select('id', 'name_category')->get();
        return view('welcome', [
            'products' => $products,
            'categories' => $categories
        ]);
    }
    public function trangchu()
    {
        $products = product::select('id', 'name', 'price', 'category_id', 'thumbnail_url', 'status')->get();
        $categories = category::select('id', 'name_category')->get();
        return view('pages.home', [
            'products' => $products,
            'categories' => $categories
        ]);
    }
    public function detail_product($product_id)
    {
        $products = product::select('id', 'name', 'price', 'category_id', 'thumbnail_url', 'status')->get();
        $categories = category::select('id', 'name_category')->get();
        // $proudct_detail = product
        $product_detail = product::select('id', 'name', 'price', 'category_id', 'thumbnail_url', 'status')->where('id', $product_id)->get();

        return view('pages.product_detail', [
            'products' => $products,
            'categories' => $categories,
            'product_detail' => $product_detail
        ]);
    }
    public function cart_save(Request $request)
    {
        $products = product::select('id', 'name', 'price', 'category_id', 'thumbnail_url', 'status')->get();
        $categories = category::select('id', 'name_category')->get();
        $productId = $request->productid_hidden;
        $quantity = $request->quantity;
        $product_info = product::select('id', 'name', 'price', 'category_id', 'thumbnail_url', 'status')->where('id', $productId)->get();

        return view('pages.show_cart', [
            'products' => $products,
            'categories' => $categories,
            'productId' => $productId,
            'quantity' => $quantity,
        ]);
    }
}