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

//Chuyển sang chuỗi SEO
if (! function_exists('getSeo')) {
    function getSeo($str='')
    {
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/(À|Á|Ạ|Ả|Ã|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/', 'A', $str);
        $str = preg_replace('/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/', 'E', $str);
        $str = preg_replace('/(Ì|Í|Ị|Ỉ|Ĩ)/', 'I', $str);
        $str = preg_replace('/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/', 'O', $str);
        $str = preg_replace('/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/', 'U', $str);
        $str = preg_replace('/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/', 'Y', $str);
        $str = preg_replace('/(Đ)/', 'D', $str);
        $str = preg_replace("/(,)/", '-', $str);
        $str = preg_replace("/(\")/", '-', $str);
        $str = preg_replace("/(:)/", '-', $str);
        $str = preg_replace("/(\.)/", '', $str);
        $str = preg_replace("/(\?)/", '-', $str);
        $str = preg_replace('/(\/)/', '-', $str);
        $str = preg_replace('/(\/)/', '-', $str);
        $str = preg_replace('/(\))/', '-', $str);
        $str = preg_replace('/(\()/', '-', $str);
        $str = str_replace('#','-',$str);
        $str = str_replace('$','-',$str);
        $str = preg_replace('/(\s)+/', '-', $str);       
        $str = str_replace('--','-',$str);      
        // $str = str_replace(' ', '-', str_replace('&*#39;','",$str));
        return $str;
    }
}