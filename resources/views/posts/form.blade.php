<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <title>記録編集ページ</title>
</head>
<body>
     <header>
        <div class="header-all">
            <div class="header-left">
                <div class="title">
                    <h2>ZenVital Matrix</h2>
                </div>
            </div>
            <div class="header-center">
                <a href="{{route('post.home')}}" class="move">マイページ</a>
                <a href="{{route('post.index')}}" class="move">記録一覧</a>
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
        <form method="post" action="{{route('post.store')}}">
        @csrf
            @if($errors->any())
                <div class="error">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif                                   
            <div class="record">
                <div class="record-top">
                    <div class="record-left">
                        <p>本日の日付</p>
                        <input type="date" name="date" value="{{ old('date') }}" class="today">
                        
                        <p>就寝・起床時間</p>
                            <label for="bed_time_start">就寝時間：</label>
                            <input type="time" id="bed_time_start" name="bed_time_start" value="{{ old('bed_time_start') }}" />
                            <p>〜</p>
                            <label for="bed_time_end">起床時間：</label>
                            <input type="time" id="bed_time_end" name="bed_time_end" value="{{ old('bed_time_end') }}" />
                        
                        <p>体温</p>
                        <select name="body_temperature" id="" class="body_temperature">
                            <option hidden>選択してください</option>
                            @for($i=35.5; $i<=39.1; $i+=0.1)
                                <option value="{{ number_format($i, 1) }}" @if(number_format($i, 1) === number_format((float)old('body_temperature'), 1)) selected @endif>{{ number_format($i, 1) }}</option>
                            @endfor
                        </select>

                        <p>スマホ使用時間</p>
                        <select name="phone_time" id="" class="phone_time">
                            <option hidden>選択してください</option>
                            @for($i=0; $i<=300; $i+=30)
                                    <option value="{{$i}}"@if($i  === old('phone_time')) selected @endif>{{$i}}分</option>
                            @endfor
                        </select>

                    </div>
                    <div class="record-right">
                        <p>運動</p>
                        <select name="exercise_time" id="" class="exercise_time">
                            <option hidden>選択してください</option>       
                            @for($i=0; $i<=120; $i=$i+15)                  
                            <option value="{{$i}}" @if($i === (int)old('exercise_time')) selected @endif>{{$i}}分</option>
                            @endfor
                        </select>
                        <p>仕事時間</p>
                            <select name="job_time" id="" class="job_time">
                                <option hidden>選択してください</option>
                                @for($i=0; $i<=12; $i++)                  
                                <option value="{{$i}}" @if($i === (int)old('job_time')) selected @endif>{{$i}}時間</option>
                                @endfor
                            </select>
                            <p>入浴時間</p>
                            <select name="bathing_time" id="" class="bathing_time">
                                <option hidden>選択してください</option>
                                @for($i=0; $i<=60; $i++)
                                <option value="{{$i}}" @if($i === (int)old('bathing_time')) selected @endif>{{$i}}分</option>
                                @endfor
                            </select>
                        <p>今日のパフォーマンス</p>
                            <div class="performance">
                                <input type="radio" name="performance" value="⭐️" class="perform" @if("⭐️" === old('performance')) checked @endif>⭐️<br>
                                <input type="radio" name="performance" value="⭐️⭐️" class="perform" @if("⭐️⭐️" === old('performance')) checked @endif>⭐️⭐️<br>
                                <input type="radio" name="performance" value="⭐️⭐️⭐️" class="perform" @if("⭐️⭐️⭐️" === old('performance')) checked @endif>⭐️⭐️⭐️<br>
                                <input type="radio" name="performance" value="⭐️⭐️⭐️⭐️" class="perform" @if("⭐️⭐️⭐️⭐️" === old('performance')) checked @endif>⭐️⭐️⭐️⭐️<br>
                                <input type="radio" name="performance" value="⭐️⭐️⭐️⭐️⭐️" class="perform" @if("⭐️⭐️⭐️⭐️⭐️" === old('performance')) checked @endif>⭐️⭐️⭐️⭐️⭐️
                            </div>
                        </div>
                </div>
                <div class="record-bottom">
                    <input type="submit" class="finish">
                </div>
            </div>
        </form>
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





















