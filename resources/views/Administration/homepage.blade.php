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
  .page-content {
    padding-top: 0px !important;
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
                    Administration
                  </h1>
               </div>
            </div>
         </div>
      </div>
      <div class="page-content">
         <div class="container">
            <div style="margin: 10px 0px" class="row">
              @if ($place_reports_to_review > 0)
                <button style="float: right; background-color: orange !important" onclick="window.location.href = '/admin/all-place-reports';" class="button NormanlButton">Place reports ({{$place_reports->count()}})</button>
              @else 
                <button style="float: right" onclick="window.location.href = '/admin/all-place-reports';" class="button NormanlButton">Place reports ({{$place_reports->count()}})</button>
              @endif
            </div>
   		    	<div style="margin-bottom: 20px" class="row">
              <div class="trois">
                <ul style="margin-bottom: 5px" class="subMenu">
                   <li class="page_item page-item-5 current_page_item"><a href="/admin/">Dashboard</a></li>
                </ul>
                <ul style="margin-bottom: 5px" class="subMenu">
                   <li class="page_item page-item-5 current_page_item"><a href="/admin/all-admins">Browse all admins</a></li>
                   <li class="page_item page-item-5 current_page_item"><a href="/admin/add-admin">Add admin</a></li>
                </ul>
                <ul style="margin-bottom: 5px" class="subMenu">
                   <li class="page_item page-item-5 current_page_item"><a href="/admin/all-agencies">Browse all agencies</a></li>
                   <li class="page_item page-item-5 current_page_item"><a href="/admin/activate-agency">Activate agency</a></li>
                </ul>
                <ul style="margin-bottom: 5px" class="subMenu">
                   <li class="page_item page-item-5 current_page_item"><a href="/admin/all-blacklists">User blacklist</a></li>
                   <li class="page_item page-item-5 current_page_item"><a href="/admin/add-to-blacklist">Add to blacklist</a></li>
                </ul>
                <ul style="margin-bottom: 5px" class="subMenu">
                   <li class="page_item page-item-5 current_page_item"><a href="/admin/all-keywords">Browse all keywords</a></li>
                   <li class="page_item page-item-5 current_page_item"><a href="/admin/add-keyword">Add keyword</a></li>
                </ul>
              </div>
              <div class="neuf">
                <div style="min-height: 250px" class="row">
                  <div class=six>
                    <h3>Admins</h3>
                    <hr>
                    <p>
                      Admin count : {{$admins}}
                    </p>
                    <button onclick='window.location.href = "/admin/all-admins";'>View all</button>
                  </div>
                  <div class=six>
                    <h3>Agencies</h3>
                    <hr>
                    <p>
                      Agencies count : {{$agencies}} <br>
                      Tours count : {{$tours}} <br>
                      Bookings count : {{$bookings}}
                    </p>
                    <button onclick='window.location.href = "/admin/all-agencies";'>View all</button>
                  </div>
                </div>
                <div style="min-height: 250px" class="row">
                  <div class=six>
                    <h3>Blacklist</h3>
                    <hr>
                    <p>
                      Blacklistted users : {{$blacklists}}
                    </p>
                    <button onclick='window.location.href = "/admin/all-blacklists";'>View all</button>
                  </div>
                  
                </div>
              </div>
            </div>
         </div>
      </div>
   	</div>
 </div>

@endsection