@extends('layout.master')
@section('title','Danh sach san pham')
@section('content-title','Danh sach san pham')
@section('content')
<table class='table'>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Fun</th>
        </tr>
    </thead>
    <tbody id="listProduct">

        @foreach($user as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>


            <td>
                {{$item->role?"Quản trị":"khách"}}
            </td>
            <td>
                <a href="">
                    <button class="btn btn-warning">Update</button>
                </a>

            </td>
        </tr>
        @endforeach
    </tbody>

</table>


@endsection