@extends('LayoutWeb/master')
@section('body')
<link href="{{asset('css/booking.css')}}" rel="stylesheet">
<script src="{{URL::to('/')}}/resources/js/booking.js?ver=1"></script>
<script src="{{asset('haircare/mobiscroll/mobiscroll.javascript.min.js')}}"></script>
<div style="height: 85px;background-color: #000;"></div>
<section class="hero-wrap" style="background-color: #eee;">
    <!-- <div class="overlay js-fullheight"></div> -->
    <div class="container">
        <div class="row no-gutters slider-text justify-content-center align-items-center">
            <div class="align-items-center" style="width: 500px;margin: auto;background-color: #fff;">
                <div id="content-step1">
                    <div class="title-top"><span>Đặt lịch cắt tóc</span></div>
                    <div class="info-booking">
                        <div class="title-item">1. Chọn dịch vụ và thời gian</div>
                        <div class="block-service">
                            <div class="title-iconleft">
                                <i class="icon-cut"></i>
                            </div>
                            <div class="box-text">
                                <span>Mời anh, chị chọn dịch vụ</span>
                            </div>
                            <div class="title-iconright">
                                <i class="icon-caret-right"></i>
                            </div>
                        </div>
                        <div class="list-service"> 
                      <!--   list item service -->
                        </div>
                        <div class="block-box">
                            <div class="block-time">
                                <div class="title-iconleft">
                                    <i class="icon-calendar"></i>
                                </div>
                                <div class="box-text select">
                                    @php($i=0)
                                    @foreach ($threeday as $k => $day)
                                        @if(!$i)
                                            <span data-id="{{$k}}">{{$day}}</span>
                                            @php($i++)
                                        @endif
                                    @endforeach
                                </div>
                                <div class="title-iconright">
                                    <i class="icon-caret-right"></i>
                                </div>
                            </div>
                            <div class="box-dropdown">
                                @foreach ($threeday as $k => $day)
                                    <div class="item-action"><span data-day="{{$k}}">{{$day}}</span></div>
                                @endforeach
                            </div>
                        </div>

                        <div class="box-time">
                            <div class="swiper-container mySwiper-step1">
                                <div class="swiper-wrapper">
                                    
                                </div>
                            </div>
                            <div class="swiper-button-next button-next"></div>
                            <div class="swiper-button-prev button-prev"></div>
                        </div>
                    </div>
                    <div class="utilities">
                        <div>
                            <div class="title-item">2. Chọn tiện ích miễn phí</div>
                            <div class="box-content">
                                @foreach($ds_tienich as $ti)
                                <div class="item-free">
                                    <label class="control control--checkbox" style="font-size:15px;">
                                        <span>{{$ti}}</span>
                                        <input class="servicefree" name="servicefree" type="checkbox" value="{{$ti}}">
                                        <div class="control__indicator" style="top:0;height:25px;width:25px;"></div>
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <div class="item-extenstion">
                                <div class="d-flex justify-content-between">
                                    <span>Yêu cầu tư vấn</span>
                                    <input name="consulting" type="checkbox" checked class="js-switch" data-color="#ffca4a" value="1"/>
                                </div>
                                <div class="content-ex">Anh đồng ý nghe thông tin về các chương trình bán hàng, khuyến mãi, giảm giá</div>
                            </div>
                            <hr>
                            <div class="item-extenstion">
                                <div class="d-flex justify-content-between">
                                    <span>Chụp hình sau khi cắt</span>
                                    <input name="photo" type="checkbox" checked class="js-switch" data-color="#ffca4a" value="1"/>
                                </div>
                                <div class="content-ex">Anh cho phép chụp hình lưu lại kiểu tóc, để lần sau không phải mô tả lại cho thợ khác</div>
                            </div>
                        </div>
                    </div>
                    <div class="choose-service"><button id="complete-booking">Hoàn tất</button></div>
                </div>
                <input type="hidden" id="dm-service" value="{{$dm_service}}">
                <input type="hidden" id="list-service" value="{{$gr_service}}">
                <input type="hidden" id="item-service" value="{{$item_service}}">
                <div id="content-step2">

                </div>
            </div>
        </div>
    </div>
</section>
@endsection