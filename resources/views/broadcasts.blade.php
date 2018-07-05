@extends("general")

@section("content")
  <!-- Font Awesome Icon Library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/css/rating.css">
  <style>
    .checked {
        color: orange;
    }
  </style>

  <div id="sitecontainer">
  	<div class="no-sections has-image no-tags page-content-wrapper title-white dark-section post-111 location type-location status-publish has-post-thumbnail hentry">
      <div class="image-title-bg loading" style="padding-top: 90px;">
         <div class="load-background-image fade-in" style="background-image: url(https://parposa.com/iflylebanon/wp-content/uploads/2018/05/afqa_roman__bridges_from_below_by_alanove-d9ub7sp-1.jpg)">
            <img src="./Afqa Waterfall - I Fly Lebanon_files/afqa_roman__bridges_from_below_by_alanove-d9ub7sp-1.jpg" class="zero-opacity" onload="jQuery(this).parent().addClass(&#39;fade-in&#39;);">
         </div>
         <div class="overlay"></div>
         <div class="container">
            <div class="col-md-10 title-container col-md-offset-1 text-center">
               <div class="categories badges">
                  <div class="clear"></div>
               </div>
               <div class="title">
                  <h1>
                     Live broadcasts
                  </h1>
               </div>
            </div>
         </div>
      </div>
      <div class="page-content">
         <div class="container">
         	@foreach ($broadcasts as $key => $broadcast)
	            <div style="margin-bottom: 20px" class="col-md-6 full-width">
	            	<div class="col-md-6 regular-width">
	            		<iframe 
		            		width="210" 
		            		height="172" 
		            		src="https://www.youtube.com/embed/{{$broadcast->id}}?controls=1&fs=1" 
		            		allowfullscreen="allowfullscreen"
					        mozallowfullscreen="mozallowfullscreen" 
					        msallowfullscreen="msallowfullscreen" 
					        oallowfullscreen="oallowfullscreen" 
					        webkitallowfullscreen="webkitallowfullscreen">
					    </iframe>
	            	</div>
	            	<div class="col-md-6 full-width">
	            		<div class="intro">
		                  	<h2 style="margin-bottom: 0px">
		                     	{{$broadcast->snippet->title}}
		                  	</h2>
		                  	<p>
		                  		{{$broadcast->snippet->publishedAt}}
		                  	</p>
		                  	<p>
		                  		{{$broadcast->snippet->description}}
		                  	</p>
		               	</div>
	            	</div>
	            </div>
	        @endforeach
         </div>
      </div>
   </div>

  </div>


@endsection