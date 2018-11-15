@extends("general")

@section("content")
  <!-- Font Awesome Icon Library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/css/rating.css">
  <link rel="stylesheet" href="/css/modal.css">
  <style>
    .checked {
        color: orange;
    }
    .hr {
        margin: 20px 0px !important;
        border-color: #dcdcdc !important;
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
                                        <span style="color:#333333; font-weight: 700" id="stars-{{$key+1}}">{{$place->rating}} ({{$place->ratings()->count()}})</span> <label style="padding: 2.5px ; color: yellow" class="full"  ></label>
                                      <fieldset>
                                  </div>
                                  <br>
                                  <!-- <div class="section-buttons v-item social-media-links hidden-xs">
                                     <a target="_blank" href="#" class="social-link" title="Facebook">
                                     <i class="fab fa-facebook-f"></i></a> <a target="_blank" href="#" class="social-link" title="Twitter">
                                     <i class="fab fa-twitter"></i></a> <a target="_blank" href="#" class="social-link" title="Instagram">
                                     <i class="fab fa-instagram"></i></a> <a target="_blank" href="#" class="social-link" title="Google">
                                     <i class="fab fa-google-plus-g"></i></a> <a target="_blank" href="#" class="social-link" title="Pinterest">
                                     <i class="fab fa-pinterest-p"></i></a> 
                                  </div> -->
                                  <!-- <hr class="v-item title-divider" data-width="100px" /> -->
                                  <div class="v-item content " style="color:#333333 !important; font-weight:700">
                                       {{$place->description}}
                                  </div>
                                  <div class="sharing badges section-buttons v-item">
                                      <a href="/location/{{$place->slug}}/" style="background-color: #333333" class="location-actions popup-with-move-anim">
                                        <i class="fas fa-info"></i>
                                        <span class="sharetitle">More</span>
                                      </a>
                                      <!-- <a  href="#share-box" onclick="updateShareBoxLinks(this);" data-title="{{$place->title}}" data-link="./location/{{$place->slag}}/" style="background-color: #333333" class="location-actions open-popup-link post-share share popup-with-move-anim">
                                       <i class="fa fa-share"></i>
                                       <span class="sharetitle">Share</span>
                                      </a> -->

                                      @if (Auth::user())
                                        <a href="#" onclick="addToFavoritePlaces('{{$place->id}}');" target="" style="background-color: #333333" class="">
                                          <i id="favorite_{{$place->id}}" style="color: {{$place->favorite}}" class="fas fa-heart"></i>
                                          <span class="sharetitle">Save</span>
                                        </a>
                                      @endif

                                      @if (Auth::user())
                                        <a id="golive_{{$place->id}}" onclick="openModal('{{$place->id}}');" href="#" style="float: right; color: #333333 !important; border-color: #333333 !important">
                                          <i class="fas fa-video"></i>Go live
                                        </a>
                                      @endif

                                      <a id="livestreaminglink_{{$place->id}}" href="#" target="" style="background-color: #333333; float: right" class="">
                                        <i id="livestreamingicon_{{$place->id}}" style="color: red" class="fas fa-circle"></i>
                                        <span id="livestreamingbutton_{{$place->id}}" class="sharetitle">OFFLINE</span>
                                      </a>

                                      @if (Auth::user())
                                        @if (Auth::user()->blacklist()->first())
                                          <div style="margin-top: 20px" class="sharing badges section-buttons v-item">
                                            <h3 style="float:left; color:#333333 ; font-weight: 600">(You are not allowed to rate this place)</h3>
                                          </div>
                                        @else
                                          <div style="margin-top: 20px" class="sharing badges section-buttons v-item">
                                            <h3 style="border:2px solid white; border-right-style: none; border-top-left-radius: 100px; border-bottom-left-radius: 100px; padding:5px 10px; float:left; color:white ; font-weight: 600; background-color: #333333;">Rate this place : </h3>
                                            <fieldset style="border:2px solid white; border-top-right-radius: 100px; border-bottom-right-radius: 100px; background-color: #333333; padding: 8.5px 10px;" class="rating">
                                              <input type="radio" id="{{$place->id}}_5" name="rating_{{$place->id}}" value="5" /><label id="label_{{$place->id}}_5" onclick="ratePlace('{{$place->id}}','5', '{{$key+1}}');" class = "full" for="{{$place->id}}_5" title="Awesome - 5 stars"></label>
                                              <input type="radio" id="{{$place->id}}_4-5" name="rating_{{$place->id}}" value="4.5" /><label id="label_{{$place->id}}_4-5" onclick="ratePlace('{{$place->id}}','4.5', '{{$key+1}}');" class="half" for="{{$place->id}}_4-5" title="Pretty good - 4.5 stars"></label>
                                              <input type="radio" id="{{$place->id}}_4" name="rating_{{$place->id}}" value="4" /><label id="label_{{$place->id}}_4" onclick="ratePlace('{{$place->id}}','4', '{{$key+1}}');" class = "full" for="{{$place->id}}_4" title="Pretty good - 4 stars"></label>
                                              <input type="radio" id="{{$place->id}}_3-5" name="rating_{{$place->id}}" value="3.5" /><label id="label_{{$place->id}}_3-5" onclick="ratePlace('{{$place->id}}','3.5', '{{$key+1}}');" class="half" for="{{$place->id}}_3-5" title="Meh - 3.5 stars"></label>
                                              <input type="radio" id="{{$place->id}}_3" name="rating_{{$place->id}}" value="3" /><label id="label_{{$place->id}}_3" onclick="ratePlace('{{$place->id}}','3', '{{$key+1}}');" class = "full" for="{{$place->id}}_3" title="Meh - 3 stars"></label>
                                              <input type="radio" id="{{$place->id}}_2-5" name="rating_{{$place->id}}" value="2.5" /><label id="label_{{$place->id}}_2-5" onclick="ratePlace('{{$place->id}}','2.5', '{{$key+1}}');" class="half" for="{{$place->id}}_2-5" title="Kinda bad - 2.5 stars"></label>
                                              <input type="radio" id="{{$place->id}}_2" name="rating_{{$place->id}}" value="2" /><label id="label_{{$place->id}}_2" onclick="ratePlace('{{$place->id}}','2', '{{$key+1}}');" class = "full" for="{{$place->id}}_2" title="Kinda bad - 2 stars"></label>
                                              <input type="radio" id="{{$place->id}}_1-5" name="rating_{{$place->id}}" value="1.5" /><label id="label_{{$place->id}}_1-5" onclick="ratePlace('{{$place->id}}','1.5', '{{$key+1}}');" class="half" for="{{$place->id}}_1-5" title="Meh - 1.5 stars"></label>
                                              <input type="radio" id="{{$place->id}}_1" name="rating_{{$place->id}}" value="1" /><label id="label_{{$place->id}}_1" onclick="ratePlace('{{$place->id}}','1', '{{$key+1}}');" class = "full" for="{{$place->id}}_1" title="Sucks big time - 1 star"></label>
                                              <input type="radio" id="{{$place->id}}_0-5" name="rating_{{$place->id}}" value="0.5" /><label id="label_{{$place->id}}_0-5" onclick="ratePlace('{{$place->id}}','0.5', '{{$key+1}}');" class="half" for="{{$place->id}}_0-5" title="Sucks big time - 0.5 stars"></label>
                                            </fieldset>
                                          </div>
                                        @endif
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
  </div>

  <!-- Trigger/Open The Modal -->
  <button id="myBtn">Open Modal</button>

  <div id="myModal" class="modal">
    <div style="width: 60%"  class="modal-content">
      <span class="close">&times;</span>
      <h3>Your Youtube live streaming url</h3>
      <div class="row">
        <div class="dix">
          <form action="" method="POST" id="livestream_form">
            {{csrf_field()}}
            <input type="hidden" id="place_id" name="place_id" value="">
            <input type="hidden" id="video_id" name="video_id" value="">
            <input style="width: 100%" type="text" id="youtubeurl" name="youtubeurl" placeholder="Your live streaming url">
          </form>
          </div>
        <div class="deux badges">
          <a onclick="setIframeSource();" href="#">Search</a>
        </div>
      </div>
      <div class="row">
        <div id="youtubeiframediv" class="six">
          <iframe 
            style="display:none"
            id="youtubeiframe"
            width="210" 
            height="176" 
            src="" 
            allowfullscreen="allowfullscreen"
            mozallowfullscreen="mozallowfullscreen" 
            msallowfullscreen="msallowfullscreen" 
            oallowfullscreen="oallowfullscreen" 
            webkitallowfullscreen="webkitallowfullscreen">
          </iframe>
        </div>
        <div id="publishdiv" class="six badges">
          <span id="publishspan" ></span>
          <span id="publishspanstatus" ></span>
          <a id="publishbutton" href="#" style="background-color: #333333; opacity: 1; color: white; display:none" onclick="publishLiveStream();">Publish</a>
        </div>
      </div>
    </div>
  </div>

  <div id="myModal2" class="modal">
    <div style="width: 80%" class="modal-content">
      <span class="close">&times;</span>
      <div class="row">
        <h3 id="livestream_title"></h3>
        <div id="youtubeiframe2div" class="six">
          <iframe 
            style="display:none"
            id="youtubeiframe2"
            width="596.6" 
            height="500" 
            src="" 
            allowfullscreen="allowfullscreen"
            mozallowfullscreen="mozallowfullscreen" 
            msallowfullscreen="msallowfullscreen" 
            oallowfullscreen="oallowfullscreen" 
            webkitallowfullscreen="webkitallowfullscreen">
          </iframe>
          <br>
          <a id="iframe_report" href="#">Report this video</a>
        </div>
        <div class="six">
          <h3>List of available live streams</h3>
          <div style="overflow: auto; height: 500px;" class="row" id="livestream_sidebar" >
            
          </div>
        </div>
      </div>
    </div>
  </div>


    <script src="/js/livestreaming.js"></script>
    <script src="/js/modal1.js"></script>
    <script type="text/javascript">
      var token = '{{ csrf_token() }}' ;
      var notified = false;
      var lastLiveCount = 0;

      function publishLiveStream() {
        var form = document.getElementById("livestream_form");
        form.action = "/publish-live-streaming";
        form.submit();
      }
      function updateLiveStream() {
        var form = document.getElementById("livestream_form");
        form.action = "/update-live-streaming";
        form.submit();
      }

      function setIframeSource() {
        var youtubeurl = document.getElementById("youtubeurl").value;
        if (youtubeurl != "") {
          jQuery.ajax({
            type: "POST",
            url: "/search-live-streaming",
            data: {
                    _token : token,
                    youtubeurl : youtubeurl
                },
            success: function(response) {
              response = JSON.parse(response);
              message = response["message"];

              response = response["res"];
              if (response.length > 0) {
                response = response[0];
                videoid = response["id"];
                snippet = response["snippet"];
                
                document.getElementById("youtubeiframe").setAttribute("src", "https://www.youtube.com/embed/"+videoid+"?controls=1&fs=1");
                document.getElementById("video_id").value = videoid;
                document.getElementById("publishspanstatus").style.display = "none";
                
                if(snippet["liveBroadcastContent"]=="live") {
                  document.getElementById("publishdiv").style.display = "inline-block" ;
                  document.getElementById("publishspan").innerHTML = "Your live stream is live now !" ;
                  document.getElementById("youtubeiframe").style.display = "inline-block";
                  document.getElementById("youtubeiframe").setAttribute("width", 0.9*document.getElementById("youtubeiframediv").offsetWidth);
                  document.getElementById("youtubeiframe").setAttribute("height", 0.754*document.getElementById("youtubeiframediv").offsetWidth);
                  // document.getElementById("publishbutton").style.display = "inline-block";
                } else {
                  document.getElementById("publishdiv").style.display = "inline-block" ;
                  document.getElementById("publishspan").innerHTML = "Your live stream is offline !" ;
                  document.getElementById("youtubeiframe").style.display = "inline-block";
                  document.getElementById("youtubeiframe").setAttribute("width", 0.9*document.getElementById("youtubeiframediv").offsetWidth);
                  document.getElementById("youtubeiframe").setAttribute("height", 0.754*document.getElementById("youtubeiframediv").offsetWidth);
                  // document.getElementById("publishbutton").style.display = "none";
                }

              } else {
                document.getElementById("video_id").value = "" ;
                document.getElementById("publishdiv").style.display = "inline-block" ;
                document.getElementById("publishspan").innerHTML = "Your live stream was not found !" ;
                document.getElementById("youtubeiframe").style.display = "none";
                // document.getElementById("publishbutton").style.display = "none";
              }

              if (message == "addedLive") {
                document.getElementById("publishspanstatus").style.display = "inline-block";
                document.getElementById("publishspanstatus").innerHTML = "Your video is already added. Do you want to assign it to this place ?";
                document.getElementById("publishbutton").style.display = "inline-block";
                document.getElementById("publishbutton").innerHTML = "UPDATE";
                document.getElementById("publishbutton").setAttribute("onclick", "updateLiveStream();") ;
              } else if (message == "addedOffline") {
                document.getElementById("publishspanstatus").style.display = "inline-block";
                document.getElementById("publishspanstatus").innerHTML = "Your video is already added. When it becomes live, it will be automatically updated.";
                document.getElementById("youtubeiframe").style.display = "none";
              } else if (message == "notAdded") {
                if(snippet["liveBroadcastContent"]=="live") {
                  document.getElementById("publishbutton").style.display = "inline-block";
                } else {
                  document.getElementById("publishbutton").style.display = "none";
                }
              }

            },
            error: function(xhr, status, error) {
              console.log(xhr.responseText);
            }
          });
        }
      }

      function addToFavoritePlaces(place_id) {
        jQuery.ajax({
          type: "POST",
          url: "/add-to-my-favorite-places",
          data: {
                  _token : token,
                  placeid : place_id
              },
          success: function(response) {
            if (response == "added") {
              toastr["success"]("This place has been added to your favorite places.", "Place added !");
              document.getElementById("favorite_"+place_id).style.color = "green";
            } else if (response == "exists") {
              toastr["warning"]("This place has already been added to your favorite places.", "Place already added !");
              document.getElementById("favorite_"+place_id).style.color = "green";
            } else {
              toastr["error"]("", "Place does not exist !");
            }
          },
          error: function(xhr, status, error) {
            console.log(xhr.responseText);
          }
        });
      }

      function ratePlace(place_id, value, index) {
        jQuery.ajax({
          type: "POST",
          url: "/rate-place",
          data: {
                  _token : token,
                  placeid : place_id,
                  value : value,
              },
          success: function(array) {
            var array = JSON.parse(array);
            if (array[0] == "updated") {
              document.getElementById("stars-"+index).innerHTML = array[1] + " (" + array[2] + ")";
              swal({   
                title: "You have already rated this place",   
                text: "Your rating have been updated from " + array[3] + " to " + array[4] + " !", 
                type: "success",   
                confirmButtonColor: "#3f927e",   
                confirmButtonText: "Ok"
              });
            } else if ( array[0] == "rated" ) {
              document.getElementById("stars-"+index).innerHTML = array[1] + " (" + array[2] + ")";
              swal({   
                title: "Thank you for rating this place !",   
                text: "", 
                type: "success",   
                confirmButtonColor: "#3f927e",   
                confirmButtonText: "Ok"
              });
            }
          },
          error: function(xhr, status, error) {
            console.log(xhr.responseText);
          }
        });
      }

      jQuery( document ).ready(function() {
        var stars = {!! $stars !!} ;
        Object.keys(stars).forEach(function(id) {
          if (stars[id][1] > 0) {
            document.getElementById("label_"+id+"_"+stars[id][0]).removeAttribute("onclick");
            document.getElementById("label_"+id+"_"+stars[id][0]).click();
            document.getElementById("label_"+id+"_"+stars[id][0]).setAttribute("onclick", "ratePlace('"+id+"','"+stars[id][1]+"', '"+stars[id][2]+"');");
          }
        });
      });

    </script>

@endsection