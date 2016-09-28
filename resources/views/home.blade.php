@extends('layouts.app')

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE HTML>
<html>
<head>
	<link href="/css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="/css/style.css" rel='stylesheet' type='text/css' />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript" src="js/easing.js"></script>

</head>

@section('content')
<body>

<div class="content">
	 <div class="container">
		 <div class="content-grids">
			 <div class="col-md-8 content-main">
                 @foreach ($posts as $post)
				 <div class="content-grid-sec">
					 <div class="content-sec-info">
                             <h3><a href="/viewpost/{{ $post->post_id }}">{{ $post->title }}</a></h3>
                             <h4>{{ $post->create_at }}, Posted by : <a href="#">{{ $post->author }}</a></h4>
                         <p>{{ substr($post->content, 0, 400) }}...</p>
						 <a class="bttn" href="/viewpost/{{ $post->post_id }}">MORE</a>
					</div>
				 </div>
				 @endforeach

				 <div class="pages">
                         {{ $posts->links() }}
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
<!---->

</body>
</html>

@endsection
