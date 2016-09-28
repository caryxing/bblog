<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use DB;

class NewpostController extends Controller
{
    public function newpost(Request $request){
        if (Auth::guest()) {
            return view("errors.invaliduser");
        }
        return view("newpost");
    }
    public function putpost(Request $request){
        if (Auth::guest()) {
            return view("errors.invaliduser");
        }
        $title = $request -> title;
        $author = Auth::user()->name;
        $email = Auth::user()->email;
        $content = $request -> content;
        
        if (strlen($title) < 1) {
            return view("newpost", ["error"=>'Error: Title cannot be empty', "content"=>$content]);
        }
        if (strlen($content) < 1) {
            return view("newpost", ["error"=>'Error: Content cannot be empty', "title"=>$title]);
        }
        DB::insert('insert into posts (title, author, content, create_at, email) values(?,?,?, now(), ?)',[$title, $author, $content, $email]);
        return view("message", ["message"=>"Successfully Posted!"]);
    }
}
