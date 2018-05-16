@extends('frontend.layout.layout')
@section('header')
@include('frontend.partials.header_chat',['a'=>3]);
@endsection
@section('content')
<div class="container chat_layout">
    <div class="chat col-md-6">
        <div>
            <span><strong>Long :</strong> Hello</span>
        </div>
        <div>
            <span><strong>Long :</strong> Hello</span>
        </div>
        <div>
            <span><strong>Long :</strong> Hello</span>
        </div>
    </div>
    <div class="form_chat col-md-push-1 col-md-4">
        <form class="form-horizontal" action="/action_page.php">
            <div class="form-group">
                <label for="usr">Name:</label>
                <input type="text" class="form-control" id="usr">
            </div>
            <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea class="form-control" rows="5" id="comment"></textarea>
            </div>
            <div class="form-group"> 
                <button type="submit" class="btn btn-danger">Gửi</button>
            </div>
        </form>
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
    .form_chat:{
    }
</style>
@endsection

@section('js')
<script src="{{asset('public/js/home_frontend.js')}}"></script>
<script>

</script>
@endsection