@extends('app')
@section('title', 'eふぁいたーっす!')

@section('head')
    {{--jQuery は下記のファイルに記述し読み込むようにする--}}
    <script src="{{ asset('/js/ajax.js') }}"></script>
    <script src="{{ asset('/js/comment.js') }}"></script>
@endsection

@section('body')
    <div class="container">
        
          <div class="row" name="main">
            <div class="col-md-10 col-md-offset-1">
                <h2><a href="{{ route('front_index') }}">eふぁいたーっす!</a></h2>
             @include('error')
            </div>
        </div>

<div class="col-md-8 text-right">
    
</div>
<br>

    

@endsection