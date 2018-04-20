//Khi click vào nút ưa thích
$(document).on('click','.love_action',function(){
    var id=$(this).data('id');
    var current=$(this);
    var url='http://localhost:90/Find_Job/yeu-thich.html?id='+id;
    $.get(url,function(res){
        var result=JSON.parse(res);
        if(result.status!=200)
        {
            var alert=confirm(result.content+' .Bạn có muốn chuyển mục đăng nhập (bổ sung thông tin)?');
            if(alert)
            {
                window.location.href=result.link;
            }
        }else
        {
            current.toggleClass('love_active');
        }
    });
})