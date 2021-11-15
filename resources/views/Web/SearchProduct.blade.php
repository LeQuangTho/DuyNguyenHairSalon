@extends('LayoutWeb/master')
@section('body')
<style>
    .title-search-product {
        color: #5c5c5c;
        font-size: 30px;
        font-weight: bold;
        padding-top: 3rem;
        padding-bottom: 1.5rem;
        text-align: center;
    }

    .title-search-product:after {
        content: '';
        display: block;
        margin: 10px auto;
        width: 50px;
        height: 3px;
        background: #5c5c5c;
    }
</style>
<link rel="stylesheet" href="{{asset('css/store.css')}}"></link>
<div style="height: 85px;background-color: #000;"></div>
<div class="main-content">
    <div class="container-fluid">
        <div class="title-search-product">Tìm kiếm</div>
        <div class="text-center">Có <span class="font-weight-bold">{{$countProduct}} sản phẩm</span> cho tìm kiếm</div>
        <div class="mb-4 mt-4"><span>Kết quả tìm kiếm cho </span><span class="font-weight-bold">"{{$keySearch}}"</span></div>
        <div class="row mb-5">
            @foreach($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="product-item">
                    <div class="item-info">
                        <a style="height: 100%;" href="product-details?id={{$product->ID_Product}}" class="team" title="{{$product->Name_Product}}">
                            <div class="img" style="height:300px;background-image: url({{asset('haircare/images').'/'.$product->Image_Product}});"></div>
                            <span>{{$product->Name_Product}}</span>
                            <span>{{number_format($product->Price_Product)}}₫</span>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection