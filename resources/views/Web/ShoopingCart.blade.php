@extends('LayoutWeb/master')
@section('body')
<style>
    .title-shopping-cart{
        color: #5c5c5c;
        font-size: 30px;
        font-weight: bold;
        padding-top: 3rem;
        padding-bottom: 1.5rem;
        text-align: center;
    }
    .title-shopping-cart:after{
        content: '';
        display: block;
        margin: 10px auto;
        width: 50px;
        height: 3px;
        background: #5c5c5c;
    }
    .title-count-cart ,.title-order-cart{
        background-color: #f3f5f6;
        color: #000;
        padding: 10px;
        font-size: 18px;
    }
    .list-product-cart{
        padding: 5px;
        color: #000;
    }
    .item-product-cart{
        display: flex;
        flex-wrap: wrap;
        border-bottom: 1px solid #f3f5f6;
        padding: 10px 0 15px;
    }
    .item-product-cart .line-item-image{
        width: 100px;
        height: 120px;
        margin-right: 1rem;
    }
    .item-product-cart .line-item-image img{
        height: 100%;
        width: 100%;
    }
    .line-item-body{
        flex: 1;
    }
    .line-item-body .name-product{
        position: relative;
        font-weight: bold;
    }
    .line-item-body .name-product i{
        position: absolute;
        top: 0;
        right: 2%;
        font-size: 18px;
        color: #000;
        line-height: 30px;
    }
    .line-item-body .price-product{
        font-weight: bold;
    }
    .item-product-money{
        position: absolute;
        top: 0;
        right: 2%;
        line-height: 40px;
    }
    .remove-item-cart{
        cursor: pointer;
        transition: 0.3s;
    }
    .remove-item-cart:hover{
        transform: scale(1.5);
    }
    .order-content{
        padding: 10px;
        border: 2px solid #f3f5f6;
    }
    .total-money {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-bottom: 20px;
        padding: 10px 0;
        border-bottom: 1px solid #f3f5f6;
        font-weight: bold;
        font-size: 25px;
        color: #000;
    }
    .total-money span{
        color: #d63031;
    }
    .select-button .checkout-btn {
        font-size: 12px;
        letter-spacing: 2px;
        display: block;
        text-align: center;
        background: #d63031;
        color: #ffffff;
        padding: 15px 30px 12px;
        font-weight: bold;
        text-transform: uppercase;
    }
</style>
@if(Session::has('user'))
    @php
        $listCart = getCartUser(Session::get('id_user'))['products'];
        $totalPrice = getCartUser(Session::get('id_user'))['totalPrice'];
        $totalQuanty = getCartUser(Session::get('id_user'))['totalQuanty'];
    @endphp
@else
@if(Session::has('Cart'))
    @php
        $listCart = Session::get('Cart')->products;
        $totalPrice = Session::get('Cart')->totalPrice;
        $totalQuanty = Session::get('Cart')->totalQuanty;
    @endphp
@else
    @php
        $listCart =[];
        $totalPrice=0;
        $totalQuanty=0;
    @endphp
@endif
@endif
<div style="height: 85px;background-color: #000;"></div>
<div class="main-content">
    <div class="container-fluid">
        <div class="title-shopping-cart">Giỏ hàng của bạn</div>
        <div class="row mb-5">
            <div class="col-md-8 col-sm-12">
                <div class="title-count-cart"><span>Bạn đang có <strong>{{$totalQuanty}}</strong></span> sản phẩm trong giỏ hàng</div>
                <div class="list-product-cart">
                    @foreach($listCart as $item)
                    <div class="item-product-cart">
                        <div class="line-item-image"><img src="{{asset('haircare/images').'/'.$item['productInfo']->Image_Product}}" alt="{{$item['productInfo']->Name_Product}}"></div>
                        <div class="line-item-body">
                            <div class="name-product"><span>{{$item['productInfo']->Name_Product}}</span><i data-id="{{$item['productInfo']->ID_Product}}" class="icon-trash remove-item-cart"></i></div>
                            <span class="price-product">{{number_format($item['productInfo']->Price_Product)}}₫</span>
                            <div style="position: relative;margin-top: 1rem;color: #d63031;font-weight: bold;"> 
                                <div class="amount-buy">
                                    <div class="value-button decrease" value="Decrease Value">-</div>
                                    <input type="number" data-id="{{$item['productInfo']->ID_Product}}" class="number" value="{{$item['Quanty']}}" min="1" />
                                    <div class="value-button increase" value="Increase Value">+</div>
                                </div>
                                <span class="item-product-money">Thành Tiền: {{number_format($item['price'])}}₫</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="order-cart">
                    <div class="title-order-cart text-center font-weight-bold">Thông tin đơn hàng</div>
                    <div class="order-content">
                        <div class="total-money">
                            Tổng tiền:
                            <span>{{number_format($totalPrice)}}₫</span>
                        </div>
                        <div class="select-button">
                            <a href="{{URL::to('/')}}/Checkout" class="primary-btn checkout-btn">Thanh toán</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
   $(document).ready(function(){
       $(document).on('click','.remove-item-cart',function(){
            $.ajax({
                url: 'Delete-Item-Cart/'+ $(this).attr('data-id'),
                type: 'get',
            })
            .done(function(response){
                newcart = JSON.parse(response);
                if(newcart){
                    RenderCart(newcart);
                }
            })
       })
       $(document).on('click','.decrease',function(){
            let number = $(this).parent().children('.number');
            let value = parseInt(number.val(), 10);
            value = isNaN(value) ? 0 : value;
            value < 2 ? value = 2 : '';
            value--;
            number.val(value);
            update_cart(number.attr('data-id'),value);
       })
       $(document).on('click','.increase',function(){
            let number = $(this).parent().children('.number');
            let value = parseInt(number.val(), 10);
            value = isNaN(value) ? 0 : value;
            value++;
            number.val(value);
            update_cart(number.attr('data-id'),value);
       })
       function update_cart(id,newquanty){
            $.ajax({
                url: 'Update-Item-Cart/'+id+'/'+newquanty,
                type: 'post',
                data: {'id':id,'newquanty':newquanty}
            })
            .done(function(response){
                newcart = JSON.parse(response); 
                if(newcart){
                    RenderCart(newcart);
                }
            })
       }
       function RenderCart(newcart){
            products = newcart['products'];
            let html = ``;
            if(products){
                for(const [key,value] of Object.entries(products)){
                    html +=`
                        <div class="item-product-cart">
                            <div class="line-item-image"><img src="${base_url}/public/haircare/images/${value['productInfo']['Image_Product']}" alt="${value['productInfo']['Name_Product']}"></div>
                            <div class="line-item-body">
                                <div class="name-product"><span>${value['productInfo']['Name_Product']}</span><i data-id="${value['productInfo']['ID_Product']}" class="icon-trash remove-item-cart"></i></div>
                                <span class="price-product">${number_format(value['productInfo']['Price_Product'])}₫</span>
                                <div style="position: relative;margin-top: 1rem;color: #d63031;font-weight: bold;"> 
                                    <div class="amount-buy">
                                        <div class="value-button decrease" value="Decrease Value">-</div>
                                        <input type="number" data-id="${value['productInfo']['ID_Product']}" class="number" value="${value['Quanty']}" min="1" />
                                        <div class="value-button increase" value="Increase Value">+</div>
                                    </div>
                                    <span class="item-product-money">Thành Tiền: ${number_format(value['price'])}₫</span>
                                </div>
                            </div>
                        </div>
                    `
                }
            }
            $('.list-product-cart').html(html);
            $('.total-money span').html(number_format(newcart['totalPrice'])+'₫');
            $('.title-count-cart strong').html(newcart['totalQuanty']);
       }
   })
</script>
@endsection