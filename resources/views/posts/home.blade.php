<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/post.css') }}">
    <title>マイページ</title>
</head>
<body>
    <header>
        <div class="header-all">
            <div class="header-left">
                <div class="logo">
                </div>
                <div class="title">
                    <h2>ZenVital Matrix</h2>
                </div>
            </div>
            <div class="header-center">
                <a href="{{route('post.form')}}" class="move">新規登録</a>
                <a href="{{route('post.index')}}" class="move">記録一覧</a>
            </div>
            <div class="header-right">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="moves">ログアウト</button>
                    {{-- スマホ画面時の三本マーク --}}
                    <div class="header">
                        <!-- ヘッダーロゴ -->
                        <div class="logo"></div>
                      
                        <!-- ハンバーガーメニュー部分 -->
                        <div class="nav">
                      
                          <!-- ハンバーガーメニューの表示・非表示を切り替えるチェックボックス -->
                          <input id="drawer_input" class="drawer_hidden" type="checkbox">
                      
                          <!-- ハンバーガーアイコン -->
                          <label for="drawer_input" class="drawer_open"><span></span></label>
                      
                          <!-- メニュー -->
                          <nav class="nav_content">

                            <ul class="nav_list">
                              <li class="nav_item"><a href="{{route('post.form')}}">新規登録</a></li>
                              <li class="nav_item"><a href="{{route('post.index')}}">一覧画面</a></li>
                              <li class="nav_item"><a href="{{ route('logout') }}">ログアウト</a></li>
                            </ul>
                          </nav>
                     
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </header>
    <main>
        <div class="contents-room">
            <div class="contents-left">
                <div class="topic">
                    <div class="content">
                        <h3>パフォーマンス</h3>
                        <p>⭐️ or ⭐️⭐️</p>
                    </div>
                    <div class="contents">
                        {{-- //睡眠時間を時間＋分単位に変換する --}}
                        @php
                        $sleepMinutes = $post1->avg('sleep_duration');
                        $hours = intdiv($sleepMinutes, 60);
                        $minutes = $sleepMinutes % 60;
                        @endphp
                        <h3>睡眠時間：{{ $hours }}時間{{ $minutes }}分</h3>
                        <h3>体温：{{ round($post1->avg('body_temperature'), 2) }}℃</h3>
                        <h3>スマホ使用：{{ round($post1->avg('phone_time'), 1) }}分</h3>
                    </div>
                    <div class="contents">
                        <h3>運動：{{ round($post1->avg('exercise_time'), 1) }}分</h3>
                        <h3>仕事：{{ round($post1->avg('job_time'), 1) }}時間</h3>
                        <h3>入浴：{{ round($post1->avg('bathing_time'), 1) }}分</h3>
                    </div>
                </div>
                <div class="topic">
                    <div class="content">
                        <h3>パフォーマンス</h3>
                        <p>⭐️⭐️⭐️ or ⭐️⭐️⭐️⭐️ </p>
                    </div>
                    <div class="contents">
                        {{-- //睡眠時間を時間＋分単位に変換する --}}
                        @php
                        $sleepMinutes = $post2->avg('sleep_duration');
                        $hours = intdiv($sleepMinutes, 60);
                        $minutes = $sleepMinutes % 60;
                        @endphp
                        <h3>睡眠時間：{{ $hours }}時間{{ $minutes }}分</h3>
                        <h3>体温：{{ round($post2->avg('body_temperature'), 2) }}℃</h3>
                        <h3>スマホ使用：{{ round($post2->avg('phone_time'), 1) }}分</h3>
                    </div>
                    <div class="contents">
                        <h3>運動：{{ round($post2->avg('exercise_time'), 1) }}分</h3>
                        <h3>仕事：{{ round($post2->avg('job_time'), 1) }}時間</h3>
                        <h3>入浴：{{ round($post2->avg('bathing_time'), 1) }}分</h3>
                    </div>
                </div>
                <div class="topic">
                    <div class="content">
                        <h3>パフォーマンス</h3>
                        <p>⭐️⭐️⭐️⭐️⭐️</p>
                    </div>
                    <div class="contents">
                        {{-- //睡眠時間を時間＋分単位に変換する --}}
                        @php
                        $sleepMinutes = $post3->avg('sleep_duration');
                        $hours = intdiv($sleepMinutes, 60);
                        $minutes = $sleepMinutes % 60;
                        @endphp
                        <h3>睡眠時間：{{ $hours }}時間{{ $minutes }}分</h3>
                        <h3>体温：{{ round($post3->avg('body_temperature'), 2) }}℃</h3>
                        <h3>スマホ使用：{{ round($post3->avg('phone_time'), 1) }}分</h3>
                    </div>
                    <div class="contents">
                        <h3>運動：{{ round($post3->avg('exercise_time'), 1) }}分</h3>
                        <h3>仕事：{{ round($post3->avg('job_time'), 1) }}時間</h3>
                        <h3>入浴：{{ round($post3->avg('bathing_time'), 1) }}分</h3>
                    </div>
                </div>
            </div>
            <div class="contents-right">
                <div class="result-top">
                    <h3>ルール説明</h3>
                    <h4>1. データの正確な記録</h4>
                    <p>毎日、就寝時間、体温、スマホ使用時間、入浴時間、運動時間、仕事時間、パフォーマンス（5段階評価）をなるべく正確に記録してください。</p>
                    <h4>2. 日々の記録の重要性</h4>
                    <p>あなたの健康とパフォーマンスの向上のために、毎日の記録が重要です。正直なデータが結果をより精度良く反映します。</p>
                    <h4>3. 平均値の利用</h4>
                    <p>ホーム画面に表示される平均値は、あなたの日々のパフォーマンスの傾向を理解するための有用なツールです。積極的に確認し、改善へのアイデアを得てください。</p>
                    <h4>4. 記録一覧について</h4>
                    <p>入力されたデータは、記録一覧画面に記載しております。また、記載内容の編集・削除は可能です。</p>
                    <h4>5. データの継続的な記録</h4>
                    <p>最良の結果を得るために、継続的なデータの記録をお勧めします。週ごとや月ごとの振り返りも有用です。</p>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="footer-text">
            <div class="footer-left"><p>ZenVital Matrix</p></div>
            <div class="footer-center"><a href="{{ route('post.explain') }}">利用規約</a></div>
            <div class="footer-right"></div>
        </div>
    </footer>
    
</body>
</html>

