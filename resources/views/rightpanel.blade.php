             <div class="col-md-4 content-main-right">
                 <div class="search">
                     <h3>SEARCH</h3>
                     <form method="GET" action="/home">
                         <input name="search_text" type="text" value="" onfocus="this.value=''">
                         <input type="submit" value="">
                     </form>
                 </div>

                 <!--<div class="search">
                       <h3>The Bright Blog</h3>
                 </div> -->
                 <div class="categories">
                     <h3>RECENT POSTS</h3>
                     @foreach ($recent_posts as $recent_post)
                       <li class="active"><a href="/viewpost/{{$recent_post->post_id}}">{{$recent_post->title}}</a></li>
                     @endforeach
                 </div>
                 <div class="archives">
                     <h3>RECENT COMMENTS</h3>
                     @foreach ($recent_comments as $recent_comment)
                       <li class="active"><a href="/viewpost/{{$recent_comment->post_id}}">{{substr($recent_comment->content, 0, 20)}}</a></li>
                     @endforeach
                 </div>
             </div>
             <div class="clearfix"></div>
