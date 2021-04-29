@extends('app')
@section('title',' Map')

@section('head')
    {{--jQuery は下記のファイルに記述し読み込むようにする--}}

    <script src="{{asset('/js/map.js')}}"></script>    

@endsection

@section('body')
    <div class="container">
        <div class="row" name="main">
            <div class="col-md-10 col-md-offset-1">
                <h2>Map</h2>
                @include('admin_blog.map_main')
         <input type="hidden" id="name"></input>
                <input type="hidden" id="data"></input>
        </div>
    </div>
@endsection