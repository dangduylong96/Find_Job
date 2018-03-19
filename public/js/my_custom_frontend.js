//Khi click vào nút ưa thích
$(document).on('click','.love_action',function(){
    var id=$(this).data('id');
    var current=$(this);
    console.log(current);
    //Kiểm tra có yêu thích hay chưa
    if($(this).hasClass('love_active'))
    {
        var url='http://localhost:90/Find_Job/yeu-thich.html?id='+id;
        $.get(url,function(res){
            var result=JSON.parse(res);
            if(result.status!=200)
            {
                var alert=confirm(result.content+' .Bạn có muốn chuyển mục đăng nhập (bổ sung thông tin)?');
                if(alert)
                {
                    window.open(result.link,'_blank');
                }
            }else
            {
                current.removeClass('love_active');
            }
        });
    }else
    {
        var url='http://localhost:90/Find_Job/yeu-thich.html?id='+id;
        $.get(url,function(res){
            var result=JSON.parse(res);
            if(result.status!=200)
            {
                var alert=confirm(result.content+' .Bạn có muốn chuyển mục đăng nhập (bổ sung thông tin)?');
                if(alert)
                {
                    window.open(result.link,'_blank');
                }
            }else
            {
                current.addClass('love_active');
            }
        });
    }
})