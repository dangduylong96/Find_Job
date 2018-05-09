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
                            @if($v->status==1)
                            <div class="radio">
                                <label><input type="radio" name="cv" value="{{$v->id}}">{{$v->title}}</label>
                            </div>
                            @endif
                            @endforeach              
                            <label><input type="radio" name="cv" value="cv_file">Chọn từ máy tính</label>     
                            <input type="file" name="cv_file"><br>
                            <button type="submit" class="btn btn-danger btn-block">Ứng tuyển</button>
                        </form>
                        <p><a href="/ung-vien/them-tro-giup.html" target="_blank" class="link_create_cv">Bạn muốn tạo mới hồ sơ?</a></p>
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