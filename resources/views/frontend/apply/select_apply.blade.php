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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="jp_listing_left_sidebar_wrapper">
                    <div class="jp_job_des">
                        <h2>Chọn hình thức ứng tuyển</h2>
                        <p>Hồ sơ có sẵn của bạn</p>
                        <form id="form_apply" action="ung-tuyen-p{{$id}}.html" method="post" enctype='multipart/form-data'>
                        @csrf
                            @foreach($candidate_profile as $v)
                            <div class="radio">
                                <label><input type="radio" name="cv" value="{{$v->id}}">{{$v->title}}</label>
                            </div>
                            @endforeach              
                            <label><input type="radio" name="cv" value="cv_file">Chọn từ máy tính</label>     
                            <input type="file" name="cv_file"><br>
                            <button type="submit" class="btn btn-danger btn-block">Ứng tuyển</button>
                        </form>
                        <p><a href="/ung-vien/them-tro-giup.html" target="_blank" class="link_create_cv">Bạn muốn tạo mới hồ sơ?</a></p>
                    </div>
                </div>
                <div class="jp_listing_related_heading_wrapper">
                    <h2>Việc làm liên quan</h2>
                    <div class="jp_listing_related_slider_wrapper">
                        <div class="owl-carousel owl-theme">
                            <div class="item">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="jp_job_post_main_wrapper_cont jp_job_post_grid_main_wrapper_cont">
                                            <div class="jp_job_post_main_wrapper">
                                                <div class="row">
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                        <div class="jp_job_post_side_img">
                                                            <img src="images/content/job_post_img1.jpg" alt="post_img" />
                                                        </div>
                                                        <div class="jp_job_post_right_cont">
                                                            <h4>HTML Developer (1 - 2 Yrs Exp.)</h4>
                                                            <p>Webstrot Technology Pvt. Ltd.</p>
                                                            <ul>
                                                                <li><i class="fa fa-cc-paypal"></i>&nbsp; $12K - 15k P.A.</li>
                                                                <li><i class="fa fa-map-marker"></i>&nbsp; Caliphonia, PO 455001</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <div class="jp_job_post_right_btn_wrapper">
                                                            <ul>
                                                                <li><a href="javascript:void(0)" class="love_action"><i class="fa fa-heart-o"></i></a></li>
                                                                <li><a href="#">Part Time</a></li>
                                                                <li><a href="#">Apply</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jp_job_post_keyword_wrapper">
                                                <ul>
                                                    <li><i class="fa fa-tags"></i>Keywords :</li>
                                                    <li><a href="#">ui designer,</a></li>
                                                    <li><a href="#">developer,</a></li>
                                                    <li><a href="#">senior</a></li>
                                                    <li><a href="#">it company,</a></li>
                                                    <li><a href="#">design,</a></li>
                                                    <li><a href="#">call center</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="jp_job_post_main_wrapper_cont jp_job_post_grid_main_wrapper_cont">
                                            <div class="jp_job_post_main_wrapper">
                                                <div class="row">
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                        <div class="jp_job_post_side_img">
                                                            <img src="images/content/job_post_img2.jpg" alt="post_img" />
                                                        </div>
                                                        <div class="jp_job_post_right_cont">
                                                            <h4>HTML Developer (1 - 2 Yrs Exp.)</h4>
                                                            <p>Webstrot Technology Pvt. Ltd.</p>
                                                            <ul>
                                                                <li><i class="fa fa-cc-paypal"></i>&nbsp; $12K - 15k P.A.</li>
                                                                <li><i class="fa fa-map-marker"></i>&nbsp; Caliphonia, PO 455001</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <div class="jp_job_post_right_btn_wrapper">
                                                            <ul>
                                                                <li><a href="javascript:void(0)" class="love_action"><i class="fa fa-heart-o"></i></a></li>
                                                                <li><a href="#">Part Time</a></li>
                                                                <li><a href="#">Apply</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jp_job_post_keyword_wrapper">
                                                <ul>
                                                    <li><i class="fa fa-tags"></i>Keywords :</li>
                                                    <li><a href="#">ui designer,</a></li>
                                                    <li><a href="#">developer,</a></li>
                                                    <li><a href="#">senior</a></li>
                                                    <li><a href="#">it company,</a></li>
                                                    <li><a href="#">design,</a></li>
                                                    <li><a href="#">call center</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="jp_job_post_main_wrapper_cont jp_job_post_grid_main_wrapper_cont">
                                            <div class="jp_job_post_main_wrapper">
                                                <div class="row">
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                        <div class="jp_job_post_side_img">
                                                            <img src="images/content/job_post_img3.jpg" alt="post_img" />
                                                        </div>
                                                        <div class="jp_job_post_right_cont">
                                                            <h4>HTML Developer (1 - 2 Yrs Exp.)</h4>
                                                            <p>Webstrot Technology Pvt. Ltd.</p>
                                                            <ul>
                                                                <li><i class="fa fa-cc-paypal"></i>&nbsp; $12K - 15k P.A.</li>
                                                                <li><i class="fa fa-map-marker"></i>&nbsp; Caliphonia, PO 455001</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <div class="jp_job_post_right_btn_wrapper">
                                                            <ul>
                                                                <li><a href="javascript:void(0)" class="love_action"><i class="fa fa-heart-o"></i></a></li>
                                                                <li><a href="#">Part Time</a></li>
                                                                <li><a href="#">Apply</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jp_job_post_keyword_wrapper">
                                                <ul>
                                                    <li><i class="fa fa-tags"></i>Keywords :</li>
                                                    <li><a href="#">ui designer,</a></li>
                                                    <li><a href="#">developer,</a></li>
                                                    <li><a href="#">senior</a></li>
                                                    <li><a href="#">it company,</a></li>
                                                    <li><a href="#">design,</a></li>
                                                    <li><a href="#">call center</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="jp_job_post_main_wrapper_cont jp_job_post_grid_main_wrapper_cont">
                                            <div class="jp_job_post_main_wrapper">
                                                <div class="row">
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                        <div class="jp_job_post_side_img">
                                                            <img src="images/content/job_post_img1.jpg" alt="post_img" />
                                                        </div>
                                                        <div class="jp_job_post_right_cont">
                                                            <h4>HTML Developer (1 - 2 Yrs Exp.)</h4>
                                                            <p>Webstrot Technology Pvt. Ltd.</p>
                                                            <ul>
                                                                <li><i class="fa fa-cc-paypal"></i>&nbsp; $12K - 15k P.A.</li>
                                                                <li><i class="fa fa-map-marker"></i>&nbsp; Caliphonia, PO 455001</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <div class="jp_job_post_right_btn_wrapper">
                                                            <ul>
                                                                <li><a href="javascript:void(0)" class="love_action"><i class="fa fa-heart-o"></i></a></li>
                                                                <li><a href="#">Part Time</a></li>
                                                                <li><a href="#">Apply</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jp_job_post_keyword_wrapper">
                                                <ul>
                                                    <li><i class="fa fa-tags"></i>Keywords :</li>
                                                    <li><a href="#">ui designer,</a></li>
                                                    <li><a href="#">developer,</a></li>
                                                    <li><a href="#">senior</a></li>
                                                    <li><a href="#">it company,</a></li>
                                                    <li><a href="#">design,</a></li>
                                                    <li><a href="#">call center</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="jp_job_post_main_wrapper_cont jp_job_post_grid_main_wrapper_cont">
                                            <div class="jp_job_post_main_wrapper">
                                                <div class="row">
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                        <div class="jp_job_post_side_img">
                                                            <img src="images/content/job_post_img2.jpg" alt="post_img" />
                                                        </div>
                                                        <div class="jp_job_post_right_cont">
                                                            <h4>HTML Developer (1 - 2 Yrs Exp.)</h4>
                                                            <p>Webstrot Technology Pvt. Ltd.</p>
                                                            <ul>
                                                                <li><i class="fa fa-cc-paypal"></i>&nbsp; $12K - 15k P.A.</li>
                                                                <li><i class="fa fa-map-marker"></i>&nbsp; Caliphonia, PO 455001</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <div class="jp_job_post_right_btn_wrapper">
                                                            <ul>
                                                                <li><a href="javascript:void(0)" class="love_action"><i class="fa fa-heart-o"></i></a></li>
                                                                <li><a href="#">Part Time</a></li>
                                                                <li><a href="#">Apply</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jp_job_post_keyword_wrapper">
                                                <ul>
                                                    <li><i class="fa fa-tags"></i>Keywords :</li>
                                                    <li><a href="#">ui designer,</a></li>
                                                    <li><a href="#">developer,</a></li>
                                                    <li><a href="#">senior</a></li>
                                                    <li><a href="#">it company,</a></li>
                                                    <li><a href="#">design,</a></li>
                                                    <li><a href="#">call center</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="jp_job_post_main_wrapper_cont jp_job_post_grid_main_wrapper_cont">
                                            <div class="jp_job_post_main_wrapper">
                                                <div class="row">
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                        <div class="jp_job_post_side_img">
                                                            <img src="images/content/job_post_img3.jpg" alt="post_img" />
                                                        </div>
                                                        <div class="jp_job_post_right_cont">
                                                            <h4>HTML Developer (1 - 2 Yrs Exp.)</h4>
                                                            <p>Webstrot Technology Pvt. Ltd.</p>
                                                            <ul>
                                                                <li><i class="fa fa-cc-paypal"></i>&nbsp; $12K - 15k P.A.</li>
                                                                <li><i class="fa fa-map-marker"></i>&nbsp; Caliphonia, PO 455001</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <div class="jp_job_post_right_btn_wrapper">
                                                            <ul>
                                                                <li><a href="javascript:void(0)" class="love_action"><i class="fa fa-heart-o"></i></a></li>
                                                                <li><a href="#">Part Time</a></li>
                                                                <li><a href="#">Apply</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jp_job_post_keyword_wrapper">
                                                <ul>
                                                    <li><i class="fa fa-tags"></i>Keywords :</li>
                                                    <li><a href="#">ui designer,</a></li>
                                                    <li><a href="#">developer,</a></li>
                                                    <li><a href="#">senior</a></li>
                                                    <li><a href="#">it company,</a></li>
                                                    <li><a href="#">design,</a></li>
                                                    <li><a href="#">call center</a></li>
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
    </div>
</div>
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
$('input[name="cv_file"]').hide();
$(document).on('click','input[name="cv"][value="cv_file"]',function(){
    $('input[name="cv_file"]').show();
})
$(document).on('click','input[name="cv"][value!="cv_file"]',function(){
    $('input[name="cv_file"]').hide();
})
{{--  if ($('input[name=cv_file]:checked').length > 0) {
    $('input[name="cv_file"]').val("");
}  --}}
</script>
@endsection