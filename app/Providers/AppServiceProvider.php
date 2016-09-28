<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $recent_posts = DB::table('posts')->orderBy('create_at', 'desc')->limit(4)->get();
        $recent_comments = DB::table('comments')->orderBy('create_at', 'desc')->limit(5)->get();
        View::share('recent_posts', $recent_posts);
        View::share('recent_comments', $recent_comments);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
