@extends('frontend.layout.layout')

@section('content')
@if(session()->has('message'))
<?php echo '<script>alert("'.session('message').'")</script>' ?>
@endif
<div class="cc_slider_main_wrapper">
    <div class="cc_slider_img_section">
        <div class="">
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
                                        <input id="search_candidate" name="keyword" type="text" placeholder="Tiêu đề hồ sơ tiềm kiếm" value="{{$old_keyword}}">
                                    </div>
                                    <div class="jp_slider_form_location_wrapper">
                                        <i class="fa fa-th-large first_icon"></i>
                                            <select name="category_id">
                                                <option value="all">Tất cả nghành nghề</option>
                                                @foreach($category as $v)
                                                <option value="{{$v->id}}" {{$old_category_id==$v->id?'selected':''}}>{{$v->name}}</option>
                                                @endforeach
                                            </select><i class="fa fa-angle-down second_icon"></i>
                                    </div>
                                    <div class="jp_slider_form_location_wrapper">
                                        <i class="fa fa-arrow-up first_icon"></i>
                                            <select name="level">
                                                <option value="all">Tất cả trình độ</option>
                                                @foreach($level as $k=>$v)
                                                <option value="{{$k}}" {{$old_level==$k?'selected':''}}>{{$v}}</option>
                                                @endforeach
                                            </select><i class="fa fa-angle-down second_icon"></i>
                                    </div>
                                    <div class="jp_slider_form_location_wrapper">
                                        <i class="fa fa-money first_icon"></i>
                                            <select name="slary">
                                                <option value="all">Tất cả mức lương</option>
                                                @foreach($slary as $k=>$v)
                                                <option value="{{$k}}" {{$old_slary==$k?'selected':''}}>{{$v}}</option>
                                                @endforeach
                                            </select><i class="fa fa-angle-down second_icon"></i>
                                    </div>
                                    <div class="jp_slider_form_location_wrapper">
                                        <i class="fa fa-dot-circle-o first_icon"></i>
                                            <select name="city">
                                                <option value="all">Tất cả địa điểm</option>
                                                @foreach($city as $k=>$v)
                                                <option value="{{$k}}" {{$old_city==$k?'selected':''}}>{{$v}}</option>
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

