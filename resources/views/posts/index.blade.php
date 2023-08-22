<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <title>一覧画面</title>
</head>
<body>
    <header>
        <div class="header-all">
            <div class="header-left">
                <div class="logo">
                </div>
                <div class="title">
                    <h1>ZenVital Matrix</h1>
                </div>
            </div>
            <div class="header-center">
                <a href="{{route('post.form')}}" class="move">新規記録</a>
                <a href="{{route('post.home')}}" class="move">マイページ</a>
            </div>
            <div class="header-right">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="moves">ログアウト</button>
                </form>
            </div>
        </div>
    </header>
    <main>
        @if(session('message'))
            <div class="text-red-600 font-bold">
                {{ session('message') }}
            </div>
        @endif
        @foreach($posts as $post)
        <div class="contains">
            <div class="contains-top">
                <div class="contains-top-left">
                    <p>{{$post->date}}</p>
                    <h3>パフォーマンス : {{$post->performance}}</h3>
                </div>
                <div class="contains-top-right">
                    <a href="{{ route('post.edit', $post) }}" class="edit">編集</a>
                    <form method="post" action="{{ route('post.destroy', $post) }}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="delete">
                            削除
                        </button>
                    </form>
                </div>
            </div>          
            {{-- 記録詳細内容記載 --}}
            <div class="contains-center">
                <h4>就寝時間： {{date('H:i', strtotime($post->bed_time_start)) }}</h4>
                <h4>起床時間： {{date('H:i', strtotime($post->bed_time_end)) }}</h4>
                <h4>体温 : {{ $post->body_temperature }}℃</h4>
                <h4>スマホ使用時間 : {{ $post->phone_time }}分</h4>
                <h4>運動 : {{ $post->exercise_time }}分</h4>
                <h4>仕事 : {{ $post->job_time }}時間</h4>
                <h4>入浴時間 : {{ $post->bathing_time }}分</h4>
            </div>
            <div class="contains-bottom">
                <p>{{ $post->created_at }}</p>
            </div>
        </div>
        @endforeach
    </main>
    <footer>
       <div class="paginate">
         <p>
            {{$posts->links()}}
        </p>
        </div>
    </footer>
</body>
</html>