<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class TestController extends Controller
{
    public function index(Request $request){
        $url = $request->url();
        echo '<br>URI: '.$url;
        echo "<br>Test Controller.";
    }
    public function insert(Request $request){
        $password = Hash::make('123');
        echo $password.'<br/>';
        echo Hash::check('123', $password);
        
        #DB::insert('insert into users (username, email, password) values(?,?,?)',["test2", "ads1@asd.com", $password]);

        echo "Record inserted successfully.<br/>";
    }
    //
}
