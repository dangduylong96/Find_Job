@extends('frontend.layout.layout')

@section('content')
<div class="jp_tittle_main_wrapper">
    <div class="jp_tittle_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="jp_tittle_heading_wrapper">
                    <div class="jp_tittle_heading">
                        <h2>{{$company->name}}</h2>
                    </div>
                    <div class="jp_tittle_breadcrumb_main_wrapper">
                        <div class="jp_tittle_breadcrumb_wrapper">
                            <ul>
                                <li><a href="#">Home</a> <i class="fa fa-angle-right"></i></li>
                                <li><a href="#">Company</a> <i class="fa fa-angle-right"></i></li>
                                <li>{{$company->name}}</li>
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
                        <h2>Mô tả công ty</h2>
                        <p>{{$company->desc}}</p>
                    </div>
                    <div class="jp_job_res jp_job_qua">
                        <h2>Website</h2>
                        <p style=""color:blue><a href="{{$company->website}}">{{$company->website}}</a></p>
                    </div>
                    <div class="jp_job_map">
                        <h2>Loacation</h2>
                        <div id="map" style="width:100%; float:left; height:300px;"></div>
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
                                    <img src="{{url('/').'/'.$company->image}}" alt="post_img" width="100px" height="95px"/>
                                </div>
                            </div>
                            <div class="jp_job_listing_single_post_right_cont">
                                <div class="jp_job_listing_single_post_right_cont_wrapper">
                                    <h4>{{$company->name}}</h4>
                                </div>
                            </div>
                            <div class="jp_job_post_right_overview_btn_wrapper">
                                <div class="jp_job_post_right_overview_btn">
                                    <ul></ul>
                                </div>
                            </div>
                            <div class="jp_listing_overview_list_outside_main_wrapper">
                                <div class="jp_listing_overview_list_main_wrapper">
                                    <div class="jp_listing_list_icon">
                                        <i class="fa fa-balance-scale"></i>
                                    </div>
                                    <div class="jp_listing_list_icon_cont_wrapper">
                                        <ul>
                                            <li>Qui Mô:</li>
                                            <li>{{MyLibrary::getNameSetting('Size Company',$company->size)}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="jp_listing_overview_list_main_wrapper jp_listing_overview_list_main_wrapper2">
                                    <div class="jp_listing_list_icon">
                                        <i class="fa fa-address-card"></i>
                                    </div>
                                    <div class="jp_listing_list_icon_cont_wrapper">
                                        <ul>
                                            <li>Địa điểm:</li>
                                            <li>{{$company->address}}</li>
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
                                            <li>{{$company->phone}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="jp_listing_overview_list_main_wrapper jp_listing_overview_list_main_wrapper2">
                                    <div class="jp_listing_list_icon">
                                        <i class="fa fa-eye"></i>
                                    </div>
                                    <div class="jp_listing_list_icon_cont_wrapper">
                                        <ul>
                                            <li>Lượt xem:</li>
                                            <li>{{$company->view}}</li>
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
    geocoder.geocode( { 'address': '{{$company->address}}'}, function(results, status) {
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