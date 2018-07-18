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
      <div class="page-content">
         <div class="container">
            <div class="col-md-6 full-width">
              <label for="title">Title : </label>
              <input type="text" name="title" id="title" placeholder="Title">
            </div >
            <div class="col-md-6 full-width">
              <label for="department">Department : </label>
              <input type="text" name="department" id="department" placeholder="Department">
            </div>
            <div class="col-md-12 full-width">
              <label for="description">Description : </label>
              <textarea rows="2" name="description" id="description" placeholder="Description"></textarea>
            </div>
            <div class="col-md-12 full-width">
              <label for="text">About this place : </label>
              <textarea rows="5" name="text" id="text" placeholder="About this place"></textarea>
            </div>
            <div class="col-md-12 full-width">
              <label>Locate this place on the map : </label>
              <div id="latclicked"></div>
              <div id="longclicked"></div>
              <div id="latmoved"></div>
              <div id="longmoved"></div>
              <div style="padding:10px">
                  <div id="map"></div>
              </div>
            </div>
         </div>
      </div>
   </div>

  </div>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZMuhMd1c1awtDuM0rhwkdbzOLyomRlgc&callback=initMap" async defer></script>
  <script type="text/javascript">
    var map;

    function initMap() {                            
    var latitude = 27.7172453; // YOUR LATITUDE VALUE
    var longitude = 85.3239605; // YOUR LONGITUDE VALUE

    var myLatLng = {lat: latitude, lng: longitude};

    map = new google.maps.Map(document.getElementById('map'), {
      center: myLatLng,
      zoom: 14,
      disableDoubleClickZoom: true, // disable the default map zoom on double click
    });

    // Update lat/long value of div when anywhere in the map is clicked    
    google.maps.event.addListener(map,'click',function(event) {                
        document.getElementById('latclicked').innerHTML = event.latLng.lat();
        document.getElementById('longclicked').innerHTML =  event.latLng.lng();
    });

    // Update lat/long value of div when you move the mouse over the map
    google.maps.event.addListener(map,'mousemove',function(event) {
        document.getElementById('latmoved').innerHTML = event.latLng.lat();
        document.getElementById('longmoved').innerHTML = event.latLng.lng();
    });
            
    var marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      //title: 'Hello World'
      
      // setting latitude & longitude as title of the marker
      // title is shown when you hover over the marker
      title: latitude + ', ' + longitude 
    });    

    // Update lat/long value of div when the marker is clicked
    marker.addListener('click', function(event) {              
      document.getElementById('latclicked').innerHTML = event.latLng.lat();
      document.getElementById('longclicked').innerHTML =  event.latLng.lng();
    });

    // Create new marker on double click event on the map
    google.maps.event.addListener(map,'dblclick',function(event) {
        var marker = new google.maps.Marker({
          position: event.latLng, 
          map: map, 
          title: event.latLng.lat()+', '+event.latLng.lng()
        });
        
        // Update lat/long value of div when the marker is clicked
        marker.addListener('click', function() {
          document.getElementById('latclicked').innerHTML = event.latLng.lat();
          document.getElementById('longclicked').innerHTML =  event.latLng.lng();
        });            
    });

    // Create new marker on single click event on the map
    /*google.maps.event.addListener(map,'click',function(event) {
        var marker = new google.maps.Marker({
          position: event.latLng, 
          map: map, 
          title: event.latLng.lat()+', '+event.latLng.lng()
        });                
    });*/
    }
    </script>

@endsection