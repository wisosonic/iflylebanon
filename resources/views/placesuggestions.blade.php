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
                     Places you may like
                  </h1>
                  <div style="padding: 0px" class="col-md-12 full-width"">
                    <form action="" method="POST" id="tagsearch_form">
                      {{ csrf_field() }}
                      <input type="hidden" id="tagsearch" name="tagsearch">
                    </form>
                    <div style="text-align:center; margin-bottom: 0px" class="sharing badges section-buttons v-item">
                      @foreach ($tags as $key => $tag)
                        <a style="opacity: 1; color: white" onclick="tagSearch('{{$tag}}'); return false;" href="#"  class="location-actions popup-with-move-anim">
                          <span class="sharetitle">#{{$tag}}</span>
                        </a>
                      @endforeach
                    </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="page-content">
         <div class="container">
         	@if (count($places) > 0)
         		@foreach ($places as $key => $place)
		            <div style="border-bottom: 1px solid; margin-bottom: 30px" class="col-md-12 full-width">
   		            <div style="margin-bottom: 30px" class="col-md-4 full-width">
                        <img src="{{$place->image}}">
                     </div>
                     <div style="margin-bottom: 30px" class="col-md-8 full-width">
                        <a href="/location/{{$place->slug}}/">
   		            		<h2>{{$place->title}}</h2>
   		            		<p style="margin-bottom: 0px">
   		            			{{$place->description}}
   		            		</p>
   		            	</a>
                        <div style="padding: 0px" class="col-md-12 full-width"">
                          <form action="" method="POST" id="tagsearch_form">
                            {{ csrf_field() }}
                            <input type="hidden" id="tagsearch" name="tagsearch">
                          </form>
                          <div style="text-align:left; margin-bottom: 0px" class="sharing badges section-buttons v-item">
                            @foreach ($place->tags as $key => $tag)
                              <a onclick="tagSearch('{{$tag}}'); return false;" href="#"  class="location-actions popup-with-move-anim">
                                <span class="sharetitle">#{{$tag}}</span>
                              </a>
                            @endforeach
                          </div>
                        </div>
   		            	<a href="/location/{{$place->slug}}/">More details...</a>
                     </div>
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