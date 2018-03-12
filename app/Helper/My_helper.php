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
        return '<div class="box-header"><div class="alert alert-'.$status.' alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> '.$title.'!</h4>'.$string.'</div><h3 class="box-title">Quản lí thành phố</h3></div>';
    }
}