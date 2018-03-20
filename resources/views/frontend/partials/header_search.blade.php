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
                    <form id="form_search" action="tim-kiem.html" method="get">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <input name="keyword" id="search_job" type="text" placeholder="Keyword e.g. (PHP, Java, SQL,..)" value="{{$keyword}}">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="jp_form_location_wrapper">
                                <i class="fa fa-dot-circle-o first_icon"></i>
                                <select name="city">
                                    <option value="all" {{$current_city=='all'?'selected':''}}>Tất cả</option>
                                    @foreach($city as $k=>$v)
                                    <option value="{{$k}}" {{$current_city==$k?'selected':''}}>{{$v}}</option>
                                    @endforeach
                                </select><i class="fa fa-angle-down second_icon"></i>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="jp_form_exper_wrapper">
                                <i class="fa fa-dot-circle-o first_icon"></i>
                                <select name="category">
                                    <option value="all" {{$current_city=='all'?'selected':''}}>Tất cả</option>
                                    @foreach($category as $k=>$v)
                                    <option value="{{$v->id}}" {{$current_category==$v->id?'selected':''}}>{{$v->name}}</option>
                                    @endforeach
                                </select><i class="fa fa-angle-down second_icon"></i>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <div class="jp_form_btn_wrapper">
                                <ul>
                                    <li id="submit_search"><a href="javascript:void(0)"><i class="fa fa-search"></i> Tìm kiếm</a></li>
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
                            <li><a href="tim-kiem.html?keyword={{$v}}&city=all&experience=all">{{$v}},</a></li>
                            @endforeach
                            <li><a href="javascript:void(0)">...</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>