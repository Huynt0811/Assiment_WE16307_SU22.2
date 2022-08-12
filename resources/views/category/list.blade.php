@extends('layout.master')
@section('title','Danh sach danh muc')
@section('content-title','Danh sach danh muc')
@section('content')
<a href="{{route('admin.category.create')}}" class="btn btn-primary">Create</a>

<table class='table'>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Fun</th>
        </tr>
    </thead>
    <tbody id="listProduct">

        @foreach($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name_category}}</td>
            <td>
                <a href="">
                    <button class="btn btn-warning">Update</button>
                </a>
                <form action="{{route("admin.category.delete",$category->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>



@endsection