@extends('frontend.layout.layout')

@section('content')
<div class="jp_tittle_main_wrapper">
    <div class="jp_tittle_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="jp_tittle_heading_wrapper">
                    <div class="jp_tittle_heading">
                        <h2>Thông tin CV</h2>
                    </div>
                    <div class="jp_tittle_breadcrumb_main_wrapper">
                        <div class="jp_tittle_breadcrumb_wrapper">
                            <ul>
                                <li><a href="#">Home</a> <i class="fa fa-angle-right"></i></li>
                                <li><a href="#">Jobs</a> <i class="fa fa-angle-right"></i></li>
                                <li>Thông tin CV</li>
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
                        <h2>Thông tin hồ sơ</h2>
                        <div class="detail_cv">
                            <span>Tiêu đề: <i>{{$candidate_profile->title}}</i></span>
                            <span>Nghành nghề: <i>{{$candidate_profile->category->name}}</i></span>
                            <span>Trình độ: <i>{{MyLibrary::getNameSetting('level',$candidate_profile->level)}}</i></span>
                            <span>Kinh nghiệm: <i>{{MyLibrary::getNameSetting('experience',$candidate_profile->experience)}}</i></span>
                            <span>Mức lương mong muốn: <i>{{MyLibrary::getNameSetting('slary',$candidate_profile->slary)}}</i></span>
                            <span>Nơi ở: <i>{{MyLibrary::getNameSetting('city',$candidate_profile->city)}}</i></span>
                            <span>Lượt xem: <i>{{$candidate_profile->view}}</i></span>
                        </div>
                    </div>
                    <div class="jp_job_des">
                        <h2>Mục tiêu nghề nghiệp</h2>
                        @if(!empty($target))
                        <p>{{$target->target}}</p>
                        @else
                        <br>
                        @endif
                    </div>
                    <div class="jp_job_des">
                        <h2>Kinh nghiệm làm việc</h2>
                        <div class="detail_cv">
                            @if(!empty($experience))
                            @foreach($experience as $k=>$v)
                            <?php
                            $desc_experience=str_replace('+','<br>- ',$v->experience_desc);
                            ?>
                            <h3 style="color:blueviolet">{{$v->experience_name_company}}</h3>
                            <span>Tên công ty: <i>{{$v->experience_name_company}}</i></span>
                            <span>Chức vụ: <i>{{$v->experience_title}}</i></span>
                            <span>Thời gian làm việc: <i>{{$v->experience_time}} tháng</i></span>
                            <span>Mô tả công việc: <i>{!!$desc_experience!!}</i></span>
                            <span>Thành tích đạt được: <i>{{$v->experience_medal}}</i></span>
                            <br>
                            @endforeach
                            @else
                            <br>
                            @endif
                        </div>
                    </div>
                    <div class="jp_job_des">
                        <h2>Trình độ</h2>
                        <div class="detail_cv">
                            @if(!empty($level))
                            @foreach($level as $k=>$v)
                            <h3 style="color:blueviolet">{{MyLibrary::getNameSetting('level',$v->name_level)}}</h3>
                            <span>Trình độ: <i>{{MyLibrary::getNameSetting('level',$v->name_level)}}</i></span>
                            <span>Đơn vị đào tạo: <i>{{$v->tranning_unit_level}}</i></span>
                            <span>Chuyên nghành: <i>{{$v->specialized_level}} tháng</i></span>
                            <span>Loại: <i>{{MyLibrary::getNameSetting('type_level',$v->type_level)}}</i></span>
                            <br>
                            @endforeach
                            @else
                            <br>
                            @endif
                        </div>
                    </div>
                    <div class="jp_job_des">
                        <h2>Ngoại ngữ</h2>
                        <div class="detail_cv">
                            @if(!empty($english))
                            <?php
                            $desc_english=str_replace('+','<br>- ',$english->english);
                            ?>
                            <span><i>{!!$desc_english!!}</i></span>
                            @else
                            <br>
                            @endif
                            <br>
                        </div>
                    </div>
                    <div class="jp_job_des">
                        <h2>Ưu điểm</h2>
                        <div class="detail_cv">
                            @if(!empty($english))
                            <?php
                            $desc_advantage=str_replace('+','<br>- ',$advantages->advantages);
                            ?>
                            <span><i>{!!$desc_advantage!!}</i></span>
                            @else
                            <br>
                            @endif
                            <br>
                        </div>
                    </div>
                    <div class="jp_job_des">
                        <h2>Hồ sơ đính kèm</h2>
                        <div class="detail_cv">
                            @if(isset($cv) && $cv!='')
                            <span><a href="{{url('/')}}/public/cv/{{$cv}}">{{$cv}}</a></span>
                            <br>
                            @else
                            <span>Không có</span>
                            @endif
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
                                    <img src="{{url('/')}}/{{$candidate->image}}" alt="post_img" width="100px" height="95px"/>
                                </div>
                            </div>
                            <div class="jp_job_listing_single_post_right_cont">
                                <div class="jp_job_listing_single_post_right_cont_wrapper">
                                    <h4>{{$candidate->name}}</h4>
                                </div>
                            </div>
                            <div class="jp_job_post_right_overview_btn_wrapper">
                                <div class="jp_job_post_right_overview_btn">
                                    <ul>
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
                                            <li>Ngày sinh:</li>
                                            <li>{{date('d-m-Y',strtotime($candidate->dob))}}</li>
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
                                            <li>{{$candidate->address}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="jp_listing_overview_list_main_wrapper jp_listing_overview_list_main_wrapper2">
                                    <div class="jp_listing_list_icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="jp_listing_list_icon_cont_wrapper">
                                        <ul>
                                            <li>Số điện thoại:</li>
                                            <li>{{$candidate->phone}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="jp_listing_overview_list_main_wrapper jp_listing_overview_list_main_wrapper2">
                                    <div class="jp_listing_list_icon">
                                        <i class="fa fa-th-large"></i>
                                    </div>
                                    <div class="jp_listing_list_icon_cont_wrapper">
                                        <ul>
                                            <li>Nghành nghề:</li>
                                            <li>{{$candidate_profile->category->name}}</li>
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
{{--  <script src="https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyADtl79tg24EOKd76KkWbnEUslJozEnXPU"></script>  --}}
<script>
var lat;
var lng;
geocodeAddress();
function geocodeAddress(geocoder, resultsMap) { 
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode( { 'address': '{{$candidate->address}}'}, function(results, status) {
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