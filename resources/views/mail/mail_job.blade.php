<?php
    $i=1;
?>
<h3>Chúng tôi vừa tìm thấy những việc làm phù hợp với bạn</h3>
@foreach($id_post as $v)
    <a href="{{url('/')}}/chi-tiet-p{{$v}}.html">Click vào đây để xem chi tiết việc làm thứ {{$i}}</a><br>
    <?php
        $i++;
    ?>
@endforeach