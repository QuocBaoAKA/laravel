@extends('welcome')
@section('content')
<div class="features_items"><!--features_items--><br>
    <h2 class="title text-center">SẢN PHẨM MỚI NHẤT</h2>
    @foreach($danhsachsanpham as $key => $product)
    <a href="{{URL::to('/chitietsanpham/'.$product->masanpham)}}">
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="{{URL::to('public/uploads/sanpham/'.$product->hinhanh)}}" alt="" />
                    <h2>{{number_format($product->gia).' '.'VNĐ'}}</h2>
                    <p>{{$product->tensanpham}}</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                </div>
            </div>
        </div>
    </div>
        @endforeach
</div><!--features_items-->
                   
@endsection