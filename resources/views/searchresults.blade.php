@extends("general")

@section("content")

<style type="text/css">
   p {
      margin: 0px;
      color: #333333;
   }
   hr {
      border-color: #333333 !important;
      margin: 10px 0px !important
   }
   h1, h2, h3, h4 {
      color: #333333;
      margin-bottom: 0px;
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
                     Search results : ({{count($results)}}) matches
                  </h1>
               </div>
            </div>
         </div>
      </div>
      <div class="page-content">
         <div class="container">
            <form action="" method="POST" id="searchcategory_form">
               {{  csrf_field() }}
               <input type="hidden" name="searchcategory_input" id="searchcategory_input">
            </form>
            <ul style="margin-bottom: 20px" class="nav nav-tabs">
               @if ($type=="place")
                  <li class="active"><a onclick="changeCategory('place','{{$search}}')" href="#">By place</a></li>
                  <li><a onclick="changeCategory('tag','{{$search}}')" href="#">By tag</a></li>
                  <li><a onclick="changeCategory('tour','{{$search}}')" href="#">By tour</a></li>
               @elseif ($type=="tag")
                  <li><a onclick="changeCategory('place','{{$search}}')" href="#">By place</a></li>
                  <li class="active"><a onclick="changeCategory('tag','{{$search}}')" href="#">By tag</a></li>
                  <li><a onclick="changeCategory('tour','{{$search}}')" href="#">By tour</a></li>
               @elseif ($type=="tour")
                  <li><a onclick="changeCategory('place','{{$search}}')" href="#">By place</a></li>
                  <li><a onclick="changeCategory('tag','{{$search}}')" href="#">By tag</a></li>
                  <li class="active"><a onclick="changeCategory('tour','{{$search}}')" href="#">By tour</a></li>
               @endif
            </ul>


         	@if ( ($type=="place" || $type=="tag" ) && count($results) > 0)
         		@foreach ($results as $key => $place)
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
		      @elseif ($type=="tour" && count($results) > 0 )
               @foreach ($results as $key => $tour)
                  <div class="row">
                     <div class="six">
                       <h3><a href="/tour/{{$tour->id}}">{{$tour->title}}</a></h3>
                       <p>
                         Date & time : {{$tour->date}} <br>
                         Duration : {{$tour->duration}} <br>
                         Agency & contact : <b> {{$tour->agency()->first()->name}} </b> - {{$tour->agency()->first()->phone}}
                       </p>
                     </div>
                     <div class="deux">
                       <b> {{$tour->price}} $ / place </b>
                     </div>
                     <div class="deux">
                       <a href="/tour/{{$tour->id}}">Details</a>
                     </div>
                     <div class="deux">
                       <button onclick="bookTour('{{$tour->id}}'); return false;" >Book now !</button>
                     </div>
                   </div>
                   <hr>
               @endforeach
            @else 
   		    	<div class="col-md-3 full-width"></div>
   		    	<div class="col-md-6 full-width">
   	            Your search : <b>{{$search}}</b> - did not match any {{$type}}s.
   	            <br><br>
   					Suggestions:
   					<br><br>
   					Make sure that all words are spelled correctly.<br>
   					Try different keywords.<br>
   					Try more general keywords.<br>
   		        </div>
   		        <div class="col-md-3 full-width"></div>
   		    @endif


         </div>
      </div>
   	</div>
 </div>

 <script type="text/javascript">
    function changeCategory(type,search) {
      input = document.getElementById("searchcategory_input") ;
      form = document.getElementById("searchcategory_form");
      
      input.value = search;

      if (type == "place") {
         input.name = "search";
         form.action = "/search";
      } else if (type=="tag") {
         input.name = "tagsearch";
         form.action = "/search-tag" ;
      } else if (type=="tour") {
         input.name = "toursearch";
         form.action = "/search-tour" ;
      }
      form.submit();
    }
 </script>
@endsection