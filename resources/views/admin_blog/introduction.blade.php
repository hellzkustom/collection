@extends('admin_blog.app')
@section('title','自己紹介編集')
@section('body')
    <h2>自己紹介編集</h2>

    @if(session('message'))
        <div class="alert alert-success">
        
        {{session('message')}}
        
        </div>
    @endif
    
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form method="POST" action="{{route('admin_introduction_edit',['id' => 1])}}">

    name<br>
    <input class="form_control" name="name" value="{{isset($input['name']) ? $input['name'] : null}}" placeholder="nameを入力して下さい。"><br><br>

    comment<br>
    <textarea class="form_control" cols="50" rows="15" name="comment" placeholder="commnetを入力してください。">{{isset($input['comment']) ? $input['comment']: null}}</textarea><br><br>

        <br><br>
    <input type="submit" value="送信">
    {{--article_id があるか無いかで新規作成か既存編集かを区別する--}}

    {{--CSRFトークンが生成される--}}
    {{ csrf_field() }}
</form>
                    <br><a href="{{ route('admin_list') }}">リストに戻る</a><br><br>

@endsection

