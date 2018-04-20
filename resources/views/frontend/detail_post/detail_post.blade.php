@extends('frontend.layout.layout')

@section('content')
<div class="jp_tittle_main_wrapper">
    <div class="jp_tittle_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="jp_tittle_heading_wrapper">
                    <div class="jp_tittle_heading">
                        <h2>{{$post->title}}</h2>
                    </div>
                    <div class="jp_tittle_breadcrumb_main_wrapper">
                        <div class="jp_tittle_breadcrumb_wrapper">
                            <ul>
                                <li><a href="#">Home</a> <i class="fa fa-angle-right"></i></li>
                                <li><a href="#">Jobs</a> <i class="fa fa-angle-right"></i></li>
                                <li>{{$post->title}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="jp_listing_single_main_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="jp_listing_left_sidebar_wrapper">
                    <div class="jp_job_des">
                        <h2>Mô tả công việc</h2>
                        <p>{{$post->desc}}</p>
                    </div>
                    <div class="jp_job_res">
                        <h2>Yêu cầu công việc</h2>
                        <ul>
                        <?php
                            $list_requirement=explode("+",$post->requirement);
                        ?>
                            @if(!empty($list_requirement))
                                @foreach($list_requirement as $k=>$v)
                                @if(!empty($v))
                                <li><i class="fa fa-caret-right"></i>&nbsp;&nbsp; {{$v}}</li>
                                @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="jp_job_res jp_job_qua">
                        <h2>Quyền Lợi</h2>
                        <ul>
                        <?php
                            $list_benefit=explode("+",$post->benefit);
                        ?>
                            @if(!empty($list_benefit))
                                @foreach($list_benefit as $k=>$v)
                                @if(!empty($v))
                                <li><i class="fa fa-caret-right"></i>&nbsp;&nbsp; {{$v}}</li>
                                @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="jp_job_apply">
                        <h2>Liên hệ ứng tuyển</h2>
                        <?php
                            $arr_contact=[
                                'name_contact'=>'Tên',
                                'email_contact'=>'Email',
                                'address_contact'=>'Địa chỉ',
                                'mobile_contact'=>'Số điện thoại'
                            ];
                            $address='';
                        ?>
                        @foreach(json_decode($post->contact) as $k=>$v)
                        @if($k=='address_contact')
                        <?php
                            $address=$v;
                        ?>
                        @endif
                        <span>{{$arr_contact[$k]}}: {{$v}}</span>
                        @endforeach
                    </div>
                    <div class="jp_job_map">
                        <h2>Loacation</h2>
                        <div id="map" style="width:100%; float:left; height:300px;"></div>
                    </div>
                </div>
                <div class="jp_listing_left_bottom_sidebar_key_wrapper">
                    <ul>
                        <li><i class="fa fa-tags"></i>Keywords :</li>
                        @foreach(json_decode($post->tags) as $k=>$v)
                        <li><a href="tim-kiem.html?keyword={{$v}}&city=all&experience=all">{{$v}},</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="jp_listing_related_heading_wrapper">
                    <h2>Việc làm liên quan</h2>
                    <div class="jp_listing_related_slider_wrapper">
                        <div class="owl-carousel owl-theme">
                            <div class="item">
                                <div class="row">
                                    @foreach($relationship_post as $v)
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="jp_job_post_main_wrapper_cont jp_job_post_grid_main_wrapper_cont">
                                            <div class="jp_job_post_main_wrapper">
                                                <div class="row">
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                        <div class="jp_job_post_side_img">
                                                            <img src="{{$v->company->image}}" alt="post_img" />
                                                        </div>
                                                        <div class="jp_job_post_right_cont">
                                                            <h4>{{$v->title}}</h4>
                                                            <p>{{$v->company->name}}</p>
                                                            <ul>
                                                                <li><i class="fa fa-cc-paypal"></i>&nbsp; {{MyLibrary::getNameSetting('slary',$v->slary)}}</li>
                                                                <li><i class="fa fa-map-marker"></i>&nbsp; {{MyLibrary::getNameSetting('city',$v->workplace)}}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <div class="jp_job_post_right_btn_wrapper">
                                                            <ul>
                                                                @if(isset($list_love))
                                                                <li><a href="javascript:void(0)" class="love_action {{in_array($v->id,$list_love)?'love_active':''}}" data-id={{$v->id}}><i class="fa fa-heart-o"></i></a></li>
                                                                @else
                                                                <li><a href="javascript:void(0)" class="love_action " data-id={{$v->id}}><i class="fa fa-heart-o"></i></a></li>
                                                                @endif
                                                                <li><a href="chi-tiet-p{{$v->id}}.html">Xem</a></li>
                                                                <li><a href="ung-tuyen-p{{$v->id}}.html">Ứng tuyển</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jp_job_post_keyword_wrapper">
                                                <ul>
                                                    <li><i class="fa fa-tags"></i>Keywords :</li>
                                                    @foreach(json_decode($v->tags) as $k=>$v)
                                                    <li><a href="tim-kiem.html?keyword={{$v}}&city=all&category=all">{{$v}},</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="jp_rightside_job_categories_wrapper jp_rightside_listing_single_wrapper">
                            <div class="jp_rightside_job_categories_heading">
                                <h4>Tổng quan</h4>
                            </div>
                            <div class="jp_jop_overview_img_wrapper">
                                <div class="jp_jop_overview_img">
                                    <img src="{{$post->Company->image}}" alt="post_img" width="100px" height="95px"/>
                                </div>
                            </div>
                            <div class="jp_job_listing_single_post_right_cont">
                                <div class="jp_job_listing_single_post_right_cont_wrapper">
                                    <h4>{{$post->title}}</h4>
                                </div>
                            </div>
                            <div class="jp_job_post_right_overview_btn_wrapper">
                                <div class="jp_job_post_right_overview_btn">
                                    <ul>
                                        @if(isset($check_love))
                                        <li><a href="javascript:void(0)" class="love_action love_active" data-id={{$post->id}}><i class="fa fa-heart-o"></i></a></li>
                                        @else
                                        <li><a href="javascript:void(0)" class="love_action " data-id={{$post->id}}><i class="fa fa-heart-o"></i></a></li>
                                        @endif
                                        <li><a href="cong-ty-c{{$post->company_id}}.html">Xem công ty</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="jp_listing_overview_list_outside_main_wrapper">
                                <div class="jp_listing_overview_list_main_wrapper">
                                    <div class="jp_listing_list_icon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <div class="jp_listing_list_icon_cont_wrapper">
                                        <ul>
                                            <li>Ngày đăng:</li>
                                            <li>{{date('d-m-Y',strtotime($post->created_at))}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="jp_listing_overview_list_main_wrapper jp_listing_overview_list_main_wrapper2">
                                    <div class="jp_listing_list_icon">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <div class="jp_listing_list_icon_cont_wrapper">
                                        <ul>
                                            <li>Địa điểm:</li>
                                            <li>{{MyLibrary::getNameSetting('city',$post->workplace)}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="jp_listing_overview_list_main_wrapper jp_listing_overview_list_main_wrapper2">
                                    <div class="jp_listing_list_icon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <div class="jp_listing_list_icon_cont_wrapper">
                                        <ul>
                                            <li>Ngày hết hạn:</li>
                                            <li>{{date('d-m-Y',strtotime($post->expiration_date))}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="jp_listing_overview_list_main_wrapper jp_listing_overview_list_main_wrapper2">
                                    <div class="jp_listing_list_icon">
                                        <i class="fa fa-money"></i>
                                    </div>
                                    <div class="jp_listing_list_icon_cont_wrapper">
                                        <ul>
                                            <li>Lương:</li>
                                            <li>{{MyLibrary::getNameSetting('slary',$post->slary)}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="jp_listing_overview_list_main_wrapper jp_listing_overview_list_main_wrapper2">
                                    <div class="jp_listing_list_icon">
                                        <i class="fa fa-th-large"></i>
                                    </div>
                                    <div class="jp_listing_list_icon_cont_wrapper">
                                        <ul>
                                            <li>Category:</li>
                                            <li>{{MyLibrary::converJsonToString($post->category_id)}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="jp_listing_overview_list_main_wrapper jp_listing_overview_list_main_wrapper2">
                                    <div class="jp_listing_list_icon">
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="jp_listing_list_icon_cont_wrapper">
                                        <ul>
                                            <li>Kinh nghiệm:</li>
                                            <li>{{MyLibrary::getNameSetting('experience',$post->experience)}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="jp_listing_right_bar_btn_wrapper">
                                    <div class="jp_listing_right_bar_btn">
                                        <ul>
                                            <li><a href="ung-tuyen-p{{$post->id}}.html"><i class="fa fa-plus-circle"></i> &nbsp;Ứng tuyển ngay!</a></li>
                                        </ul>
                                    </div>
                                </div>
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
<script src="{{asset('public/js/home_frontend.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADtl79tg24EOKd76KkWbnEUslJozEnXPU"></script>
<script>
var lat;
var lng;
geocodeAddress();
function geocodeAddress(geocoder, resultsMap) { 
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode( { 'address': '{{$address}}'}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            lat = results[0].geometry.location.lat();
            lng = results[0].geometry.location.lng();
            initMap();
        }
    });
};

function initMap() {   
    var uluru = {lat: lat, lng:  lng};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        scrollwheel: false,
        center: uluru
    });
    var marker = new google.maps.Marker({
        position: uluru,
        map: map
    });
}
</script>

@endsection