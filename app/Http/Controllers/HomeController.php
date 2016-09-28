<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }
    */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$posts = DB::select('select * from posts ORDER BY create_at DESC')

        if (!empty($request->author_id)) {
            $email = DB::table('users')->where('id', $request->author_id)->first()->email;
            $posts = DB::table('posts')->where('email', $email)->orderBy('create_at', 'desc')->paginate(5);
        }
        else {
            $posts = DB::table('posts')->orderBy('create_at', 'desc')->paginate(5);
        }
        return view('home', ['posts' => $posts]);
    }
    public function hello() {
        return "hello";
    }
}
