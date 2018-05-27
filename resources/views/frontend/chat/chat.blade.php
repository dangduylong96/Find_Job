@extends('frontend.layout.layout')
@section('header')
@include('frontend.partials.header_chat',['a'=>3]);
@endsection
@section('content')
<div class="container chat_layout">
    <div id="content_chat" class="chat col-md-6">

    </div>
    <div class="form_chat col-md-push-1 col-md-4">
        <form class="form-horizontal">
            <div class="form-group">
                <label for="usr">Name:</label>
                <input type="text" class="form-control" id="name_chat">
            </div>
            <div class="form-group">
                <label for="comment">Nội dung:</label>
                <textarea class="form-control" rows="5" id="message"></textarea>
            </div>
            <div class="form-group"> 
                <button id="send" type="button" class="btn btn-danger">Gửi</button>
            </div>
        </form>
        <div class="contact_tell">
            <h4 style="color:wheat">Mọi thắc mắc và báo cáo vui lòng liên hệ: </h4>
            <p>EMAIL1: dangduylong96@gmail.com</p>
            <p>EMAIL2: buihoangson@gmail.com</p>
            <p>SĐT: 0988936354</p>
        </div>
    </div>
</div>

@endsection

@section('css')
<style>
    .chat_layout{
        margin-top: 13%;
        margin-bottom: 2%;
    }
    .chat{
        background-color: white;
        height: 500px;
        overflow: scroll;
    }
    .contact_tell:{
        color: wheat;
    }
</style>
@endsection

@section('js')
<script src="{{asset('public/js/home_frontend.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.0/socket.io.dev.js"></script>
<script>
    setTimeout(function(){
        var html_chat='<div><span><strong>Tư vấn viên :</strong> Xin chào!! mọi thắc mắc và phản hồi xin vui lòng liên hệ email: dangduylong96@gmail.com hoặc sđt: 0988936354</span></div>';
        $('#content_chat').append(html_chat);
    }, 2000);
    var socket = io('http://localhost:3000');
    socket.on('get_chat_server',function(data){
        var html_chat='<div><span><strong>'+data.name+' :</strong> '+data.message+'</span></div>';
        $('#content_chat').append(html_chat);
    })
    $(document).ready(function(){
        $('#send').click(function(){
            $("#name_chat").attr('disabled','disabled');
            var message=$('#message').val();
            var name=$('#name_chat').val();
            socket.emit('send_chat',{message: message, name: name});
            $('#message').val('');
        })
    })
</script>
@endsection