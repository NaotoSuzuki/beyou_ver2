<?php

namespace App\Http\Controllers\Admin;

use App\models\Admin\Explanation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class ExplanationController extends Controller
{

    public function index() {
      $posts = Explanation::latest()->get();
      return view('admin.indexExplanation',compact('posts')) ;

    }

    public function show($id) {
      $post = Explanation::findOrFail($id);
      return view('admin.showExplanation',compact('post'));
    }

    public function create() {
      return view('admin.create');
    }

    public function store(Request $request) {
        // dd($request->toArray());
        try
        {
        $post = new Explanation();
        $post->title = $request->title;
        $post->genre_code = $request->genre_code;
        $post->content = $request->content;
        $post->save();
        }


        catch(\Exception $e)
        {
             $errorCode = $e->errorInfo[1];

             if($errorCode == 1062) //重複エラーをここでキャッチ
             {
               return back()->withInput()->withErrors(['genre' => "この文法の解説はすでに存在します。"]);
             }
         }
        return redirect('/admin/index_explanation');
    }

    public function edit($id) {
         $post = Explanation::findOrFail($id);
         // dd($post->toArray());
        return view('admin.edit',compact('post'));
    }

    public function update(PostRequest $request, Explanation $post, $id) {

       $post = Explanation::findOrFail($id);
       $post->fill(['genre_code' => $request->input('genre_code')]);
       $post->fill(['title' => $request->input('title')]);
       $post->fill(['content' => $request->input('content')]);
       $post->save();


      return redirect('/admin/index_explanation');
    }

    public function destroy($id) {
       $post = Explanation::findOrFail($id);
       $post->delete();
      return redirect('/admin/index_explanation')->with('flash_message', 'Post Deleted!');
    }

}
