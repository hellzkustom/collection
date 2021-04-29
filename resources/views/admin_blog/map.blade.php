@extends('app')
@section('title',' Map編集')

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
                
                <button id="clear" class="btn btn-primary">クリア</button>
                <button id="back" class="btn btn-primary">戻る</button>
                <br>
                <br>
                <input type="text" id="name"></input>
                <input type="hidden" id="data"></input>

                <button id="memo" class="btn btn-primary">保存</button>
                <br>
                <br>                
                <button id="delete" class="btn btn-danger btn-sm">削除</button>
        
            </div>
        </div>
    </div>
@endsection