<div class="jp_listing_sidebar_main_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="jp_listing_heading_wrapper">
                    <h2>Chúng tôi tìm thấy <span>{{$total_profile}}</span> mục phù hợp với bạn.</h2>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="jp_listing_tabs_wrapper">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="gc_causes_select_box_wrapper">
                                    <div class="gc_causes_select_box">
                                        <select name="sort_order">
                                            <option value="new_to_old">Mới đến cũ</option>
                                            <option value="old_to_new">Cũ đến mới</option>
                                        </select><i class="fa fa-angle-down"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="gc_causes_view_tabs_wrapper">
                                    <div class="gc_causes_view_tabs">
                                        <ul class="nav nav-pills">
                                            <li class="active"><a data-toggle="pill" href="#grid"><i class="fa fa-th-large"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="tab-content">
                            <div id="grid" class="tab-pane fade in active">
                                <div id="result_grid" class="row">
                                    @foreach($list_profile as $k=>$v)
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="jp_job_post_main_wrapper_cont jp_job_post_grid_main_wrapper_cont">
                                            <div class="jp_job_post_main_wrapper jp_job_post_grid_main_wrapper">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="jp_job_post_side_img">
                                                            <img src="{{url('/')}}/{{$v->candidate->image}}" alt="post_img"   width="100px" height="95px"/>
                                                        </div>
                                                        <div class="jp_job_post_right_cont jp_job_post_grid_right_cont">
                                                            <h4>{{substr($v->title,0,50)}}</h4>
                                                            <p>{{substr($v->category->name,0,50)}}</p>
                                                            <ul>
                                                                <li><i class="fa fa-cc-paypal"></i>&nbsp; {{MyLibrary::getNameSetting('slary',$v->slary)}}</li>
                                                                <li><i class="fa fa-map-marker"></i>&nbsp; {{MyLibrary::getNameSetting('city',$v->city)}}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="jp_job_post_right_btn_wrapper jp_job_post_grid_right_btn_wrapper">
                                                            <ul>
                                                                <li style="display:none"><a href="javascript:void(0)" class="love_action"><i class="fa fa-heart-o"></i></a></li>
                                                                <li><a href="cv-ung-vien-{{$v->id}}.html" target="_blank">Xem</a></li>
                                                                @if(!in_array($v->id,$list_save_profile))
                                                                <li><a href="luu-ung-vien-{{$v->id}}.html">Lưu</a></li>
                                                                @else
                                                                <li><a href="javascript:void(0)" style="background-color:#37d09c"><i class="fa fa-check"></i>Đã Lưu</a></li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hidden-sm hidden-xs">
                                        <div class="pager_wrapper gc_blog_pagination">
                                            <ul class="pagination">
                                                @for($i=1;$i<=$total_page;$i++)
                                                <li class="{{$i==$page?'active':''}}"><a href="javascript:void(0);" class="ajax_page" data-page="{{$i}}">{{$i}}</a></li>
                                                @endfor
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="jp_rightside_job_categories_wrapper">
                            <div class="jp_rightside_job_categories_heading">
                                <h4>Chuyên nghành</h4>
                            </div>
                            <div class="jp_rightside_job_categories_content">
                                <div class="handyman_sec1_wrapper">
                                    <div class="content">
                                        <div class="box">
                                            <p>
                                                <input class="ajax_page_normal" type="checkbox" id="ajax_category_id_all" value="all" name="ajax_category_id[]">
                                                <label for="ajax_category_id_all">Tất cả</label>
                                            </p>
                                            @foreach($category as $v)
                                            <p>
                                                <input class="ajax_page_normal" type="checkbox" id="ajax_category_id_{{$v->id}}" value="{{$v->id}}" name="ajax_category_id[]">
                                                <label for="ajax_category_id_{{$v->id}}">{{$v->name}}</label>
                                            </p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="jp_rightside_job_categories_wrapper jp_job_location_wrapper">
                            <div class="jp_rightside_job_categories_heading">
                                <h4>Trình độ</h4>
                            </div>
                            <div class="jp_rightside_job_categories_content">
                                <div class="handyman_sec1_wrapper">
                                    <div class="content">
                                        <div class="box">
                                            <p>
                                                <input class="ajax_page_normal" type="checkbox" id="ajax_level_all" value="all" name="ajax_level[]">
                                                <label for="ajax_level_all">Tất cả</label>
                                            </p>
                                            @foreach($level as $k=>$v)
                                            <p>
                                                <input class="ajax_page_normal" type="checkbox" id="ajax_level_{{$k}}" name="ajax_level[]" value="{{$k}}">
                                                <label for="ajax_level_{{$k}}">{{$v}}</label>
                                            </p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="jp_rightside_job_categories_wrapper jp_job_location_wrapper">
                            <div class="jp_rightside_job_categories_heading">
                                <h4>Mức lương</h4>
                            </div>
                            <div class="jp_rightside_job_categories_content">
                                <div class="handyman_sec1_wrapper">
                                    <div class="content">
                                        <div class="box">
                                            <p>
                                                <input class="ajax_page_normal" type="checkbox" id="ajax_slary_all" value="all" name="ajax_slary[]">
                                                <label for="ajax_slary_all">Tất cả</label>
                                            </p>
                                            @foreach($slary as $k=>$v)
                                            <p>
                                                <input class="ajax_page_normal" type="checkbox" id="ajax_slary_{{$k}}" name="ajax_slary[]" value="{{$k}}">
                                                <label for="ajax_slary_{{$k}}">{{$v}}</label>
                                            </p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="jp_rightside_job_categories_wrapper jp_job_location_wrapper">
                            <div class="jp_rightside_job_categories_heading">
                                <h4>Địa điểm</h4>
                            </div>
                            <div class="jp_rightside_job_categories_content">
                                <div class="handyman_sec1_wrapper">
                                    <div class="content">
                                        <div class="box">
                                            <p>
                                                <input class="ajax_page_normal" type="checkbox" id="ajax_city_all" value="all" name="ajax_city[]">
                                                <label for="ajax_city_all">Tất cả</label>
                                            </p>
                                            @foreach($city as $k=>$v)
                                            <p>
                                                <input class="ajax_page_normal" type="checkbox" id="ajax_city_{{$k}}" name="ajax_city[]" value="{{$k}}">
                                                <label for="ajax_city_{{$k}}">{{$v}}</label>
                                            </p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="jp_add_resume_wrapper">
                            <div class="jp_add_resume_img_overlay"></div>
                            <div class="jp_add_resume_cont">
                                <img src="{{asset('public/frontend/images/content/resume_logo.png')}}" alt="logo" />
                                <h4>Nhận công việc tốt nhất từ email.Thêm ngay bây giờ!!!</h4>
                                <ul>
                                    <li><a href="#"><i class="fa fa-plus-circle"></i> &nbsp;Thêm Email</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
<script src="{{asset('public/js/employer_search.js')}}"></script>
@endsection