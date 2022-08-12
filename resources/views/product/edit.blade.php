@extends('layout.master')

@section('title', 'Tạo mới sản phẩm')

@section('content-title', 'Tạo mới sản phẩm')

@section('content')

<!-- <form class="form" action="{{route('admin.product.store')}}" enctype="multipart/form-data" method="POST">
    @csrf

</form> -->
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Quick Example</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form" action="{{route('admin.product.store')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="" class="">Name: </label>
                <input type="text" name="name" value="" class="form-control">
            </div>

            <div class="form-group">
                <label for="" class="">Price: </label>
                <input type="text" name="price" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="">Avatar: </label>
                <input type="file" name="thumbnail_url" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="">Category: </label>
                <select class="form-select" name="category">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name_category}}</option>
                    @endforeach
                </select>
            </div>
            <div class='form-group'>
                <label for="">Status: </label>
                <input type="radio" name='status' value="1"> Kích hoạt
                <input type="radio" name='status' value="0"> K kích hoạt
            </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button class='btn btn-primary'>Tạo mới</button>
            <button type="reset" class='btn btn-warning'>Nhập lại</button>
        </div>
    </form>
</div>

@endsection