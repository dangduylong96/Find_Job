@extends('frontend.layout.layout')
@section('header')
@include('frontend.partials.header',['a'=>3]);
@endsection
@section('content')
<!-- Header Wrapper End -->
<!-- jp tittle slider Wrapper Start -->
<div class="jp_tittle_slider_main_wrapper" style="float:left; width:100%; margin-top:30px;">
    <div class="container">
        <div class="jp_tittle_name_wrapper">
            <div class="jp_tittle_name">
                <h3>Công ty</h3>
                <h4>Mới</h4>
            </div>
        </div>
        <div class="jp_tittle_slider_wrapper">
            <div class="jp_tittle_slider_content_wrapper">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        @foreach($new_company as $k=>$v)
                        <div class="jp_tittle_slides_one">
                            <div class="jp_tittle_side_img_wrapper">
                                <img src="{{$v['image']}}" alt="tittle_img" width="65px" height="65px" />
                            </div>
                            <div class="jp_tittle_side_cont_wrapper">
                                <h4>{{$v['name']}}</h4>
                                <p>{{$v['website']}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- jp tittle slider Wrapper End -->
<!-- jp first sidebar Wrapper Start -->
<div class="jp_first_sidebar_main_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="jp_hiring_slider_main_wrapper">
                            <div class="jp_hiring_heading_wrapper">
                                <h2>Danh sách công ty</h2>
                            </div>
                            <div class="jp_hiring_slider_wrapper">
                                <div class="owl-carousel owl-theme">
                                    @foreach($list_company as $k=>$v)
                                    <div class="item">
                                        <div class="jp_hiring_content_main_wrapper">
                                            <div class="jp_hiring_content_wrapper">
                                                <img src="{{$v['image']}}" alt="hiring_img" width="60px" height="60px" />
                                                <h4>{{$v['name']}}</h4>
                                                <p>{{MyLibrary::getNameSetting('city',$v['place'])}}</p>
                                                <ul>
                                                    <li><a href="#">{{$v['count']}} việc làm</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cc_featured_product_main_wrapper">
                            <div class="jp_hiring_heading_wrapper jp_job_post_heading_wrapper">
                                <h2>Việc làm</h2>
                            </div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#new" aria-controls="new" role="tab" data-toggle="tab">Mới</a></li>
                                <li role="presentation"><a href="#hot" aria-controls="hot" role="tab" data-toggle="tab">Xem nhiều</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="new">
                                <div class="ss_featured_products">
                                    <div class="owl-carousel owl-theme">
                                        <?php
                                            $arr_hash=[0=>'zero',1=>'one',2=>'two'];
                                            $count=0;
                                            $page_new_post=0;
                                        ?>
                                            @foreach($new_post as $k=>$v)
                                            @if($count%5==0)
                                                @if($count!=0)
                                                </div>
                                                @endif
                                            <div class="item" data-hash="{{$arr_hash[$page_new_post]}}">
                                            <?php 
                                                $page_new_post++
                                            ?>
                                            @endif
                                            <div class="jp_job_post_main_wrapper_cont">
                                                <div class="jp_job_post_main_wrapper">
                                                    <div class="row">
                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                            <div class="jp_job_post_side_img">
                                                                <img src="{{$v->Company->image}}" alt="post_img" />
                                                            </div>
                                                            <div class="jp_job_post_right_cont">
                                                                <h4>{{$v->title}}</h4>
                                                                <p>{{$v->Company->name}}</p>
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
                                                        <li><a href="#">{{$v}},</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <?php $count++;?>
                                            @endforeach
                                            </div>
                                    </div>
                                </div>
                                <div class="video_nav_img_wrapper">
                                    <div class="video_nav_img">
                                        <ul>
                                        @for($i=0;$i<$page_new_post;$i++)
                                            <li><a class="button secondary url owl_nav" href="#{{$arr_hash[$i]}}">{{$i+1}}</a></li>
                                        @endfor
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="hot">
                                <div class="ss_featured_products">
                                    <div class="owl-carousel owl-theme">
                                        <?php
                                            $arr_hash=[0=>'zero',1=>'one',2=>'two'];
                                            $count=0;
                                            $page_new_post=0;
                                        ?>
                                            @foreach($top_view_post as $k=>$v)
                                            @if($count%5==0)
                                                @if($count!=0)
                                                </div>
                                                @endif
                                            <div class="item" data-hash="{{$arr_hash[$page_new_post]}}">
                                            <?php $page_new_post++?>
                                            @endif
                                            <div class="jp_job_post_main_wrapper_cont">
                                                <div class="jp_job_post_main_wrapper">
                                                    <div class="row">
                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                            <div class="jp_job_post_side_img">
                                                                <img src="{{$v->Company->image}}" alt="post_img" />
                                                            </div>
                                                            <div class="jp_job_post_right_cont">
                                                                <h4>{{$v->title}}</h4>
                                                                <p>{{$v->Company->name}}</p>
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
                                                        <li><a href="#">{{$v}},</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <?php $count++;?>
                                            @endforeach
                                            </div>
                                    </div>
                                </div>
                                <div class="video_nav_img_wrapper">
                                    <div class="video_nav_img">
                                        <ul>
                                        @for($i=0;$i<$page_new_post;$i++)
                                            <li><a class="button secondary url owl_nav" href="#{{$arr_hash[$i]}}">{{$i+1}}</a></li>
                                        @endfor
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="jp_register_section_main_wrapper">
                            <div class="jp_regis_left_side_box_wrapper">
                                <div class="jp_regis_left_side_box">
                                    <img src="{{asset('public/frontend/images/content/regis_icon.png')}}" alt="icon" />
                                    <h4>Tôi là nhà tuyển dụng</h4>
                                    <p>Đăng nhập,thêm công ty,<br>đăng tin tuyển dụng, tìm kiếm ứng viên...</p>
                                    <ul>
                                        <li><a href="{{url('/employer/dang-nhap.html')}}"><i class="fa fa-plus-circle"></i> &nbsp;Đăng nhập với công ty</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="jp_regis_right_side_box_wrapper">
                                <div class="jp_regis_right_img_overlay"></div>
                                <div class="jp_regis_right_side_box">
                                    <img src="{{asset('public/frontend/images/content/regis_icon2.png')}}" alt="icon" />
                                    <h4>Tôi là người tìm việc</h4>
                                    <p>Đăng nhập, ứng tuyển,<br> tìm công ty, mức lương hấp dẫn...</p>
                                    <ul>
                                        <li><a href="{{url('/ung-vien/dang-nhap.html')}}"><i class="fa fa-plus-circle"></i> &nbsp;Đăng nhập ứng viên</a></li>
                                    </ul>
                                </div>
                                <div class="jp_regis_center_tag_wrapper">
                                    <p>OR</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="jp_first_right_sidebar_main_wrapper">
                    <div class="row">
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
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="jp_spotlight_main_wrapper">
                                <div class="spotlight_header_wrapper">
                                    <h4>Việc làm nổi bật</h4>
                                </div>
                                <div class="jp_spotlight_slider_wrapper">
                                    <div class="owl-carousel owl-theme">
                                        @foreach($hightlight_job as $k=>$v)
                                        <div class="item">
                                            <div class="jp_spotlight_slider_img_Wrapper">
                                                <img src="{{asset('public/frontend/images/content/spotlight_img.jpg')}}" alt="spotlight_img" />
                                            </div>
                                            <div class="jp_spotlight_slider_cont_Wrapper">
                                                <h4>{{$v->title}})</h4>
                                                <p>{{$v->company->name}}</p>
                                                <ul>
                                                    <li style="width:135px"><i class="fa fa-cc-paypal"></i>&nbsp; {{MyLibrary::getNameSetting('slary',$v['slary'])}}</li>
                                                    <li><i class="fa fa-map-marker"></i>&nbsp; {{MyLibrary::getNameSetting('city',$v['workplace'])}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="jp_rightside_career_wrapper">
                                <div class="jp_rightside_career_heading">
                                    <h4>Tin tức mới</h4>
                                </div>
                                <div class="jp_rightside_career_main_content">
                                    <div class="jp_rightside_career_content_wrapper">
                                        <div class="jp_rightside_career_img">
                                            <img src="{{asset('public/frontend/images/content/career_img1.jpg')}}" alt="career_img" />
                                        </div>
                                        <div class="jp_rightside_career_img_cont">
                                            <h4>Job Seekeks OCT - 2017</h4>
                                            <p><i class="fa fa-calendar-o"></i> &nbsp;20 OCT, 2017</p>
                                        </div>
                                    </div>
                                    <div class="jp_rightside_career_content_wrapper">
                                        <div class="jp_rightside_career_img">
                                            <img src="{{asset('public/frontend/images/content/career_img2.jpg')}}" alt="career_img" />
                                        </div>
                                        <div class="jp_rightside_career_img_cont">
                                            <h4>Job Seekeks OCT - 2017</h4>
                                            <p><i class="fa fa-calendar-o"></i> &nbsp;20 OCT, 2017</p>
                                        </div>
                                    </div>
                                    <div class="jp_rightside_career_content_wrapper">
                                        <div class="jp_rightside_career_img">
                                            <img src="{{asset('public/frontend/images/content/career_img3.jpg')}}" alt="career_img" />
                                        </div>
                                        <div class="jp_rightside_career_img_cont">
                                            <h4>Job Seekeks OCT - 2017</h4>
                                            <p><i class="fa fa-calendar-o"></i> &nbsp;20 OCT, 2017</p>
                                        </div>
                                    </div>
                                    <div class="jp_rightside_career_btn">
                                        <a href="#"><i class="fa fa-plus-circle"></i> View All</a>
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
<!-- jp first sidebar Wrapper End -->
<!-- jp counter Wrapper Start -->
<div class="jp_counter_main_wrapper">
    <div class="container">
        <div class="gc_counter_cont_wrapper">
            <div class="count-description">
                <span class="timer">{{$count_job+100}}</span><i class="fa fa-plus"></i>
                <h5 class="con1">Công việc</h5>
            </div>
        </div>
        <div class="gc_counter_cont_wrapper2">
            <div class="count-description">
                <span class="timer">{{$count_member+100}}</span><i class="fa fa-plus"></i>
                <h5 class="con2">Thành viên</h5>
            </div>
        </div>
        <div class="gc_counter_cont_wrapper3">
            <div class="count-description">
                <span class="timer">{{$count_profile+100}}</span><i class="fa fa-plus"></i>
                <h5 class="con3">Hồ sơ</h5>
            </div>
        </div>
        <div class="gc_counter_cont_wrapper4">
            <div class="count-description">
                <span class="timer">{{$count_company+100}}</span><i class="fa fa-plus"></i>
                <h5 class="con4">Công ty</h5>
            </div>
        </div>
    </div>
</div>
<!-- jp counter Wrapper End -->
<!-- jp Best deals Wrapper Start -->
<div class="jp_best_deals_main_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="jp_best_deal_slider_main_wrapper">
                    <div class="jp_best_deal_heading_wrapper">
                        <h2>Các giải pháp website</h2>
                    </div>
                    <div class="jp_best_deal_slider_wrapper">
                        <div class="owl-carousel owl-theme">
                            @for($i=1;$i<=3;$i++)
                            <div class="item">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="jp_best_deal_main_cont_wrapper">
                                            <div class="jp_best_deal_icon_sec">
                                                <i class="flaticon-magnifying-glass"></i>
                                            </div>
                                            <div class="jp_best_deal_cont_sec">
                                                <h4><a href="javascript:void(0)">Tìm kiếm việc làm</a></h4>
                                                <p>Cung cấp hàng nghìn cơ hội việc làm cho ứng viên...</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="jp_best_deal_main_cont_wrapper jp_best_deal_main_cont_wrapper1">
                                            <div class="jp_best_deal_icon_sec">
                                                <i class="flaticon-users"></i>
                                            </div>
                                            <div class="jp_best_deal_cont_sec">
                                                <h4><a href="javascript:void(0)">Ứng tuyển công việc tốt nhất</a></h4>
                                                <p>Đội ngũ quản lí lọc hồ sơ một cách chặt chẽ nhất để...</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="jp_best_deal_main_cont_wrapper jp_best_deal_main_cont_wrapper2">
                                            <div class="jp_best_deal_icon_sec">
                                                <i class="flaticon-shield"></i>
                                            </div>
                                            <div class="jp_best_deal_cont_sec">
                                                <h4><a href="javascript:void(0)">Bảo mật</a></h4>
                                                <p>Bảo mật thông tin của người tìm việc cũng như thông tin công ty...</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="jp_best_deal_main_cont_wrapper jp_best_deal_main_cont_wrapper2">
                                            <div class="jp_best_deal_icon_sec">
                                                <i class="flaticon-notification"></i>
                                            </div>
                                            <div class="jp_best_deal_cont_sec">
                                                <h4><a href="javascript:void(0)">Thông báo việc làm</a></h4>
                                                <p>Thông báo việc làm đến email của bạn hằng ngày...</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="jp_rightside_career_wrapper jp_best_deal_right_sec_wrapper">
                    <div class="jp_rightside_career_heading">
                        <h4>Ứng viên mới</h4>
                    </div>
                    <div class="jp_rightside_career_main_content">
                        @foreach($new_candidate as $k=>$v)
                        <div class="jp_rightside_career_content_wrapper jp_best_deal_right_content">
                            <div class="jp_rightside_career_img">
                                <img src="{{$v->image}}" alt="career_img" width="80px" height="80px" />
                            </div>
                            <div class="jp_rightside_career_img_cont">
                                <h4>{{$v->name}}</h4>
                                <p><i class="fa fa-folder-open-o"></i> &nbsp;{{$v->phone}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- jp Best deals Wrapper End -->
<!-- jp Client Wrapper Start -->
<div class="jp_client_slider_main_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="jp_first_client_slider_wrapper">
                    <div class="jp_first_client_slider_img_overlay"></div>
                    <div class="jp_client_heading_wrapper">
                        <h2>Mọi người nói gì về chúng tôi?</h2>
                    </div>
                    <div class="jp_client_slider_wrapper">
                        <div class="owl-carousel owl-theme">
                            <div class="item">
                                <div class="jp_client_slide_show_wrapper">
                                    <div class="jp_client_slider_img_wrapper">
                                        <img src="{{asset('public/frontend/images/content/client_slider_img.jpg')}}" alt="client_img" />
                                    </div>
                                    <div class="jp_client_slider_cont_wrapper">
                                        <p>“Một trang website tuyệt vời để tìm kiếm những ứng viên tài năng cho công ty”</p>
                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i><span>~ Jeniffer Doe &nbsp;<b>(Ui Designer)</b></span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="jp_client_slide_show_wrapper">
                                    <div class="jp_client_slider_img_wrapper">
                                        <img src="{{asset('public/frontend/images/content/client_slider_img.jpg')}}" alt="client_img" />
                                    </div>
                                    <div class="jp_client_slider_cont_wrapper">
                                        <p>“Một trang website tuyệt vời để tìm kiếm những ứng viên tài năng cho công ty”</p>
                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i><span>~ Jeniffer Doe &nbsp<b>(Ui Designer)</b></span>
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
<!-- jp Client Wrapper End -->
<!-- jp downlord Wrapper Start -->
<div class="jp_downlord_main_wrapper">
    <div class="jp_downlord_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 hidden-sm hidden-xs">
                <div class="jp_down_mob_img_wrapper">
                    <img src="{{asset('public/frontend/images/content/mobail.png')}}" alt="mobail_img" />
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="ss_download_wrapper_details">
                    <h1><span>Tải Miễn Phí</span><br>Job Pro App ngay bây giờ!</h1>
                    <p>Nhanh, Đơn giản & Hiệu quả. Tất cả chỉ mất 30s!!!.</p>
                    <a href="#" class="ss_appstore"><span><i class="fa fa-apple" aria-hidden="true"></i></span> App Store</a>
                    <a href="#" class="ss_playstore"><span><i class="fa fa-android" aria-hidden="true"></i></span> Play Store</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 visible-sm visible-xs">
                <div class="jp_down_mob_img_wrapper">
                    <img src="{{asset('public/frontend/images/content/mobail.png')}}" class="img-responsive')}}" alt="mobail_img" />
                </div>
            </div>
        </div>
    </div>
</div>
<!-- jp downlord Wrapper End -->
<!-- jp Newsletter Wrapper Start -->
@endsection

@section('js')
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