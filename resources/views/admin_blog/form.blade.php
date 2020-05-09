@extends('admin_blog.app')
@section('title','ブログ記事投稿フォーム')
@section('body')
    <h2>ブログ記事投稿・編集</h2>

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
    
    <form method="POST" action="{{route('admin_post')}}">
    日付<br>
    <input class="form_control"  type="date" name="post_date" size="20" value="{{isset($input['post_date']) ? $input['post_date']:null}}" placeholder="日付を入力して下さい。"><br><br>

    タイトル<br>
    <input class="form_control" name="title" value="{{isset($input['title']) ? $input['title'] : null}}" placeholder="タイトルを入力して下さい。"><br><br>

    本文<br>
    <textarea class="form_control" cols="50" rows="15" name="body" placeholder="本文を入力してください。">{{isset($input['body']) ? $input['body'] : null}}</textarea><br><br>
    カテゴリー <br>
        <select class="form_control" name="category_id">
                          <option value="0" selected>カテゴリー選択してください</option>
    
        @if(isset($input['category_id']))
           @foreach($category_list as $category_list)
               @if($input['category_id']==$category_list['id'])
                  <option value="{{$category_list['id']}}" selected>{{$category_list['name']}}</option>
	           @else
                  <option value="{{$category_list['id']}}">{{$category_list['name']}}</option>
              @endif	           
	           
	       @endforeach 
        @else
           @foreach($category_list as $category_list)
	               <option value="{{(int)$category_list['id']}}">{{$category_list['name']}}</option>
	       @endforeach
        @endif
        </select>

        <br><br>
    <input type="submit" value="送信">
    {{--article_id があるか無いかで新規作成か既存編集かを区別する--}}
    <input type="hidden" name="id" value="{{ $id }}">
    {{--CSRFトークンが生成される--}}
    {{ csrf_field() }}
</form>
            @if (isset($id))
                <br>
                <form action="{{ route('admin_delete') }}" method="POST">
                    <input type="submit" class="btn btn-primary btn-sm" value="削除">
                    <input type="hidden" name="id" value="{{ $id }}">
                    {{ csrf_field() }}
                </form>
            @endif
                    <br><a href="{{ route('admin_list') }}">リストに戻る</a><br><br>

@endsection

