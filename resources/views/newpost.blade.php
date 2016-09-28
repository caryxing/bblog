@extends('layouts.app')

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

@section('content')
<body>

<div class="content">
	 <div class="container">
		 <div class="content-grids" style="padding-bottom: 60px">
			 <div class="col-md-8 content-main">
				 <div class="content-grid">
					 <div class="content-grid-head">
						 <h3>New Post</h3>
						 <div class="clearfix"></div>
					 </div>
					 <div class="content-grid-single">
                         <div class="content-form" style="margin-top: 0px">
                         @if (!empty($error))
                             <span class="help-block">
                                 <strong>{{ $error }}</strong>
                             </span>
                         @endif

                         <form method="POST" action="newpost">
                             {{ csrf_field() }}

                             <input type="text" placeholder="Title" name="title" value="@if (!empty($title)) {{ $title }} @endif" />
                             <textarea name="content" placeholder="Write something here..." style="height: 260px;">@if (!empty($content)) {{ $content }} @endif</textarea>
                             <input type="submit" value="POST"/>
                         </form>
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
