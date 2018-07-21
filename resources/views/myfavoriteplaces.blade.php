@extends("general")

@section("content")

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
                     My favorite places
                  </h1>
               </div>
            </div>
         </div>
      </div>
      <div class="page-content">
         <div class="container">
         	@if (count($places) > 0)
         		@foreach ($places as $key => $place)
		            <div style="border-bottom: 1px solid; margin-bottom: 30px" class="col-md-12 full-width">
		            	<a href="/location/{{$place->slug}}/">
		            		<h2>{{$place->title}}</h2>
		            		<p style="margin-bottom: 0px">
		            			{{$place->description}}
		            		</p>
		            	</a>
		            	<a href="/location/{{$place->slug}}/">More details...</a>
		            </div>
		        @endforeach
		      @else 
   		    	<div class="col-md-3 full-width"></div>
      		    	<div class="col-md-6 full-width">
   		            Your favorite places list is empty
   		         </div>
		         <div class="col-md-3 full-width"></div>
		      @endif
         </div>
      </div>
   	</div>
 </div>
@endsection