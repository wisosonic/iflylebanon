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
                     {{ $agency->name }}
                  </h1>
               </div>
            </div>
         </div>
      </div>
      <div class="page-content">
         <div class="container">
   		    	<div style="margin-bottom: 20px" class="row">
              <div class="trois">
                <ul class="subMenu">
                   <li class="page_item page-item-5 current_page_item"><a href="/agency/">Dashboard</a></li>
                   <li class="page_item page-item-5 current_page_item"><a href="/agency/all-tours">Browse all tours</a></li>
                   <li class="page_item page-item-5 current_page_item"><a href="/agency/my-tours">Browse my tours</a></li>
                   <li class="page_item page-item-5 current_page_item"><a href="/agency/add-new-tour">Add new tour</a></li>
                </ul>
              </div>
              <div class="neuf">
                <div class="row">
                  <div class=six>
                    <h3>Agency address :</h3>
                    <p>
                      {{$agency->address}}
                    </p>
                    <hr>
                  </div>
                  <div class=six>
                    <h3>Agency owner :</h3>
                    <p>
                      {{$agency->user()->first()->name}}
                    </p>
                    <hr>
                  </div>
                </div>
                <div class="row">
                  <p>All tours count : {{$alltours}} </p>
                  <p>My tours count : {{count($tours)}} </p>
                  <p>Booking count : {{$bookings}} </p>
                  <p>Cash : {{$ca}} $</p>
                </div>
              </div>
            </div>
         </div>
      </div>
   	</div>
 </div>

 <script type="text/javascript">
    @if (Session::has('message'))
       @if (Session::get('message')=="touradded") 
          swal({
                title: "",   
                text: "Your new tour has been added successfully !", 
                type: "success",   
                confirmButtonColor: "#3f927e",   
                confirmButtonText: "Ok"
             });
       @elseif (Session::get('message')=="notadded") 
          swal({
                title: "Something went wrong !",   
                text: "Your new tour has not been added !", 
                type: "error",   
                confirmButtonColor: "#3f927e",   
                confirmButtonText: "Ok"
             });
       @elseif (Session::get('message')=="agencynotexists") 
          swal({
                title: "Something went wrong !",   
                text: "Your agency has not been found !", 
                type: "error",   
                confirmButtonColor: "#3f927e",   
                confirmButtonText: "Ok"
             });
       @endif
    @endif
 </script>

@endsection