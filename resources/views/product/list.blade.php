@extends('layout.master')
@section('title','Danh sach san pham')
@section('content-title','Danh sach san pham')
@section('content')
<a href="{{route('admin.product.create')}}" class="btn btn-primary">Create</a>
<div>

    <label for="keyword" class="col-form-label">Tìm kiếm:</label>
    <div class="form-g">
        <input type="text" name="keyword" id="keyword" placeholder="keyword" class="form-control">
    </div>

</div>
<table class='table'>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Avatar</th>
            <th>Category</th>
            <th>Status</th>
            <th>Fun</th>
        </tr>
    </thead>
    <tbody id="listProduct">

        @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{number_format($product->price,0,'.','.')}} đ</td>
            <td><img src="{{asset($product->thumbnail_url)}}" width="100" alt=""></td>
            <td>
                @foreach($categories as $category)
                @if($category->id == $product->category_id)
                {{$category->name_category}}

                @endif

                @endforeach

            </td>
            <td>
                {{$product->status?"Hoạt động":"Không hoạt động"}}
            </td>
            <td>
                <a href="{{route('admin.product.edit',$product->id)}}">
                    <button class="btn btn-warning">Update</button>
                </a>
                <form action="{{route("admin.product.delete",$product->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
<div>
    {{$products->links()}}
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(document).ready(function() {
    $(document).on('keyup', '#keyword', function() {
        var keyword = $(this).val();
        $.ajax({
            type: 'get',
            url: '/search',
            data: {
                keyword: keyword
            },
            dataType: 'json',
            success: function(response) {
                $('$listProduct').html(response);
            }
        });
    })
})
</script>
@endsection