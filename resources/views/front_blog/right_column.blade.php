{{--右カラム--}}
<div class="col-md-3">
        <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">自己紹介</h3>
        </div>
        <div class="list-group">
            <li class="list-group-item">
                <div>name:{{$introduction['name']}}</div>
                <div>comment:{{$introduction['comment']}}</div>
</li>
                
            
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">カテゴリー</h3>
        </div>
        <div class="panel-body">
            <ul class="category_archive">
                @forelse($category_list as $category)
                    <li>
                        <a href="{{ route('front_index', ['category_id' => $category->id,]) }}">
                            {{ $category->name }}
                        </a>            
                    </li>
                @empty
                    <p>カテゴリーがありません</p>
                @endforelse
            </ul>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">月別アーカイブ</h3>
        </div>
        <div class="panel-body">
            <ul class="monthly_archive">
                @forelse($month_list as $value)
                    <li>
                        <a href="{{ route('front_index', ['year' => $value->year, 'month' => $value->month]) }}">
                            {{ $value->year_month }}
                        </a>
                    </li>
                @empty
                    <p>記事がありません</p>
                @endforelse
            </ul>
        </div>
    </div>
</div>