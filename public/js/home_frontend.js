$( function() {
    $('#submit_search').click(function(){
        $('#form_search').submit();
    })
});

//Ajaxs seach
//Khi click chuyển trang
$(document).on('click','.ajax_page',function(){
    var current=$(this);
    var keyword=$('#search_job').val();
    var sort_order=$('select[name="sort_order"]').val();
    var page=current.data('page');
    var sex = $("input[name='sex[]']:checked").map(function(){
        return $(this).val();
    }).get();
    if(jQuery.isEmptyObject(sex))
    {
        sex='all';
    }
    var city = $("input[name='city[]']:checked").map(function(){
        return $(this).val();
    }).get();
    //Nếu thành phố k chọn thì lấy trên input
    if(jQuery.isEmptyObject(city))
    {
        city=$('select[name="city"]').val();
    }
    var level = $("input[name='level[]']:checked").map(function(){
        return $(this).val();
    }).get();
    if(jQuery.isEmptyObject(level))
    {
        level='all';
    }
    var slary = $("input[name='slary[]']:checked").map(function(){
        return $(this).val();
    }).get();
    if(jQuery.isEmptyObject(slary))
    {
        slary='all';
    }
    //Nếu kinh nghiệm k chọn thì lấy trên input
    var experience = $("input[name='experience[]']:checked").map(function(){
        return $(this).val();
    }).get();
    if(jQuery.isEmptyObject(experience))
    {
        experience=$('select[name="experience"]').val();
    }
    var data={
        '_token':$('input[name="_token"]').val(),
        'keyword':keyword,
        'sort_order':sort_order,
        'page':page,
        'sex':sex,
        'city':city,
        'level':level,
        'slary':slary,
        'experience':experience
    };
    $.ajax({
        url:'http://localhost:90/Find_Job/tim-kiem-ajax.html',
        type:"POST",
        data:data,
        dataType:"html",
        success: function(reponse){
            var res=JSON.parse(reponse);
            $('#show').html('Bạn đang xem &nbsp;<span>'+(res.page-1)*12+' đến '+res.total+'</span>');
            $('#result_grid').html(res.content);
        }
    })
})
$(document).on('click','.ajax_page_normal',function(){
    var keyword=$('#search_job').val();
    var sort_order=$('select[name="sort_order"]').val();
    var page=1;
    var sex = $("input[name='sex[]']:checked").map(function(){
        return $(this).val();
    }).get();
    if(jQuery.isEmptyObject(sex))
    {
        sex='all';
    }
    var city = $("input[name='city[]']:checked").map(function(){
        return $(this).val();
    }).get();
    //Nếu thành phố k chọn thì lấy trên input
    if(jQuery.isEmptyObject(city))
    {
        city=$('select[name="city"]').val();
    }
    var level = $("input[name='level[]']:checked").map(function(){
        return $(this).val();
    }).get();
    if(jQuery.isEmptyObject(level))
    {
        level='all';
    }
    var slary = $("input[name='slary[]']:checked").map(function(){
        return $(this).val();
    }).get();
    if(jQuery.isEmptyObject(slary))
    {
        slary='all';
    }
    //Nếu kinh nghiệm k chọn thì lấy trên input
    var experience = $("input[name='experience[]']:checked").map(function(){
        return $(this).val();
    }).get();
    if(jQuery.isEmptyObject(experience))
    {
        experience=$('select[name="experience"]').val();
    }
    var data={
        '_token':$('input[name="_token"]').val(),
        'keyword':keyword,
        'sort_order':sort_order,
        'page':page,
        'sex':sex,
        'city':city,
        'level':level,
        'slary':slary,
        'experience':experience
    };
    $.ajax({
        url:'http://localhost:90/Find_Job/tim-kiem-ajax.html',
        type:"POST",
        data:data,
        dataType:"html",
        success: function(reponse){
            var res=JSON.parse(reponse);
            $('#show').html('Bạn đang xem &nbsp;<span>'+(res.page-1)*12+' đến '+res.total+'</span>');
            $('#result_grid').html(res.content);
        }
    })
})
$(document).on('change','select[name="sort_order"]',function(){
    var keyword=$('#search_job').val();
    var sort_order=$('select[name="sort_order"]').val();
    var page=1;
    var sex = $("input[name='sex[]']:checked").map(function(){
        return $(this).val();
    }).get();
    if(jQuery.isEmptyObject(sex))
    {
        sex='all';
    }
    var city = $("input[name='city[]']:checked").map(function(){
        return $(this).val();
    }).get();
    //Nếu thành phố k chọn thì lấy trên input
    if(jQuery.isEmptyObject(city))
    {
        city=$('select[name="city"]').val();
    }
    var level = $("input[name='level[]']:checked").map(function(){
        return $(this).val();
    }).get();
    if(jQuery.isEmptyObject(level))
    {
        level='all';
    }
    var slary = $("input[name='slary[]']:checked").map(function(){
        return $(this).val();
    }).get();
    if(jQuery.isEmptyObject(slary))
    {
        slary='all';
    }
    //Nếu kinh nghiệm k chọn thì lấy trên input
    var experience = $("input[name='experience[]']:checked").map(function(){
        return $(this).val();
    }).get();
    if(jQuery.isEmptyObject(experience))
    {
        experience=$('select[name="experience"]').val();
    }
    var data={
        '_token':$('input[name="_token"]').val(),
        'keyword':keyword,
        'sort_order':sort_order,
        'page':page,
        'sex':sex,
        'city':city,
        'level':level,
        'slary':slary,
        'experience':experience
    };
    $.ajax({
        url:'http://localhost:90/Find_Job/tim-kiem-ajax.html',
        type:"POST",
        data:data,
        dataType:"html",
        success: function(reponse){
            var res=JSON.parse(reponse);
            $('#show').html('Bạn đang xem &nbsp;<span>'+(res.page-1)*12+' đến '+res.total+'</span>');
            $('#result_grid').html(res.content);
        }
    })
})