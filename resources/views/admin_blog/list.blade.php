@extends('app')
@section('title','ブログ記事一覧')
@section('body')
    <div class="container">
        <div class="row" name="main">
            <div class="col-md-10 col-md-offset-1">
                <h2>ブログ記事一覧</h2>

                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    <br>
                @endif
                <div class="col-md-12">
                <a href="{{ route('admin_form') }}">
                    <span class="btn btn-primary btn-sm">新規記事</span>
                </a>
                
                                <a href="{{ route('admin_category') }}">
                    <span class="btn btn-primary btn-sm">カテゴリ編集</span>
                </a>
   
                  </a>
                                <a href="{{ route('admin_introduction') }}">
                    <span class="btn btn-primary btn-sm">自己紹介編集</span>
                </a>
                   </a>

                    <br><br>
                    <a href="{{ route('admin_map_view') }}">
                    <span class="btn btn-primary btn-sm">Map</span>
                </a>

                                <a href="{{ route('admin_map') }}">
                    <span class="btn btn-primary btn-sm">Map編集</span>
                </a>
                
                <br>

                @if (count($list) > 0)
                <br>
                    {{--links メソッドでページングが生成される。しかも生成されるHTMLは Bootstrap と互換性がある--}}
                    {{ $list->links() }}
                    <table class="table table-striped">
                        <tr>
                            
                            <th width="120px">日付</th>
                            <th>タイトル</th>
                        </tr>

                        {{--このまま foreach ループにかけることができる--}}
                        @foreach ($list as $article)
                            <tr>
                                
                                <td>{{ $article->post_date_text }}</td>
                                <td>
                                    <a href="{{ route('admin_form', ['id' => $article->id]) }}">
                                        {{ $article->title }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <br>
                    <p>記事がありません。</p>
                @endif
                
                <br><a href="{{ route('front_index') }}">トップに戻る</a><br><br>

            </div>
        </div>
    </div>
@endsection