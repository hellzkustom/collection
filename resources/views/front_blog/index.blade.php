@extends('app')
@section('title', 'eふぁいたーっす!')

@section('body')

    <div class="container">
          <div class="row" name="main">
            <div class="col-md-10 col-md-offset-1">
                <h2><a href="{{ route('front_index') }}">eふぁいたーっす!</a></h2>
                      @include('error')
            </div>
        </div>

<br>

            <div class="col-md-7 col-md-offset-1">
                {{--forelse ディレクティブを使うと、データがあるときはループし、無いときは @empty 以下を実行する--}}
                @forelse($list as $article)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{--post_date は日付ミューテタに設定してあるので、自動的に Carbon インスタンスにキャストされる--}}
                        <a href="{{ route('front_article', ['id' => $article->id]) }}">
                            <h3 class="panel-title">{{ $article->post_date->format('Y/m/d(D)') }}　{{ $article->title }}</h3>
                        </a>
                    </div>
                    <div class="panel-body">
                        
                        @include("image_view_index") 
                        
                        <div class="set_body">
                            
                            @if( optional($article->street_fighter_v)->battle_lounge)
                             <div>
                               ラウンジ試合数:{{$article->street_fighter_v->battle_lounge}}&nbsp;
                               勝利数:{{$article->street_fighter_v->battle_lounge_win}}&nbsp;
                               勝率:{{sprintf("%.3f",$article->street_fighter_v->battle_lounge_win/$article->street_fighter_v->battle_lounge)}}
                            </div>
                            <br>
                            @endif
                            @if( optional($article->street_fighter_v)->rank_match)
                            <div>
                                ランクマ試合数:{{$article->street_fighter_v->rank_match}}&nbsp;
                               勝利数:{{$article->street_fighter_v->rank_match_win}}&nbsp;
                               勝率:{{sprintf("%.3f",$article->street_fighter_v->rank_match_win/$article->street_fighter_v->rank_match)}}
                            </div>
                            <br>
                            @endif
                                @if( optional($article->street_fighter_v)->casual_match)
                            <div>
                                カジュアル試合数:{{$article->street_fighter_v->casual_match}}&nbsp;
                               勝利数:{{$article->street_fighter_v->casual_match_win}}&nbsp;
                               勝率:{{sprintf("%.3f",$article->street_fighter_v->casual_match_win/$article->street_fighter_v->casual_match)}}
                            </div>
                            <br>
                            @endif
                        
                            
                            
                            <p class="multiline-text">
                            {{--nl2br 関数で改行文字を <br> に変換する。これをエスケープせずに表示させるため {!! !!} で囲む--}}
                            {{--ただし、このまま出力するととても危険なので e 関数で htmlspecialchars 関数を通しておく--}}
                            {!! nl2br(e($article->body)) !!}
                            </p>
                        </div>
                    </div>
                    <div class="panel-footer text-right">
                                            <a href="{{ route('front_index', ['category_id' => $article->category_id]) }}">
                        {{$article->category->name}}
                    </a>
                        
                    &nbsp;&nbsp;
                    
                        {{--updated_at も日付ミューテタに設定してあるので Carbon インスタンスにキャストされる--}}
                        {{ $article->updated_at->format('Y/m/d H:i:s') }}
                    
                                           @if ($article->comment->count())
                            <span class="">
                                コメント {{ $article->comment->count() }}件
                            </span>
                        @else
                            <span class="">
                                コメントなし
                            </span>
                        @endif

                    
                    
                    </div>
                </div>
                @empty
                    <p>記事がありません</p>
                @endforelse

                {{ $list->links() }}
            </div>
            @include('front_blog.right_column')
            </div>
@endsection