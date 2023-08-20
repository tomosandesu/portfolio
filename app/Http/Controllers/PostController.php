<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
   // ホーム画面へパフォーマンス値に応じて、クラス分けしたデータを渡す
   public function home(){
    $post1 = Post::where('user_id',auth()->id())->whereIn('performance',['⭐️', '⭐️⭐️'] )->get();
    $post2 = Post::where('user_id',auth()->id())->whereIn('performance',['⭐️⭐️⭐️', '⭐️⭐️⭐️⭐️'] )->get();
    $post3 = Post::where('user_id',auth()->id())->where('performance','⭐️⭐️⭐️⭐️⭐️')->get();
    return view('posts.home', compact('post1', 'post2', 'post3'));
   }
   public function form(){
      return view('posts.form');
   }
   public function store(Request $request){
      $validated = $request->validate([
         'date' => 'required| unique:posts',
         'bed_time_start' => 'required',
         'bed_time_end'=>'required',
         'body_temperature'=>'required',
         'phone_time'=>'required',
         'exercise_time'=>'required',
         'job_time'=>'required',
         'bathing_time'=>'required',
         'performance'=>'required'
      ]);
      $validated['user_id'] = auth()->id();
      $post = Post::create($validated);
      $request->session()->flash('message', '保存しました');
      return redirect()->route('post.index');
   
   }
   public function index(){
      $posts = Post::where('user_id', auth()->id())->orderBy('date', 'desc')->paginate(10);
      return view('posts.index', compact('posts'));
   }
   public function edit(Post $post){
      return view('posts.edit', compact('post'));
   }
   public function update(Request $request, Post $post){
      $post->update($request->all());
      $request->session()->flash('message', '保存しました');
      return redirect()->route('post.index');
   
   }
   public function destroy(Post $post){
      $post->delete();
      return redirect()->route('post.index');
   }
   public function explain(){
      return view('posts.explain');
   }



}
