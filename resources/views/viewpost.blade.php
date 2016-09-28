@extends('layouts.app')

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

@section('content')
<body>
    <div class="content" style="min-height: 700px">
	<div class="container">
	    <div class="content-grids">
		<div class="col-md-8 content-main">
		    <div class="content-grid">

			<div class="content-grid-head">
			    <h3>Full Text Reading</h3>
                            <h4>{{$create_at}}, Posted by: <a href="#">{{$author}}</a></h4>
			    <div class="clearfix"></div>
			</div>

			<div class="content-grid-single">
                            <h3>{{ $title }}</h3>
                            <p style = "white-space: pre-line">{{ $content }}</p>
                            @if (!Auth::guest() && $post_email == Auth::user()->email)
                                <script type="text/javascript">
                                 function confirm_delete() {
                                     return confirm('Sure to delete?');
                                 }
                                </script>
                                <a href="/deletepost/{{$post_id}}" onClick="return confirm_delete()" class="btn btn-danger" style="float: right;">delete</a>
                            @endif

			    <div class="content-form">
				<h3>Leave a comment</h3>
                                @if (Auth::guest())
                                    <p>( Click <a href="{{ url('/login') }}">here</a> to login first ).</p>
                                @else
                                    <form method="POST">
                                        {{ csrf_field() }}
					<textarea name="comment_content" placeholder="Message"></textarea>
					<input type="submit" value="SEND"/>
				    </form>
                                @endif
			    </div>
                            
			    <div class="comments">
				<h3>Comment</h3>
                                @foreach ($comments as $comment)
				    <div class="comment-grid">
					<div class="comment-info">
                                            <h4>{{$comment->author}}</h4>
                                            <p style = "white-space: pre-line">{{$comment->content}}</p>
                                            <h5>On {{$comment->create_at}}</h5>
                                            @if (!Auth::guest() && $comment->email == Auth::user()->email)
						<a href="/deletecomment/{{$post_id}}/{{$comment->comment_id}}">Delete</a>
                                            @endif
					    <!-- <a href="#">Reply</a> -->
					</div>
					<div class="clearfix"></div>
				    </div>
                                @endforeach
                                <div class="pages ">
                                    {{ $comments->links() }}
                                </div>
			    </div>
			</div>
		    </div>			 			 
		</div>
		@include('rightpanel')

	    </div>
	</div>
    </div>

    <div class="copywrite">
	<div class="container">
	    <p>| Template by <a href="http://w3layouts.com/">W3layouts</a></p>
        </div>
    </div>
</body>
@endsection
