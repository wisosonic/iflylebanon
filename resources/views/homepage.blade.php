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
        <script>
           function updateShareBoxLinks(location) {
             document.getElementById('share-box-title').innerText = location.getAttribute('data-title');
             document.getElementById('share-box-fb').setAttribute("href", "http://www.facebook.com/sharer.php?u=" + location.getAttribute('data-link'));
             document.getElementById('share-box-twitter').setAttribute("href", "http://twitter.com/home?status=" + location.getAttribute('data-title')
                 + "%20-%20" + location.getAttribute('data-link'));
             document.getElementById('share-box-linkedin').setAttribute("href", "http://www.linkedin.com/shareArticle?mini=true&amp;url="
                 + location.getAttribute('data-link') + "&amp;title=" + location.getAttribute('data-title') + "&amp;source=I Fly Lebanon");
             document.getElementById('share-box-pinterest').setAttribute("href", "http://pinterest.com/pin/create/button/?url="
                 + location.getAttribute('data-link') + "&amp;description=" + location.getAttribute('data-title'));
             document.getElementById('share-box-google').setAttribute("href", "http://plus.google.com/share?url=" + location.getAttribute('data-link'));
           }
        </script>
        <div id="share-box" class="zoom-anim-dialog mfp-hide">
           <span class="share-subtitle tiny-details">Share</span>
           <div class="title">
              <h2 id="share-box-title"></h2>
           </div>
           <a id="share-box-fb" target="_blank" class="hint--bottom facebook-icon" data-hint="Share on Facebook">
           <i class="fab fa-facebook-square"></i>
           </a>
           <a id="share-box-twitter" target="_blank" class="hint--bottom twitter-icon" data-hint="Share on Twitter">
           <i class="fab fa-twitter-square"></i>
           </a>
           <a id="share-box-linkedin" target="_blank" class="hint--bottom linkedin-icon" data-hint="Share on LinkedIn">
           <i class="fab fa-linkedin-square"></i>
           </a>
           <a id="share-box-pinterest" target="_blank" class="hint--bottom pinterest-icon" data-hint="Share on Pinterest">
           <i class="fab fa-pinterest"></i>
           </a>
           <a id="share-box-google" target="_blank" class="hint--bottom googleplus-icon" data-hint="Share on Google+">
           <i class="fab fa-google-plus-square"></i>
           </a>
        </div>
        <div id="fullpage-wrapper">
           <div id="fullpage" class="scrolling-auto animations-on fullpage-show home-page">
              @foreach ($places as $key => $place)
                <section id="section-{{$key+1}}" class="section text-image-section section-{{$key+1}} no-image nav-overlayimage-background layout-left dark-section" data-section="{{$key+1}}" data-title="{{$place->title}}" style="background-image:url({{$place->image}});">
                   <a name="section-{{$key+1}}"></a>
                   <div class="overlay" style="background:#000000; opacity:0.15; filter:alpha(opacity=15); "></div>
                   <div class="container">
                      <div class="section-entry" >
                         <div class="text-image-wrapper">
                            <div class="col-md-6 text-cell" style="background-color: rgb(255,255,255,0.5); padding: 20px">
                               <div class="text-layout-inner">
                                  <a href="https://maps.google.com/maps?&z=12&q={{$place->long}}+{{$place->lat}}&ll={{$place->long}}+{{$place->lat}}" target="_blank" class="fa-icon-link themewich-lightbox no-ajaxy" title="Location On Map">
                                     <div class="v-item subtitle tiny-details " style="color:#333333 !important ">
                                        <i class="fas fa-map-marker-alt" style="font-size: 1.3em !important; color:red"></i> {{$place->department}} 
                                     </div>
                                  </a>
                                  <div class="v-item title">
                                      <h2 style="color: #333333; font-weight: 600">{{$key+1}} - {{$place->title}}</h2>
                                      <fieldset class="rating">
                                        <span style="color:#333333; font-weight: 700" id="stars-{{$key+1}}">{{number_format($place->rating,1)}} ({{$place->ratings()->count()}})</span> <label style="padding: 2.5px ; color: yellow" class="full"  ></label>
                                      <fieldset>
                                  </div>
                                  <br>
                                <!--   <div class="section-buttons v-item social-media-links hidden-xs">
                                     <a target="_blank" href="#" class="social-link" title="Facebook">
                                     <i class="fab fa-facebook-f"></i></a> <a target="_blank" href="#" class="social-link" title="Twitter">
                                     <i class="fab fa-twitter"></i></a> <a target="_blank" href="#" class="social-link" title="Instagram">
                                     <i class="fab fa-instagram"></i></a> <a target="_blank" href="#" class="social-link" title="Google">
                                     <i class="fab fa-google-plus-g"></i></a> <a target="_blank" href="#" class="social-link" title="Pinterest">
                                     <i class="fab fa-pinterest-p"></i></a> 
                                  </div> -->
                                 <!--  <hr class="v-item title-divider" data-width="100px" /> -->
                                  <div class="v-item content " style="color:#333333 !important; font-weight:700">
                                       {{$place->description}}
                                  </div>
                                  <div class="sharing badges section-buttons v-item">
                                      <a href="/location/{{$place->slug}}/" style="background-color: #333333" class="location-actions popup-with-move-anim">
                                        <i class="fas fa-info"></i>
                                        <span class="sharetitle">More</span>
                                      </a>
                                      <a  href="#share-box" onclick="updateShareBoxLinks(this);" data-title="{{$place->title}}" data-link="./location/{{$place->slag}}/" style="background-color: #333333" class="location-actions open-popup-link post-share share popup-with-move-anim">
                                       <i class="fa fa-share"></i>
                                       <span class="sharetitle">Share</span>
                                      </a>
                                      @if ($livestatus)
                                        <a href="{{$videourl}}" target="_blank" style="background-color: #333333" class="">
                                         <i style="color: red" class="fas fa-wifi"></i>
                                         <span class="sharetitle">Live now</span>
                                        </a>
                                      @else
                                        <a href="#" style="background-color: #333333" class="">
                                         <span class="sharetitle">CHANNEL OFFLINE</span>
                                        </a>
                                      @endif
                                      @if (Auth::user())
                                        <div style="margin-top: 20px" class="sharing badges section-buttons v-item">
                                          <h3 style="float:left; color:#333333 ; font-weight: 600">Rate this place : </h3>
                                          <fieldset style="margin-top: 6px" class="rating">
                                            <input type="radio" id="{{$place->id}}_5" name="rating_{{$place->id}}" value="5" /><label onclick="ratePlace('{{$place->id}}','5');" class = "full" for="{{$place->id}}_5" title="Awesome - 5 stars"></label>
                                            <input type="radio" id="{{$place->id}}_4-5" name="rating_{{$place->id}}" value="4.5" /><label onclick="ratePlace('{{$place->id}}','4.5');" class="half" for="{{$place->id}}_4-5" title="Pretty good - 4.5 stars"></label>
                                            <input type="radio" id="{{$place->id}}_4" name="rating_{{$place->id}}" value="4" /><label onclick="ratePlace('{{$place->id}}','4');" class = "full" for="{{$place->id}}_4" title="Pretty good - 4 stars"></label>
                                            <input type="radio" id="{{$place->id}}_3-5" name="rating_{{$place->id}}" value="3.5" /><label onclick="ratePlace('{{$place->id}}','3.5');" class="half" for="{{$place->id}}_3-5" title="Meh - 3.5 stars"></label>
                                            <input type="radio" id="{{$place->id}}_3" name="rating_{{$place->id}}" value="3" /><label onclick="ratePlace('{{$place->id}}','3');" class = "full" for="{{$place->id}}_3" title="Meh - 3 stars"></label>
                                            <input type="radio" id="{{$place->id}}_2-5" name="rating_{{$place->id}}" value="2.5" /><label onclick="ratePlace('{{$place->id}}','2.5');" class="half" for="{{$place->id}}_2-5" title="Kinda bad - 2.5 stars"></label>
                                            <input type="radio" id="{{$place->id}}_2" name="rating_{{$place->id}}" value="2" /><label onclick="ratePlace('{{$place->id}}','2');" class = "full" for="{{$place->id}}_2" title="Kinda bad - 2 stars"></label>
                                            <input type="radio" id="{{$place->id}}_1-5" name="rating_{{$place->id}}" value="1.5" /><label onclick="ratePlace('{{$place->id}}','1.5');" class="half" for="{{$place->id}}_1-5" title="Meh - 1.5 stars"></label>
                                            <input type="radio" id="{{$place->id}}_1" name="rating_{{$place->id}}" value="1" /><label onclick="ratePlace('{{$place->id}}','1');" class = "full" for="{{$place->id}}_1" title="Sucks big time - 1 star"></label>
                                            <input type="radio" id="{{$place->id}}_0-5" name="rating_{{$place->id}}" value="0.5" /><label onclick="ratePlace('{{$place->id}}','0.5');" class="half" for="{{$place->id}}_0-5" title="Sucks big time - 0.5 stars"></label>
                                          </fieldset>
                                        </div>
                                      @else
                                        <div style="margin-top: 20px" class="sharing badges section-buttons v-item">
                                          <h3 style="float:left; color:#333333 ; font-weight: 600">(Log in to rate this place)</h3>
                                        </div>
                                      @endif 
                                  </div>
                               </div>
                               <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                         </div>
                      </div>
                   </div>
                   <a href="#section-2" class="nextbutton nobg scroll-animate next-section-link">
                   <span>Next place </span> </a>
                   <div class="credits tiny-details black-text-shadow">
                      Image by john
                   </div>
                </section>
              @endforeach
           </div>
        </div>
        <div class="clear"></div>
        <div id="footer">
           <div class="container clearfix">
              <div class="col-md-6 left-footer tiny-details">
                 &copy; Copyright 2018 
              </div>
           </div>
           <div class="clear"></div>
        </div>
  </div>

    <script type="text/javascript">
      var token = '{{ csrf_token() }}' ;
      function ratePlace(place_id, value) {
        jQuery.ajax({
          type: "POST",
          url: "/rate-place",
          data: {
                  _token : token,
                  placeid : place_id,
                  value : value,
              },
          success: function(array){
            var array = JSON.parse(array);
            console.log(array);
          },
          error: function(xhr, status, error) {
            console.log(xhr.responseText);
          }
      });
      }

      // jQuery('.vote').colorPicker({
      //   onColorChange : function() {
      //       var element = jQuery( this ) ;
      //       var index = jQuery( ".vote" ).index( element );
      //       console.log(index);
      //   }
      // });

      // jQuery( ".vote" ).mouseover(function() {
      //   var element = jQuery( this ) ;
      //   var index = jQuery( ".vote" ).index( element );
      //   for (var i = 0 ; i < 10; i++) {
      //     if (i<= index) {
      //       document.getElementsByClassName("vote")[i].style.color= "orange";
      //     } else {
      //       document.getElementsByClassName("vote")[i].style.color= "white";
      //     }
      //   }
      // });

    </script>

@endsection