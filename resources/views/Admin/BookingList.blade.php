@extends('LayoutAdmin/MasterAdmin')
@Section('body')
<style>
    .block-box {
        position: relative;
    }

    .block-service,
    .block-time {
        display: flex;
        border: 1px solid gray;
        border-radius: 6px;
        height: 43px;
        align-items: center;
        padding: 0 10px;
        font-size: 20px;
        margin-top: 15px;
        color: #767676;
        cursor: pointer;
        background-color: #fff;
    }

    .title-iconleft {
        margin-right: 10px;
    }

    .box-text {
        font-size: 16px;
        margin-left: 5px;
    }

    .title-iconright {
        margin-left: auto;
        width: 10px;
        display: flex;
    }

    .box-dropdown {
        position: absolute;
        top: 43px;
        width: 100%;
        background: #fff;
        box-shadow: 0 1px 6px rgb(0 0 0 / 12%);
        border-radius: 4px;
        transition: all .3s;
        opacity: 0;
    }

    .fade-in {
        opacity: 1;
        z-index: 9;

    }

    .item-action {
        padding: 8px 14px 8px 30px;
        border-bottom: 1px solid #e8e8e8;
        align-items: center;
        display: flex;
        cursor: pointer;
    }

    /* // */
    .btn-complete {
        float: right;
        color: #20c997;
        cursor: pointer;
        font-weight: bold;
    }

    /* right bounce */
    @-webkit-keyframes bounceRight {

        0%,
        20%,
        50%,
        80%,
        100% {
            -webkit-transform: translateX(0);
            transform: translateX(0);
        }

        40% {
            -webkit-transform: translateX(-30px);
            transform: translateX(-30px);
        }

        60% {

            -webkit-transform: translateX(-15px);
            transform: translateX(-15px);
        }
    }

    @-moz-keyframes bounceRight {

        0%,
        20%,
        50%,
        80%,
        100% {
            transform: translateX(0);
        }

        40% {
            transform: translateX(-30px);
        }

        60% {
            transform: translateX(-15px);
        }
    }

    @keyframes bounceRight {

        0%,
        20%,
        50%,
        80%,
        100% {
            -ms-transform: translateX(0);
            transform: translateX(0);
        }

        40% {
            -ms-transform: translateX(-30px);
            transform: translateX(-30px);
        }

        60% {
            -ms-transform: translateX(-15px);
            transform: translateX(-15px);
        }
    }

    /* /right bounce */

    /* assign bounce */
    .fa-arrow-right {
        -webkit-animation: bounceRight 2s infinite;
        animation: bounceRight 2s infinite;
    }

    /*  */
    .modal {
        padding-right: 0 !important;
    }

    .modal-dialog {
        margin: 0 !important;
    }
    .profile_picture{
        width: 28%;
        float: left;
    }
    .profile_image {
        width: 70%;
        background: #fff;
        margin-left: 15%;
        z-index: 1000;
        position: inherit;
    }

    .profile_inf {
        width: 65%;
        float: left;
    }

    .count-money {
        /* color: #000; */
        font-size: 18px;
    }

    .item-service {
        /* color: #000; */
        font-size: 16px;
    }
