<?php

namespace App\Http\Controllers\Admin;

use App\models\Admin\Option;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use DB;

class ManageOptionsController extends Controller
{

    public function index() {
      $optionsData = Option::latest()->get();
      return view('admin.options.indexOptions',compact('optionsData')) ;

    }

    public function show($id) {
      $option = Option::findOrFail($id);
      return view('admin.options.showOption',compact('option'));
    }

    public function create() {
      return view('admin.options.createOption');
    }

    public function store(Request $request) {
        // dd($request->toArray());


        $genre_value = $request->genre_value;
        $option_num = $request->option_num;
        $option_name = $request->option_name;
        $option_detail = $request->option_detail;
        $option_describe_title  = $request->option_describe_title;
        $option_describe_content = $request->option_describe_content;



        DB::table('options')->insert([
                [
                "genre_value"=>$genre_value,
                "option_num"=>$option_num,
                "option_name"=>$option_name,
                "option_detail"=>$option_detail,
                "option_describe_title"=>$option_describe_title,
                "option_describe_content"=>$option_describe_content
                ]
        ]);

        return redirect('/admin/manage_options');
    }

    public function edit($id) {
         $option = Option::findOrFail($id);
         // dd($post->toArray());
        return view('admin.options.editOption',compact('option'));
    }

    public function update(Request $request) {
        $id = $request->id;
        $genre_value = $request->genre_value;
        $option_num = $request->option_num;
        $option_name = $request->option_name;
        $option_detail = $request->option_detail;
        $option_describe_title  = $request->option_describe_title;
        $option_describe_content = $request->option_describe_content;

        $update =[
            "genre_value"=>$genre_value,
            "option_num"=>$option_num,
            "option_name"=>$option_name,
            "option_detail"=>$option_detail,
            "option_describe_title"=>$option_describe_title,
            "option_describe_content"=>$option_describe_content,
        ];

        DB::table('options')
                ->where('id',$id)
                ->update($update);


      return redirect('/admin/manage_options');
    }

    public function destroy($id) {
       $post = Option::findOrFail($id);
       $post->delete();
      return redirect('/admin/manage_options')->with('flash_message', 'Post Deleted!');
    }

}
