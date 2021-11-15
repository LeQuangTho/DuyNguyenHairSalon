@extends('LayoutWeb/master')
@section('body')
<style>
    .title-history {
        color: #5c5c5c;
        font-size: 30px;
        font-weight: bold;
        padding-top: 3rem;
        padding-bottom: 1.5rem;
        text-align: center;
    }

    .title-history:after {
        content: '';
        display: block;
        margin: 10px auto;
        width: 50px;
        height: 3px;
        background: #5c5c5c;
    }
    .item-history{
        margin: 10px;
        background-color: #000;
        padding: 20px;
        border-radius: 10px;
        color: #fff;
        font-weight: bold;
        font-size: 14px;
    }

    .info-bk div {
        padding: 5px 0;
        text-align: center;
    }

    .info-bk div p {
        color: #d63031;
    }
</style>
<div style="height: 85px;background-color: #000;"></div>
<div class="main-content">
    <div class="container-fluid">
        <div class="title-history">Lịch sử cắt</div>
        <div class="row">
            <div class="col col-md-6 col-sm-12">
                <div class="booking-box">
                    @foreach($list_booking as $item_booking)
                    @if($item_booking->Is_Successful_Task == 1)
                        @php
                            $trangthai = 'Đã cắt';
                            $color = 'text-success';
                        @endphp
                    @else
                        @php
                            $trangthai = 'Chưa cắt';
                            $color = '';
                        @endphp
                    @endif
                    <div class="item-history">
                        <div class="d-flex justify-content-between info-bk">
                            <div>
                                <i class="icon-phone"></i>&emsp;<span>Số điện thoại</span>
                                <p>{{Session::get('user')}}</p>
                            </div>
                            <div>
                                <i class="icon-calendar"></i>&emsp;<span>Ngày</span>
                                <p>{{$item_booking->Date}}</p>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                </svg>&emsp;
                                <span>Giờ</span>
                                <p>{{$item_booking->Hour}}</p>
                            </div>
                            <div>
                                <i class="icon-check"></i>
                                <span>Trạng thái</span>
                                <p class="{{$color}}">{{$trangthai}}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div style="word-wrap: break-word;width:80%">
                                <span>Địa chỉ cắt: Xóm 2 - Thiết Trụ - Bình Minh - Khoái Châu - Hưng Yên</span><br>
                            </div>
                            @if($item_booking->Is_Successful_Task == 0)
                            <button class="btn btn-sm btn-success rounded">Hủy lịch cắt</button>
                            @endif
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            <div class="col col-md-6 col-sm-12"></div>
        </div>
    </div>
</div>
@endsection()