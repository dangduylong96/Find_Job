<div class="jp_banner_heading_cont_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="jp_job_heading_wrapper">
                    <div class="jp_job_heading">
                        <h1><span>3,000+</span> bài đăng tuyển dụng</h1>
                        <p>Tìm việc, Tuyển dụng &amp; Cơ hội nghề nghiệp</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="jp_header_form_wrapper">
                    <form action="#" method="post">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <input type="text" placeholder="Keyword e.g. (PHP, Java, SQL,..)">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="jp_form_location_wrapper">
                                <i class="fa fa-dot-circle-o first_icon"></i>
                                <select name="city">
                                    <option value="all">Tất cả</option>
                                    @foreach($city as $k=>$v)
                                    <option value="{{$k}}">{{$v}}</option>
                                    @endforeach
                                </select><i class="fa fa-angle-down second_icon"></i>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="jp_form_exper_wrapper">
                                <i class="fa fa-dot-circle-o first_icon"></i>
                                <select name="experience">
                                    <option value="all">Tất cả</option>
                                    @foreach($experience as $k=>$v)
                                    <option value="{{$k}}">{{$v}}</option>
                                    @endforeach
                                </select><i class="fa fa-angle-down second_icon"></i>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <div class="jp_form_btn_wrapper">
                                <ul>
                                    <li><a href="#"><i class="fa fa-search"></i> Tìm kiếm</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="jp_banner_main_jobs_wrapper">
                    <div class="jp_banner_main_jobs">
                        <ul>
                            <li><i class="fa fa-tags"></i> Từ khóa thông dụng :</li>
                            @foreach($top_5_tag as $k=>$v)
                            <li><a href="#">{{$v}},</a></li>
                            @endforeach
                            <li><a href="#">...</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="jp_banner_jobs_categories_wrapper">
    <div class="container">
        <div class="jp_top_jobs_category_wrapper jp_job_cate_left_border jp_job_cate_left_border_bottom">
            <div class="jp_top_jobs_category">
                <i class="fa fa-chrome"></i>
                <h3><a href="#">Web Developer</a></h3>
                <p>(240 mục)</p>
            </div>
        </div>
        <div class="jp_top_jobs_category_wrapper jp_job_cate_left_border_bottom">
            <div class="jp_top_jobs_category">
                <i class="fa fa-laptop"></i>
                <h3><a href="#">Desktop Developer</a></h3>
                <p>(504 jobs)</p>
            </div>
        </div>
        <div class="jp_top_jobs_category_wrapper jp_job_cate_left_border_bottom">
            <div class="jp_top_jobs_category">
                <i class="fa fa-android"></i>
                <h3><a href="#">Android Developer</a></h3>
                <p>(2250 mục)</p>
            </div>
        </div>
        <div class="jp_top_jobs_category_wrapper jp_job_cate_left_border_res">
            <div class="jp_top_jobs_category">
                <i class="fa fa-apple"></i>
                <h3><a href="#">IOS Developer</a></h3>
                <p>(202 mục)</p>
            </div>
        </div>
        <div class="jp_top_jobs_category_wrapper">
            <div class="jp_top_jobs_category">
                <i class="fa fa-code"></i>
                <h3><a href="#">Order</a></h3>
                <p>(1457 mục)</p>
            </div>
        </div>
        <div class="jp_top_jobs_category_wrapper">
            <div class="jp_top_jobs_category">
                <i class="fa fa-th-large"></i>
                <h3><a href="#">Tất cả</a></h3>
                <p>(2000+ mục)</p>
            </div>
        </div>
    </div>
</div>