{{-- <!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <title>記録・登録ページ</title>
</head>
<body>
     <header>
        <div class="title">
            <h3>記録登録画面</h3>
        </div>
     </header>
     <main>
        <form method="post" action="{{route('post.store')}}">
        @csrf

            <div class="record">
                <div class="record-top">
                    <div class="record-left">
                        <p>本日の日付</p>
                        <input type="date" name="date" value="{{old('date')}}" class="today">
                        <p>就寝・起床時間</p>
                        <label for="bed_time_start">就寝時間：</label>
                        <input type="time" id="bed_time_start" name="bed_time_start" value="{{ old('bed_time_start')}}" />
                        <p>〜</p>
                        <label for="bed_time_end">起床時間：</label>
                        <input type="time" id="bed_time_end" name="bed_time_end" value="{{ old('bed_time_end') }}" />
                        <p>体温</p>
                        <select name="body_temperature" id="" class="body_temperature">
                            <option hidden>選択してください</option>
                            <option value="~35.4">~35.4</option>
                            @for($i=35.5; $i<=37.0; $i+=0.1)
                                <option value="{{ $i }}">{{ number_format($i, 1) }}</option>
                            @endfor
                            <option value="37.1~">37.1~</option>
                        </select>

                        <p>スマホ使用時間</p>
                        <select name="phone_time" id="" class="phone_time">
                            <option hidden>選択してください</option>
                            @for($i=0; $i<=151; $i+=30)
                                @if($i != 181)
                                    <option value="{{$i}}~{{($i+29)}}">{{$i}}~{{($i+29)}}分</option>
                                @else
                                    <option value="{{$i}}~">{{$i}}分~</option>
                                @endif
                            @endfor
                                    <option value="180~">180分~</option>
                        
                        </select>

                    </div>
                    <div class="record-right">
                        <p>運動</p>
                        <select name="exercise_time" id="" class="exercise_time">
                            <option hidden>選択してください</option>
                            <option value="0">0分</option>          
                            @for($i=30; $i<=120; $i=$i+30)                  
                            <option value="{{$i}}">{{$i}}分</option>
                            @endfor
                            <option value="5">120分以上</option>

                        </select>
                        <p>仕事時間</p>
                            <select name="job_time" id="" class="job_time">
                                <option hidden>選択してください</option>
                                @for($i=0; $i<=10; $i++)                  
                                <option value="{{$i}}">{{$i}}時間</option>
                                @endfor
                                <option value="11">10時間~</option>
                            </select>
                        <p>入浴時間</p>
                            <select name="bathing_time" id="" class="bathing_time">
                                @for($i=0; $i<60; $i++)
                                <option value="{{$i}}">{{$i}}分</option>
                                @endfor
                            </select>
                        <p>今日のパフォーマンス</p>
                            <div class="performance">
                                <input type="radio" name="performance" value="⭐️" class="perform">⭐️<br>
                                <input type="radio" name="performance" value="⭐️⭐️" class="perform">⭐️⭐️<br>
                                <input type="radio" name="performance" value="⭐️⭐️⭐️" class="perform">⭐️⭐️⭐️<br>
                                <input type="radio" name="performance" value="⭐️⭐️⭐️⭐️" class="perform">⭐️⭐️⭐️⭐️<br>
                                <input type="radio" name="performance" value="⭐️⭐️⭐️⭐️⭐️" class="perform">⭐️⭐️⭐️⭐️⭐️
                            </div>
                        </div>
                </div>
                <div class="record-bottom">
                    <input type="submit" class="finish">
                </div>
            </div>
        </form>
     </main>
     <footer>

     </footer>
    
</body>
</html> --}}










