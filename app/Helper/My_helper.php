<?php
//Hiện ra thông báo
if (! function_exists('createMessage')) {
    function createMessage($status,$string)
    {
        if($status=='success')
        {
            $title='Thành công';
        }elseif($status=='danger')
        {
            $title='Lỗi';
        }elseif($status=='warning')
        {
            $title='Chú ý';
        }else
        {
            $title='Thông tin';
        }
        return '<div class="box-header"><div class="alert alert-'.$status.' alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> '.$title.'!</h4>'.$string.'</div>';
    }
}

//Hiện ra lable trạng thái
if (! function_exists('createLabel')) {
    function createLabel($status=0)
    {
        $arr_status=[
            0=>'Đang chờ duyệt',
            1=>'Đã duyệt',
            2=>'Hết hạn',
            3=>'Hủy'
        ];
        $arr_color_status=[
            0=>'primary',
            1=>'success',
            2=>'warning',
            3=>'danger'
        ];
        return '<span class="label label-'.$arr_color_status[$status].'">'.$arr_status[$status].'</span>';
    }
}

//Hiện ra lable hiện ẩn
if (! function_exists('createLabelShowHide')) {
    function createLabelShowHide($status=0)
    {
        $arr_status=[
            0=>'Không tìm kiếm',
            1=>'Cho tìm kiếm'
        ];
        $arr_color_status=[
            0=>'danger',
            1=>'success'
        ];
        return '<span class="label label-'.$arr_color_status[$status].'">'.$arr_status[$status].'</span>';
    }
}