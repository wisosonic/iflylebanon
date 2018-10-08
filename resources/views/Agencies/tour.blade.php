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
<link rel="stylesheet" type="text/css" href="/css/datatables.min.css"/>
<script type="text/javascript" src="/js/datatables.min.js"></script>

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
              <div class="neuf datatab">
                <div class="row">
                  <h2>Tour details</h2>
                  <table style="margin: 10px 0px">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Duration</th>
                        <th>Available places</th>
                        <th>Price / person</th>
                        <th>Meeting point</th>
                        <th>Agency</th>
                        <th>Contact</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{$tour->title}}</td>
                        <td>{{$tour->date}}</td>
                        <td>{{$tour->duration}}</td>
                        <td>{{$tour->availableplaces}}</td>
                        <td>{{$tour->price}} $</td>
                        <td>{{$tour->meetingpoint}}</td>
                        <td>{{$tour->agency()->first()->name}}</td>
                        <td>{{$tour->agency()->first()->phone}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <hr>
                <div class="row">
                  <h3>Description :</h3>
                  <p>
                    {{$tour->description}}
                  </p>
                </div>
                <hr>
                <div class="row">
                  <h3>Places to visit :</h3>
                  <p>
                    {{$tour->placestovisit}}
                  </p>
                </div>
                <hr>
                <div class="row">
                  <h3>Other details :</h3>
                  <p>
                    {{$tour->details}}
                  </p>
                </div>
                @if ($auth)
                  <hr>
                  <div class="row">
                    <h3>Tour bookings : {{$bookings->count()}}</h3>
                    <table style="margin: 10px 0px">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Visitor name</th>
                          <th>Date of booking</th>
                          <th>Places reserved</th>
                          <th>Total paid</th>
                          <th>Phone</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if ($bookings->count() > 0)
                          @foreach($bookings as $key => $booking)
                            <tr>
                              <td>{{$key+1}}</td>
                              <td>{{$booking->user()->first()->name}}</td>
                              <td>{{$booking->created_at}}</td>
                              <td>{{$booking->places}}</td>
                              <td>{{$booking->total}}</td>
                              <td>{{$booking->user()->first()->phone}} $</td>
                            </tr>
                          @endforeach
                        @else
                          <td colspan="6">There are no bookings for this tour !</td>
                        @endif
                      </tbody>
                    </table>
                  </div>
                @endif
              </div>
            </div>
         </div>
      </div>
    </div>
 </div>
@endsection