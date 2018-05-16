<div class="jp_main_footer_img_wrapper">
    <div class="jp_newsletter_img_overlay_wrapper"></div>
    <div class="jp_newsletter_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="jp_newsletter_text">
                        <img src="{{asset('public/frontend/images/content/news_logo.png')}}" class="img-responsive')}}" alt="news_logo" />
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="jp_newsletter_field">
                        <i class="fa fa-envelope-o"></i>
                        <form action="{{route('post_register_email')}}" method="POST">
                        @csrf
                            <input name="email" type="email" placeholder="Enter Your Email" value="{{$email}}">
                            <select name="category" class="select2">
                                @foreach($category as $k=>$v)
                                <option value="{{$v->id}}">{{$v->name}}</option>
                                @endforeach
                            </select><i class="fa fa-angle-down second_icon"></i>
                            <style>
                                .select2-container--default{
                                    margin-top: 20px;
                                    margin-left: -33px;
                                }
                                .select2-dropdown--below{
                                    width: 270px;
                                    margin-top: -31px;
                                    margin-left: 70px;
                                }
                            </style>
                            <button type="submit">Đăng kí</button>
                        </from>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jp Newsletter Wrapper End -->
    <!-- jp footer Wrapper Start -->
    <div class="jp_footer_main_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="jp_footer_logo_wrapper">
                        <div class="jp_footer_logo">
                            <a href="#"><img src="{{asset('public/frontend/images/content/resume_logo.png')}}" alt="footer_logo"/></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="jp_bottom_footer_Wrapper">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="jp_bottom_footer_left_cont">
                                    <p>© 2017-18 Job Pro. All Rights Reserved.</p>
                                </div>
                                <div class="jp_bottom_top_scrollbar_wrapper">
                                    <a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="jp_bottom_footer_right_cont">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li class="hidden-xs"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li class="hidden-xs"><a href="#"><i class="fa fa-vimeo"></i></a></li>
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