<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'bed_time_start',
        'bed_time_end',
        'body_temperature',
        'phone_time',
        'exercise_time',
        'job_time',
        'bathing_time',
        'performance',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    //就寝時間と起床時間の差分で睡眠時間を計算する。
    public function getSleepDurationAttribute(){
        $bedTimeStart = Carbon::createFromFormat('H:i:s', $this->bed_time_start);
        $bedTimeEnd = Carbon::createFromFormat('H:i:s', $this->bed_time_end);

        // 日付を跨いでいる場合、$bedTimeEndを翌日に設定
        if ($bedTimeStart->greaterThan($bedTimeEnd)) {
            $bedTimeEnd->addDay();
        }

        // 睡眠時間を求める
        return $bedTimeEnd->diffInMinutes($bedTimeStart);
        

    }
}
    

