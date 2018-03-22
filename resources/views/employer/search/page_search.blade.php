@extends('frontend.layout.layout')

@section('content')
<div class="cc_slider_main_wrapper">
    <div class="cc_slider_img_section">
        <div class="owl-carousel owl-theme">
            <form action="ket-qua-ung-vien.html" method="GET">
                <div class="item cc_main_slide1">
                    <div class="cc_slider_overlay"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                <div class="cc_slider_cont1_wrapper">
                                    <div class="cc_slider_cont1">
                                        <h2 data-animation-in="fadeInDown" data-animation-out="animate-out fadeOutDown">Hiện tại có <span>30,000+</span><br> việc làm đã đăng kí!</h2>
                                        <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOutDown">Tìm việc, tuyển dụng & Cơ hội nghề nghiệp</h1>
                                        <p data-animation-in="zoomIn" data-animation-out="animate-out zoomIn">Chúng tôi tìm kiếm các công việc xuất sắc từ các công ty hàng đầu<br> Cung cấp tài nguyên, nội dung công việc để bạn có thể chuyển sang công việc mới</p>
                                        <ul>
                                            <li data-animation-in="bounceInLeft" data-animation-out="animate-out bounceOutLeft"><a href="/Find_Job"><i class="fa fa-plus-circle"></i> Bắt đầu</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                <div class="jp_slider_form_main_wrapper" data-animation-in="fadeInUp" data-animation-out="animate-out fadeOutDown">
                                    <div class="jp_main_slider_heading_wrapper">
                                        <h2>Tìm kiếm ứng viên!</h2>
                                    </div>
                                    <div class="jp_slider_form_input">
                                        <input id="search_candidate" name="keyword" type="text" placeholder="Tiêu đề hồ sơ tiềm kiếm">
                                    </div>
                                    <div class="jp_slider_form_location_wrapper">
                                        <i class="fa fa-th-large first_icon"></i>
                                            <select name="category_id">
                                                <option value="all">Tất cả nghành nghề</option>
                                                @foreach($category as $v)
                                                <option value="{{$v->id}}">{{$v->name}}</option>
                                                @endforeach
                                            </select><i class="fa fa-angle-down second_icon"></i>
                                    </div>
                                    <div class="jp_slider_form_location_wrapper">
                                        <i class="fa fa-arrow-up first_icon"></i>
                                            <select name="level">
                                                <option value="all">Tất cả trình độ</option>
                                                @foreach($level as $k=>$v)
                                                <option value="{{$k}}">{{$v}}</option>
                                                @endforeach
                                            </select><i class="fa fa-angle-down second_icon"></i>
                                    </div>
                                    <div class="jp_slider_form_location_wrapper">
                                        <i class="fa fa-money first_icon"></i>
                                            <select name="slary">
                                                <option value="all">Tất cả mức lương</option>
                                                @foreach($slary as $k=>$v)
                                                <option value="{{$k}}">{{$v}}</option>
                                                @endforeach
                                            </select><i class="fa fa-angle-down second_icon"></i>
                                    </div>
                                    <div class="jp_slider_form_location_wrapper">
                                        <i class="fa fa-dot-circle-o first_icon"></i>
                                            <select name="city">
                                                <option value="all">Tất cả địa điểm</option>
                                                @foreach($city as $k=>$v)
                                                <option value="{{$k}}">{{$v}}</option>
                                                @endforeach
                                            </select><i class="fa fa-angle-down second_icon"></i>
                                    </div>
                                    <div class="jp_slider_form_btn_wrapper">
                                        <ul>
                                            <li><a onclick="$('#search_employer_1').click()"><i class="fa fa-search"></i>&nbsp; Tìm kiếm</a></li>
                                            <button id="search_employer_1" type="submit" style="display:none">submit</button>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/style_II.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/responsive2.css')}}" />
@endsection

@section('js')
<script src="{{asset('public/frontend/js/jquery.magnific-popup.js')}}"></script>
<script src="{{asset('public/frontend/js/custom_II.js')}}"></script>
<script src="{{asset('public/js/home_frontend.js')}}"></script>
@endsection