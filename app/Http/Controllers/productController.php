<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class productController extends Controller
{
    public function index()
    {
        $productsPaginate = product::select('id', 'name', 'price', 'category_id', 'thumbnail_url', 'status')->paginate(5);
        $categories = category::select('id', 'name_category')->get();
        return view(
            'product.list',
            [
                'products' => $productsPaginate,
                'categories' => $categories
            ]
        );
    }
    public function create()
    {
        $categories = category::select('id', 'name_category')->get();
        return view('product.create', ['categories' => $categories]);
    }
    public function store(Request $request)
    {
        // dump($request->thumbnail_url);
        $request->validate([
            'name' => 'required|min:6|max:50',
            'price' => 'required',
            'thumbnail_url' => 'required',
            'status' => 'required'
        ]);
        $messages = [
            'name.required' => 'Không được để trống tên sản phẩm',
            'name.min' => 'Tên sản phẩm tối thiểu 6 ký tự',
            'name.max' => 'Tên sản phẩm tối đa 50 ký tự',
            'price.required' => 'Không được để trống giá sản phẩm',
            'status.required' => 'Không được để trống Status'
        ];
        dd($messages);
        $product = new product();

        $product->fill($request->all());
        if ($request->hasFile('thumbnail_url')) {
            $thumbnail = $request->thumbnail_url;
            $thumbnailName = $thumbnail->hashName();
            $product->thumbnail_url = $thumbnail->storeAs('images/product', $thumbnailName);
        } else {
            $product->thumbnail = '';
        }
        $product->category_id = $request->category;
        $product->save();

        return redirect()->route('admin.product.list');
    }
    public function delete($id_product)
    {
        $product = product::find($id_product);
        $product->delete();
        return redirect()->back();
    }
    public function search(Request $request)
    {

        $output = '';
        $products = product::where('name', 'LIKE', '%' . $request->keyword . '%')->get();
        foreach ($products as $product) {
            $output += '<tr>
            <td>' . $product->id . '</td>   
            <td>' . $product->name . '</td>
            <td>' . $product->price . ' $</td>
            <td><img src="{{$product->thumbnail_url}}" alt=""></td>
            <td>
                {{$product->status?"Hoạt động":"Không hoạt động"}}
            </td>
            </tr>';
        }
        return response()->json($output);
    }
    public function edit(product $product)
    {
        $categories = category::select('id', 'name_category')->get();
        return view('product.edit', ['product' => $product, 'categories' => $categories],);
    }
}
// <td>
//                 <a href="">
//                     <button class="btn btn-warning">Sửa</button>
//                 </a>
//                 <form action="{{route("admin.product.delete",$product->id)}}" method="POST">
//                     @csrf
//                     @method("DELETE")
//                     <button class="btn btn-danger">Xoá</button>
//                 </form>
//             </td>