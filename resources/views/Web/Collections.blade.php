<link rel="stylesheet" href="{{asset('css/store.css')}}"></link>
@extends('LayoutWeb/master')
@section('body')
<div style="height: 85px;background-color: #000;"></div>
<div class="main-content">
    <div class="container-fluid">
        <div class="title-invole-store">
            <span class="text-title">Sản phẩm mới</span>
        </div>
        <div class="collections-product">
            <div class="row">
                @foreach($list_product as $product)
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
                @for($i= 1;$i< 30; ++$i)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="product-item">
                        <div class="item-info">
                            <a style="height: 100%;" href="#" class="team" title="Lăn Khử Mùi Ngăn Mồ Hôi Chuyên Biệt Etiaxil Deodorant Douceur 48h Roll-On 50ML">
                                <div class="img" style="height:300px;background-image: url({{asset('/haircare/images/product').rand(1,2).'.jpg'}});"></div>
                                <span>Lăn Khử Mùi Ngăn Mồ Hôi Chuyên Biệt Etiaxil Deodorant Douceur 48h Roll-On 50ML</span>
                                <span>{{number_format(23700000)}}₫</span>
                            </a>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
</div>
@endsection