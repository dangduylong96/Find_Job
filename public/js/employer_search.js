//Ajax tìm kiếm ứng viên
$(document).on('click','.ajax_page_normal',function(){
    var keyword=$('input[name="keyword"]').val();
    var sort_order=$('select[name="sort_order"]').val();

    var category_id = $("input[name='ajax_category_id[]']:checked").map(function(){
        return $(this).val();
    }).get();
    //Nếu nghành k chọn thì lấy trên input
    if(jQuery.isEmptyObject(category_id))
    {
        category_id=$('select[name="category_id"]').val();
    }

    var level = $("input[name='ajax_level[]']:checked").map(function(){
        return $(this).val();
    }).get();
    //Nếu kinh nghiệm k chọn thì lấy trên input
    if(jQuery.isEmptyObject(level))
    {
        level=$('select[name="level"]').val();
    }

    var slary = $("input[name='ajax_slary[]']:checked").map(function(){
        return $(this).val();
    }).get();
    //Nếu lương k chọn thì lấy trên input
    if(jQuery.isEmptyObject(slary))
    {
        slary=$('select[name="slary"]').val();
    }

    var city = $("input[name='ajax_city[]']:checked").map(function(){
        return $(this).val();
    }).get();
    //Nếu thành phố k chọn thì lấy trên input
    if(jQuery.isEmptyObject(city))
    {
        city=$('select[name="city"]').val();
    }

    var data={
        'keyword':keyword,
        'sort_order':sort_order,
        'page':1,
        'category_id':category_id,
        'level':level,
        'slary':slary,
        'city':city
    };
    console.log(data);
    $.ajax({
        url:'http://localhost:90/Find_Job/employer/ajax-tim-kiem-ung-vien.html',
        type:"GET",
        data:data,
        dataType:"html",
        success: function(reponse){
            var res=JSON.parse(reponse);
            if(res.status==200)
            {
                // $('#show').html('Bạn đang xem &nbsp;<span>'+(res.page-1)*12+' đến '+res.total+'</span>');
                $('#result_grid').html(res.content);
            }       
        }
    })
})