@extends("general")

@section("content")
  <!-- Font Awesome Icon Library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/css/rating.css">
  <style>
    .checked {
        color: orange;
    }
    input[type="text"],
    textarea {
      width: 100%
    }
  </style>
  <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 400px;
      }

      .select2-container--default.select2-container--focus .select2-selection--multiple  {
            max-height: 42px;
      }
      .select2-container--default .select2-selection--multiple  {
            max-height: 42px;
      }
      .select2-container--open .select2-dropdown--above {
        display: none;
      }
      .select2-results__option {
        display: none;
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
                     Add new place
                  </h1>
               </div>
            </div>
         </div>
      </div>

      <div style="padding-bottom: 30px;" class="page-content">
         <div class="container">
            {{ Form::open(array('url' => '#', 'id' => 'addnewplace_form', 'enctype' => 'multipart/form-data')) }}
            <!-- <form action="" name="addnewplace_form" id="addnewplace_form" method="POST"> -->
              {{ csrf_field() }}
              <input type="hidden" name="user_id" value="{{$user_id}}">
              <div class="col-md-6 full-width">
                <label for="title">Title * : </label>
                <input type="text" name="title" id="title" placeholder="Title">
              </div >
              <div class="col-md-6 full-width">
                <label for="department">Department * : </label>
                <input type="text" name="department" id="department" placeholder="Department">
              </div>
              <div class="col-md-12 full-width">
                <label for="description">Description * : </label>
                <textarea rows="2" name="description" id="description" placeholder="Description"></textarea>
              </div>
              <div class="col-md-12 full-width">
                <label for="text">About this place * : </label>
                <textarea rows="5" name="text" id="text" placeholder="About this place"></textarea>
              </div>
              <div style="margin-bottom: 20px" class="col-md-12 full-width">
                <label for="tags">Tags * : (select multiple tags separated with , or ; or space) </label>
                <select id="tags" name="tags[]" class="form-control js-example-tokenizer" multiple="multiple"></select>
              </div>
              <div class="col-md-12 full-width">
                <label>Locate this place on the map * : </label>
                <input type="hidden" name="long" id="long" value="">
                <input type="hidden" name="lat" id="lat" value="">
                <div id="map"></div>
              </div>
              <div class="col-md-12 full-width">
                <label for="text">Add cover photo * : </label>
                {{ Form::file('coverphoto', array('class' => 'image', 'id' => 'coverphoto', 'accept' => 'image/*')) }}
                <!-- <input type="file" name="coverphoto" id="coverphoto" accept="image/*"> -->
              </div>
              <a href="#" onclick="sendNewPlaceForm(); return false" style="background-color: #333333" class="">
                <span class="sharetitle">Add place</span>
              </a>
            {{ Form::close() }}
            <!-- </form> -->
         </div>
      </div>
   </div>

  </div>
  
  <script type='text/javascript' src='/js/places.js'></script>
  <script>
    jQuery.noConflict();
    
    jQuery( document ).ready(function() {
      jQuery(".js-example-tokenizer").select2({
        tags: true,
        tokenSeparators: [',', ' ', ';'],
        placeholder: "Select tags (5 max)",
        allowClear: true,
        createTag: function (params) {
          var count = jQuery('#tags').select2('data').length ;
          // Don't offset to create a tag if there is no @ symbol
          if (count<5) {
            return {
              id: params.term,
              text: params.term
            }
          } else {
            return null;
          }
        }
      })
    });

    var map;
    var mapMarkers = [];

    function placeMarker(location) {
      for (var i = 0; i < mapMarkers.length; i++ ) {
        mapMarkers[i].setMap(null);
      }
      mapMarkers.length = 0;
      var marker = new google.maps.Marker({
          position: location, 
          map: map
      });
      mapMarkers.push(marker);
      
    }
    function initMap() {
      map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 33.8766895, lng: 35.4978176},
        zoom: 8
      });
      google.maps.event.addListener(map, 'click', function(event) {
         placeMarker(event.latLng);
         document.getElementById("long").value = event.latLng.lng().toFixed(7) ;
         document.getElementById("lat").value = event.latLng.lat().toFixed(7) ;
      });
    }
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZMuhMd1c1awtDuM0rhwkdbzOLyomRlgc&callback=initMap" async defer></script>

@endsection