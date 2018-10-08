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
  input[type=title],
  input[type=tourdate],
  input[type=duration],
  input[type=maxplaces],
  input[type=price],
  input[type=meeting],
  textarea {
    padding: 10px 10px;
    width: 100%;
    margin-bottom: 10px;
  }
  select {
    font-family: "Open Sans";
    line-height: 1.8em;
    font-weight: 400;
    font-style: normal;
    font-size: 1em;
    padding: 10px 10px;
    width: 100%;
    margin-bottom: 10px;
    min-height: 48px;
  }
  .sharing a {
    color: #fff!important;
    opacity: 1!important;
    border-color: #fff!important;
    font-size: 1.3em !important;
    padding: 20px !important;
  }

</style>
<link rel="stylesheet" type="text/css" href="/css/datatables.min.css"/>
<script type="text/javascript" src="/js/datatables.min.js"></script>
<link  href="/css/datepicker/datepicker.css" rel="stylesheet">
<script src="/js/datepicker/datepicker.js"></script>

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
   		    	<div class="row">
              <div class="trois">
                <ul class="subMenu">
                   <li class="page_item page-item-5 current_page_item"><a href="/agency/">Dashboard</a></li>
                   <li class="page_item page-item-5 current_page_item"><a href="/agency/all-tours">Browse all tours</a></li>
                   <li class="page_item page-item-5 current_page_item"><a href="/agency/my-tours">Browse my tours</a></li>
                   <li class="page_item page-item-5 current_page_item"><a href="/agency/add-new-tour">Add new tour</a></li>
                </ul>
              </div>
              <div class="neuf">
                <form method="POST" action="" id="addnewtour_form">
                  {{ csrf_field() }}
                  <input type="hidden" name="agency_id" value="{{$agency->id}}">
                  <div style="margin-bottom: 10px" class="row">
                    <h3>Add new tour</h3>
                  </div>
                  <div class="row">
                    <div class="douze">
                      <input type="title" name="title" placeholder="Tour title *" id="title" >
                    </div>
                    <div class="douze">
                      <textarea name="description" rows="4" placeholder="Description *"></textarea>
                    </div>
                    <div class="quatre">
                      <input onclick=" showdate ('date');" type="tourdate" name="date" id="date" placeholder="Pick a date">
                    </div>

                    <div class="quatre">
                      <button id="trigger" type="button" class="btn btn-default docs-datepicker-trigger">
                        <i class="fa fa-calendar" aria-hidden="true"></i> Calendar
                      </button>
                      <!-- <button onclick=" today ('date');" type="button" class="btn btn-default">
                        <i class="fa fa-sun-o" aria-hidden="true"></i> Now
                      </button> -->
                      <button onclick=" cleardate ('date');" type="button" class="btn btn-default">
                       <i class="fa fa-refresh" aria-hidden="true"></i> Clear date
                      </button>
                    </div>
                    <div class="quatre">
                      <select name="time" placeholder="Tour time" class="">
                        <option value="">Pick a time</option>
                        <option value="09:00:00">09:00 AM</option>
                        <option value="09:30:00">09:30 AM</option>
                        <option value="10:00:00">10:00 AM</option>
                        <option value="10:30:00">10:30 AM</option>
                        <option value="11:00:00">11:00 AM</option>
                        <option value="11:30:00">11:30 AM</option>
                        <option value="12:00:00">12:00 PM</option>
                        <option value="12:30:00">12:30 PM</option>
                        <option value="13:00:00">01:00 PM</option>
                        <option value="13:30:00">01:30 PM</option>
                        <option value="14:00:00">02:00 PM</option>
                        <option value="14:30:00">02:30 PM</option>
                        <option value="15:00:00">03:00 PM</option>
                        <option value="15:30:00">03:30 PM</option>
                        <option value="16:00:00">04:00 PM</option>
                        <option value="16:30:00">04:30 PM</option>
                        <option value="17:00:00">05:00 PM</option>
                        <option value="17:30:00">05:30 PM</option>
                        <option value="18:00:00">06:00 PM</option>
                      </select>
                    </div>

                    <div class="douze">
                      <input type="duration" name="duration" placeholder="Duration *">
                    </div>
                      
                    <div class="douze">
                      <textarea name="places" rows="4" placeholder="Places to visit *"></textarea>
                    </div>
                  </div>

                  <div class="row">
                    <div class="six">
                      <input type="maxplaces" name="maxplaces" placeholder="Max places *">
                    </div>
                    <div  class="six">
                      <input type="price" name="price" placeholder="Price by person ($) *">
                    </div>
                  </div>

                  <div class="row">
                    <div class="douze">
                      <input type="meeting" name="meeting" placeholder="Meeting point *">
                    </div>
                    <div class="douze">
                      <textarea name="details" rows="4" placeholder="Other details"></textarea>
                    </div>
                  </div>

                  <div style="margin-top: 20px" class="sharing badges section-buttons v-item">
                    <a onclick="sendNewTourForm(); return false;" href="#" target="" style="background-color: #333333" class="">
                      <span class="sharetitle">Create tour</span>
                    </a>
                  </div>

                </form>
              </div>
            </div>
         </div>
      </div>
    </div>
 </div>

 <script src="/js/tours.js"></script>
 <script type="text/javascript">
   $('#date').datepicker( {
      trigger:  $('#trigger'),
      format: 'dd-mm-yyyy'
  });

  $('#date').on('pick.datepicker', function (e) {
    // var time = getFullTime();
    var year = e.date.getFullYear() ;
    var month = AddZero(e.date.getMonth()+1);
    var day = AddZero(e.date.getDate()) ;
    // $( '#date' ).val(day + "-" + month + "-" + year + time);
    $( '#date' ).val(day + "-" + month + "-" + year);
    e.preventDefault();
  });
 </script>

@endsection