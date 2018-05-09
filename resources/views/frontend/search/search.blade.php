@extends('frontend.layout.layout')
@section('header')
@include('frontend.partials.header_search');
@endsection

@section('content')
<div class="jp_listing_sidebar_main_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="jp_listing_heading_wrapper">
                    <h2>Chúng tôi tìm thấy <span>{{$total_post}}</span> mục phù hợp với bạn.</h2>
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
                                    @foreach($list_result as $k=>$v)
                                    @if($k>=(($page-1)*$post_of_page) && $k<($page*$post_of_page))
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="jp_job_post_main_wrapper_cont jp_job_post_grid_main_wrapper_cont">
                                            <div class="jp_job_post_main_wrapper jp_job_post_grid_main_wrapper">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="jp_job_post_side_img">
                                                            <img src="{{$v->Company->image}}" alt="post_img"   width="100px" height="95px"/>
                                                        </div>
                                                        <div class="jp_job_post_right_cont jp_job_post_grid_right_cont">
                                                            <h4>{{substr($v->title,0,50)}}</h4>
                                                            <p>{{substr($v->Company->name,0,50)}}</p>
                                                            <ul>
                                                                <li><i class="fa fa-cc-paypal"></i>&nbsp; {{MyLibrary::getNameSetting('slary',$v->slary)}}</li>
                                                                <li><i class="fa fa-map-marker"></i>&nbsp; {{MyLibrary::getNameSetting('city',$v->workplace)}}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="jp_job_post_right_btn_wrapper jp_job_post_grid_right_btn_wrapper">
                                                            <ul>
                                                                <li><a href="javascript:void(0)" class="love_action" data-id="{{$v->id}}"><i class="fa fa-heart-o"></i></a></li>
                                                                <li><a href="chi-tiet-p{{$v->id}}.html">Xem</a></li>
                                                                <li><a href="ung-tuyen-p{{$v->id}}.html">Ứng tuyển</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jp_job_post_keyword_wrapper" >
                                                <ul style="height:20px">
                                                    <li><i class="fa fa-tags"></i>Keywords :</li>
                                                    @foreach(json_decode($v->tags) as $tag_name)
                                                    <li><a href="tim-kiem.html?keyword={{$tag_name}}&city=all&experience=all">{{$tag_name}},</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hidden-sm hidden-xs">
                                        <div class="pager_wrapper gc_blog_pagination">
                                            <ul class="pagination">
                                                <li><a href="#">Priv.</a></li>
                                                @for($i=1;$i<=$total_page;$i++)
                                                <li class="{{$i==$page?'active':''}}"><a href="javascript:void(0);" class="ajax_page" data-page="{{$i}}">{{$i}}</a></li>
                                                @endfor
                                                <li><a href="#">Next</a></li>
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
                                <h4>Giới tính</h4>
                            </div>
                            <div class="jp_rightside_job_categories_content">
                                <div class="handyman_sec1_wrapper">
                                    <div class="content">
                                        <div class="box">
                                            <p>
                                                <input class="ajax_page_normal" type="checkbox" id="sex_all" value="all" name="sex[]">
                                                <label for="sex_all">Tất cả</label>
                                            </p>
                                            @foreach($sex as $k=>$v)
                                            <p>
                                                <input class="ajax_page_normal" type="checkbox" id="sex_{{$k}}" value="{{$k}}" name="sex[]">
                                                <label for="sex_{{$k}}">{{$v}}</label>
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
                                                <input class="ajax_page_normal" type="checkbox" id="city_all" value="all" name="city[]">
                                                <label for="city_all">Tất cả</label>
                                            </p>
                                            @foreach($city as $k=>$v)
                                            <p>
                                                <input class="ajax_page_normal" type="checkbox" id="city_{{$k}}" name="city[]" value="{{$k}}">
                                                <label for="city_{{$k}}">{{$v}}</label>
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
                                                <input class="ajax_page_normal" type="checkbox" id="level_all" value="all" name="level[]">
                                                <label for="level_all">Tất cả</label>
                                            </p>
                                            @foreach($level as $k=>$v)
                                            <p>
                                                <input class="ajax_page_normal" type="checkbox" id="level_{{$k}}" name="level[]" value="{{$k}}">
                                                <label for="level_{{$k}}">{{$v}}</label>
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
                                                <input class="ajax_page_normal" type="checkbox" id="slary_all" value="all" name="slary[]">
                                                <label for="slary_all">Tất cả</label>
                                            </p>
                                            @foreach($slary as $k=>$v)
                                            <p>
                                                <input class="ajax_page_normal" type="checkbox" id="slary_{{$k}}" name="slary[]" value="{{$k}}">
                                                <label for="slary_{{$k}}">{{$v}}</label>
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
                                <h4>Kinh nghiệm</h4>
                            </div>
                            <div class="jp_rightside_job_categories_content">
                                <div class="handyman_sec1_wrapper">
                                    <div class="content">
                                        <div class="box">
                                            <p>
                                                <input class="ajax_page_normal" type="checkbox" id="experience_all" value="all" name="experience[]">
                                                <label for="experience_all">Tất cả</label>
                                            </p>
                                            @foreach($experience as $k=>$v)
                                            <p>
                                                <input class="ajax_page_normal" type="checkbox" id="experience_{{$k}}" name="experience[]" value="{{$k}}">
                                                <label for="experience_{{$k}}">{{$v}}</label>
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
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 visible-sm visible-xs">
                        <div class="pager_wrapper gc_blog_pagination">
                            <ul class="pagination">
                                <li><a href="#">Priv.</a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li class="hidden-xs"><a href="#">4</a></li>
                                <li><a href="#">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@csrf
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/style_II.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/responsive2.css')}}" />
@endsection

@section('js')
<script src="{{asset('public/frontend/js/jquery.magnific-popup.js')}}"></script>
<script src="{{asset('public/frontend/js/custom_II.js')}}"></script>
<script src="{{asset('public/js/home_frontend.js')}}"></script>
<script>
$( function() {
    var availableTags = [<?php print_r($list_search_ajax)?>];
    $( "#search_job" ).autocomplete({
      source: availableTags
    });
});
</script>
@endsection