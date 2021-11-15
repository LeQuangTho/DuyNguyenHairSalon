@extends('LayoutWeb/master')
@section('body')
<style>
    .main-content {
        margin-top: 50px;
    }

    .product-content-image {
        width: calc(100% - 252px);
        flex: 0 0 calc(100% - 252px);
    }

    .banner-right {
        flex: 0 0 232px;
        width: 232px;
    }

    .image-product {
        width: calc(41% - 10px);
        border: 2px solid #F7F7F7;
        border-radius: 4px;
        cursor: pointer;
    }

    .content-product {
        width: calc(59% - 10px);
    }

    .image-product img,
    .banner-right img {
        width: 100%;
        height: 100%;
    }

    .content-product {
        color: #000;
    }

    .name-product {
        display: inline-block;
        font-size: 20px;
        font-weight: bold;
        padding-bottom: 25px;
        border-bottom: 1px solid #F7F7F7;
    }

    .money-product {
        display: inline-block;
        font-size: 30px;
        color: #d63031;
        font-weight: bold;
        padding: 20px 0px;
    }

    .amount-buy {
        padding: 20px 0;
    }

    .amount-buy span {
        font-size: 22;
        font-weight: bold;
        display: inline-block;
        margin-right: 50px;
    }

    .selector-actions {
        margin: 30px 0;
    }

    .selector-actions .btn-cart {
        font-size: 30px;
        text-transform: uppercase;
        color: #ffca4a;
        background: none;
        border: 2px solid #ffca4a;
        font-weight: bold;
        width: 50%;
        outline: none;
    }

    .selector-actions .btn-buy {
        font-size: 30px;
        text-transform: uppercase;
        color: #d63031;
        background: none;
        border: 2px solid #d63031;
        font-weight: bold;
        width: 45%;
        margin-left: 15px;
        outline: none;
    }

    .selector-actions .btn-cart:hover {
        color: #fff;
        background-color: #ffca4a;
    }

    .selector-actions .btn-buy:hover {
        color: #fff;
        background-color: #d63031;
    }

    .description {
        margin: 50px 0;
        width: calc(100% - 252px);
    }
</style>
<div style="height: 85px;background-color: #000;"></div>
<div class="main-content">
    <form action="Add-Product-Buy" method="post">
        {{ csrf_field() }}
        <div class="container-fluid">
            <div class="d-flex flex-wrap justify-content-between">
                <div class="product-content-image">
                    <div class="d-flex flex-wrap justify-content-between">
                        <div class="image-product">
                            <img src="{{asset('haircare/images').'/'.$info_product->Image_Product}}" alt="{{$info_product->Name_Product}}">
                        </div>
                        <div class="content-product">
                            <span class="name-product">{{$info_product->Name_Product}}</span>
                            <span class="money-product">{{number_format($info_product->Price_Product)}}₫</span>
                            <div class="amount-buy">
                                <span>Số lượng:</span>
                                <div class="value-button decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                                <input type="number" name="number" class="number" value="1" min="1" />
                                <div class="value-button increase" onclick="increaseValue()" value="Increase Value">+</div>
                            </div>
                            <div class="selector-actions">
                                <button type="button" class="btn-cart" id="add-cart" data-id="{{$info_product->ID_Product}}"> <i class="icon-shopping-cart"></i> <span>Thêm vào giỏ</span></button>
                                <button type="submit" id="buy-now" name="buynow" class="btn-buy text-center" value="{{$info_product->ID_Product}}"><span>Mua ngay</span></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-right">
                    <img src="{{asset('haircare/images/banner-right.jpg')}}" alt="">
                </div>
            </div>
            <div class="description">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">THÔNG TIN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">MÔ TẢ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">CÁCH SỬ DỤNG</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        {{$info_product->Info_Product}}
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        {{$info_product->Description_Product}}
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        {{$info_product->Using_Product}}
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script>

</script>
@endsection