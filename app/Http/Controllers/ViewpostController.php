<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

use App\Http\Requests;

class ViewpostController extends Controller
{
    public function render(Request $request, $post_id) {
        $post = DB::table('posts')->where('post_id', $post_id)->first();
        $data["content"] = $post->content;
        $data["title"] = $post->title;
        $data["author"] = $post->author;
        $data["create_at"] = $post->create_at;
        $data["post_email"] = $post->email;
        $data["post_id"] = $post_id;
        $data["comments"] = DB::table('comments')->where('post_id', $post_id)->orderBy('create_at', 'desc')->paginate(5);
        
        return view("viewpost", $data);
    }
    public function comment(Request $request, $post_id) {
        if (Auth::guest()) {
            return view("errors.invaliduser");
        }
        $author = Auth::user()->name;
        $email = Auth::user()->email;
        $content = $request -> comment_content;

        if (strlen($content) < 1) {
            return $this->render($request, $post_id);
            // TODO: Present Error. return view("newpost", ["error"=>'Error: Content cannot be empty', "title"=>$title]);
        }
        DB::insert('insert into comments (post_id, author, content, create_at, email) values(?, ?,?, now(), ?)',[$post_id, $author, $content, $email]);
        return redirect('/viewpost/'.$post_id);
    }

    public function delcomment(Request $request, $post_id, $comment_id) {
        if (Auth::guest()) {
            return view("errors.invaliduser");
        }
        $email = Auth::user()->email;

        DB::table('comments')->where('comment_id', $comment_id)->where('email', $email)->delete();
        return redirect('/viewpost/'.$post_id);
    }

    public function delete(Request $request, $post_id) {
        if (Auth::guest()) {
            return view("errors.invaliduser");
        }
        $email = Auth::user()->email;

        $num_post = DB::table('posts')->where('post_id', $post_id)->where('email', $email)->delete();
        if ($num_post > 0) {
            DB::table('comments')->where('post_id', $post_id)->delete();
        }
        return redirect('/home');
    }

}