</style>
<div>
    <div class="page-title">
        <div class="title_left">
            <div class="block-box">
                <div class="block-time">
                    <div class="title-iconleft">
                        <i class="fa fa-calendar"></i>
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
                        <i class="fa fa-caret-right"></i>
                    </div>
                </div>
                <div class="box-dropdown">
                    @foreach ($threeday as $k => $day)
                    <div class="item-action"><span data-day="{{$k}}">{{$day}}</span></div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="title_right">
            <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row" style="display: block;margin-top:20px;">
        <div class="col-md-6 col-sm-6 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Chưa hoàn thành <small>{{$date_default}}</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" id="booking-unfinished">

                    <table class="table jambo_table bulk_action">
                        <thead>
                            <tr class="headings">
                                <th>
                                    <input type="checkbox" id="check-all" class="flat">
                                </th>
                                <th class="column-title">Tên khách hàng</th>
                                <th class="column-title">SĐT</th>
                                <th class="column-title">Thời gian</th>
                                <th class="column-title">Tác vụ</th>
                                <th class="bulk-actions" colspan="7">
                                    <a class="antoo" style="color:#fff; font-weight:500;">Đã chọn ( <span
                                            class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i>
                                        <div class="btn-complete">
                                            <i class="fa fa-arrow-right"></i>
                                            <span>Hoàn thành</span>
                                        </div>
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($BookingsUnfinished as $bu)
                            <tr>
                                <td class="a-center">
                                    <input type="checkbox" class="flat task-id" name="table_records"
                                        value="{{$bu->ID_Task}}">
                                </td>
                                <td class=" ">{{$bu->Name_User}}</td>
                                <td class=" ">{{$bu->Phone_Number_User}}</td>
                                <td class=" ">{{$bu->Date_Task}}</td>
                                <td class="view-booking" data-id="{{$bu->ID_Task}}">View
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>


        <div class="col-md-6 col-sm-6  ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Đã hoàn thành <small>{{$date_default}}</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên khách hàng</th>
                                <th>SĐT</th>
                                <th>Thời gian</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody id="booking-complete">
                            @foreach($BookingsComplete as $k => $bc)
                            <tr>
                                <th scope="row">{{$k+1}}</th>
                                <td>{{$bc->Name_User}}</td>
                                <td>{{$bc->Phone_Number_User}}</td>
                                <td>{{$bc->Date_Task}}</td>
                                <td class="view-booking" data-id="{{$bc->ID_Task}}">View
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- Modal: modalPoll -->
    <div class="modal fade" id="modalPoll-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-full-height modal-right modal-notify modal-info float-right" role="document">
            <div class="modal-content">
                
            </div>
        </div>
    </div>
    <!-- Modal: modalPoll -->
</div>
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $(document).on('click', '.view-booking', function () {
            $.ajax({
                url: 'Details-Task/' + $(this).attr('data-id'),
                type: 'get',
            })
                .done(function (response) {
                    let is_consulting = '';
                    let is_save_photo = '';
                    let detailsBooking = JSON.parse(response);
                    if(detailsBooking.Is_Consulting == 1) is_consulting = 'checked';
                    if(detailsBooking.Is_Save_Photo == 1) is_save_photo = 'checked';
                    let service_free = JSON.parse(detailsBooking.Service_Free);
                    let count_money_booking = 0;
                    let html = `
                    <!--Header-->
                    <div class="modal-header">
                        <div class="profile clearfix">
                            <div class="profile_picture">
                                <img src="http://localhost:8081/myblog/public/gentelella/production/images/img.jpg"
                                    alt="..." class="img-circle profile_image">
                            </div>
                            <div class="profile_inf">
                                <h2>${detailsBooking.Name_User} - ${detailsBooking.Phone_Number_User}</h2>
                                <span>Đặt lịch: ${detailsBooking.Date_Task}</span>
                            </div>
                        </div>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="white-text">×</span>
                        </button>
                    </div>

                    <!--Body-->
                    <div class="modal-body">
                        <div class="text-center">
                            <i class="far fa-file-alt fa-4x mb-3 animated rotateIn"></i>
                            <h2 class="font-weight-bold">Dịch vụ</h2>
                    `;
                    detailsBooking.service_booking.forEach((el,index) =>{
                        count_money_booking += el['Price_Service'];
                        html+=`
                            <div class="item-service d-flex justify-content-between text-uppercase font-weight-bold">
                                <span class="mt-3">${el['Name_Service']}</span>
                                <span class="mt-3">${number_format(el['Price_Service'])}</span>
                            </div>
                        `;
                    })
                    html +=`
                        </div>

                        <hr>
                        <div class="count-money d-flex justify-content-between text-uppercase font-weight-bold">
                            <span>Tổng tiền:</span>
                            <span>${number_format(count_money_booking)}</span>
                        </div>
                        <hr>
                        <!-- Radio -->
                        <div>
                            <h2 class="font-weight-bold text-center">Tiện ích</h2>
                    `;

                    service_free.forEach(el =>{
                        html+=  `<p>${el}</p>`
                    })

                    html += `
                        </div>

                        <!-- Radio -->
                        <hr>
                        <div>
                            <h2 class="font-weight-bold text-center">Yêu cầu</h2>
                            <div class="box-content">
                                <div class="mt-2">
                                    <input type="checkbox" name="yc" class="flat" id="yc" ${is_consulting}> 
                                    <label for="yc">Yêu cầu tư vấn</label>
                                </div>
                                <div class="mt-2">
                                    <input type="checkbox" name="ca" class="flat" id="ca" ${is_save_photo}> 
                                    <label for="ca">Chụp ảnh sau khi cắt</label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                        <button id="choose-booking" type="button" class="btn btn-primary waves-effect waves-light text-white" value="${detailsBooking.ID_Task}">Chọn
                            <i class="fa fa-paper-plane ml-1"></i>
                        </button>
                        <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Thoát</a>
                    </div>
                    `;
                    $('.modal-content').html(html);
                    $('input.flat').iCheck({
                        checkboxClass: 'icheckbox_flat-green',
                        radioClass: 'iradio_flat-green'
                    });
                    $('.modal').modal('show');
                });
        });
        $(document).on('click','#choose-booking',function(){
            let id_task = $(this).val();
            let item_bk = $('.task-id:input[value='+id_task+']');
            item_bk.prop('checked', true);
            item_bk.closest('tr').addClass('selected');
            item_bk.parent('.icheckbox_flat-green').addClass('checked');
            var checkCount = $(".bulk_action input[name='table_records']:checked").length;

            if (checkCount) {
                $('.column-title').hide();
                $('.bulk-actions').show();
                $('.action-cnt').html(checkCount + ' Booking');
            } else {
                $('.column-title').show();
                $('.bulk-actions').hide();
            }
            $('.modal').modal('hide');
            bulk_action();
        })
        $(document).on('click', '.btn-complete', function () {
            let arr_task = [];
            $(this).closest('table').find('.task-id:checked').each(function () {
                arr_task.push($(this).val());
            })
            $.ajax({
                url: 'Booking-Complete',
                type: 'post',
                data: { ...arr_task },
            })
                .done(function (response) {
                    if (response > 0) {
                        get_booking_date();
                        toastMixin.fire({ animation: true, title: 'Lưu thành công', });
                    }
                })
        });
        $(document).click(function () {
            $('.block-box').children('.box-dropdown').removeClass('fade-in')
        });
        $(document).on('click', '.block-time', function (e) {
            drop = $(this).closest('.block-box').children('.box-dropdown');
            if (drop.hasClass('fade-in')) {
                drop.removeClass('fade-in');
                $(this).find('.title-iconright i').attr('class', 'fa fa-caret-right');
            } else {
                drop.addClass('fade-in');
                $(this).find('.title-iconright i').attr('class', 'fa fa-caret-down');
                e.stopPropagation();
            }
        })
        $(document).on('click', '.item-action', function () {
            $('.select span').text($(this).text());
            day_time = $(this).children('span').data('day');
            $('.select span').attr('data-id', day_time);
            get_booking_date();
        })

        function get_booking_date() {
            date = $('.select span').attr('data-id');
            $.ajax({
                url: 'Booking-Date',
                type: 'post',
                data: {
                    'str_date': date,
                }
            })
                .done(function (response) {
                    data = JSON.parse(response);
                    let html_unfinished = ``;
                    let html_complete = ``;
                    html_unfinished += `
                    <table class="table jambo_table bulk_action">
                        <thead>
                            <tr class="headings">
                                <th>
                                    <input type="checkbox" id="check-all" class="flat">
                                </th>
                                <th class="column-title">Tên khách hàng</th>
                                <th class="column-title">SĐT</th>
                                <th class="column-title">Thời gian</th>
                                <th class="column-title">Tác vụ</th>
                                <th class="bulk-actions" colspan="7">
                                    <a class="antoo" style="color:#fff; font-weight:500;">Đã chọn ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i>
                                        <div class="btn-complete">
                                            <i class="fa fa-arrow-right"></i>
                                            <span>Hoàn thành</span>
                                        </div>
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                    `;
                    data['BookingsUnfinished'].forEach((el) => {
                        html_unfinished += `
                        <tr>
                            <td class="a-center">
                                <input type="checkbox" class="flat task-id" name="table_records" value="${el['ID_Task']}">
                            </td>
                            <td class=" ">${el['Name_User']}</td>
                            <td class=" ">${el['Phone_Number_User']}</td>
                            <td class=" ">${el['Date_Task']}</td>
                            <td class="view-booking" data-id="${el['ID_Task']}">View</a>
                            </td>
                        </tr>
                        `;
                    });
                    html_unfinished += `
                        </tbody>
                    </table>
                    `;
                    $('#booking-unfinished').html(html_unfinished);
                    bulk_action();
                    data['BookingsComplete'].forEach((el, index) => {
                        html_complete += `
                        <tr>
                            <th scope="row">${index + 1}</th>
                            <td>${el['Name_User']}</td>
                            <td>${el['Phone_Number_User']}</td>
                            <td>${el['Date_Task']}</td>
                            <td class="view-booking" data-id="${el['ID_Task']}">View</a>
                        </tr>
                        `;
                    });
                    $('#booking-complete').html(html_complete);
                })
        }

        function bulk_action() {
            $('input.flat').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });
            $('.bulk_action input').on('ifChecked', function () {
                checkState = '';
                $(this).parent().parent().parent().addClass('selected');
                countChecked();
            });
            $('.bulk_action input').on('ifUnchecked', function () {
                checkState = '';
                $(this).parent().parent().parent().removeClass('selected');
                countChecked();
            });
            $('.bulk_action input#check-all').on('ifChecked', function () {
                checkState = 'all';
                countChecked();
            });
            $('.bulk_action input#check-all').on('ifUnchecked', function () {
                checkState = 'none';
                countChecked();
            });
        }
    })
</script>
<!-- <div class="search-product">
        <input type="text" class="search-txt" placeholder="Tìm kiếm sản phẩm ở đây">
        <a class="search-btn" href="#">
            <i class="fa fa-search"></i>
        </a>
    </div>
    <style>
        .search-product{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: #ffca4a;
            border-radius: 40px;
            padding: 10px;
        }
        .search-product:hover > .search-txt{
            width: 240px;
            padding: 0 6px;
        }
        .search-product:hover > .search-btn{
            background-color: #fff;
        }
        .search-btn{
            color: #000;
            float: right;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #ffca4a;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: 0.4s;
        }
        .search-txt{
            border: none;
            background: none;
            outline: none;
            float: left;
            padding: 0;
            color: #fff;
            font-size: 16px;
            transition: 0.4s;
            line-height: 40px;
            width: 0px;
        }
    </style> -->
@endsection