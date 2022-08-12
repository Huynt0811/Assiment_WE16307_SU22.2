@extends('welcome')
@section('content')

<div class="features_items">
    <!--features_items-->
    <h2 class="title text-center">Features Items</h2>
    @foreach($products as $product)
    <a href="{{asset('chitietsanpham/'.$product->id)}}">
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{asset($product->thumbnail_url)}}" alt="" />
                        <h2>{{number_format($product->price,0,'.','.')}} đ</h2>
                        <p>{{$product->name}}</p>
                        @if($product->status==1)
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                            cart</a>
                        @else
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Hết Hàng</a>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </a>
    @endforeach


</div>
<!--features_items-->

@endsection