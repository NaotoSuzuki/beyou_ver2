<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Http\Controllers\Controller;
use App\models\Contact;
use Illuminate\Support\Facades\Auth;

//いろいろと変数を一致點せなkればいけない。コードをトレースし直して、変数やデータ型を訂正していく。

class ContactsController extends Controller
{

    private static function getUserId(){
        $user_data = Auth::user();
        $user_id = $user_data -> id;
        return $user_id;
    }


    private static function getUserName(){
        $user_data = Auth::user();
        $user_name = $user_data -> name;
        return $user_name;
    }


    public function index()
    {
        $inquiry = Contact::$inquiry;
        $user_id = ContactsController::getUserId();
        $user_name = ContactsController::getUserName();

        return view('contacts.index', compact('inquiry','user_id','user_name'));
    }

    public function confirm(ContactRequest $request)
    {
        $user_id = ContactsController::getUserId();
        $user_name = ContactsController::getUserName();
        $contact = new Contact($request->all());


        return view('contacts.confirm', compact('contact','user_id','user_name'));
    }



    public function complete(ContactRequest $request)
    {
        $input = $request->except('action');

        if ($request->action === '戻る') {
            return redirect()->action('ContactsController@index')->withInput($input);
        }

        // データを保存
        Contact::create($request->all());

        // 二重送信防止
        $request->session()->regenerateToken();
        
        $user_id = ContactsController::getUserId();
        $user_name = ContactsController::getUserName();


       // 受信メール
       \Mail::send(new \App\Mail\Contact([
           'to' => 'crappy.naoto@gmail.com',
           'to_name' => 'beyou',
           'subject' => 'Beyouからのお問い合わせ',
           'from' => $request->email,
           'from_name' => 'beyou_user様',
           'inquiry' => $request->inquiry,


       ],  ));

        return view('contacts.complete',compact('user_id','user_name'));
    }

}
