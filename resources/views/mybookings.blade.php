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
  p {
    margin-bottom: 20px
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
                  <h1>My bookings</h1>
               </div>
            </div>
         </div>
      </div>
      <div class="page-content">
         <div class="container datatab">
          @if ($bookings->count() > 0)
            <div class="row">
              <div class="cinq">
                <h3>Your next trip with {{$bookings[0]->tour->agency()->first()->name}} :</h3>
                <hr>
                <p>
                  <b>{{$bookings[0]->tour->title}}</b> <br>
                  {{$bookings[0]->tour->description}} <br>
                  <br>
                  Date : {{$bookings[0]->tour->date}} <br>
                  Duration : {{$bookings[0]->tour->duration}} <br>
                  Meeting point : {{$bookings[0]->tour->meetingpoint}} <br>
                  Places : {{$bookings[0]->places}} <br>
                  Name & phone : {{$bookings[0]->name}} - {{$bookings[0]->phone}}
                </p>
                <h3>Places to visit :</h3>
                <p>
                  {{$bookings[0]->tour->placestovisit}}
                </p>
                <h3>Other details :</h3>
                <p>
                  {{$bookings[0]->tour->details}}
                </p>
              </div>
              <div class="sept">
                <table style="margin: 10px 0px">
                  <thead>
                    <tr>
                      <th>Tour</th>
                      <th>Date</th>
                      <th>Meeting point</th>
                      <th>Places</th>
                      <th>Total paid</th>
                      <th>Tour details</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($bookings as $key => $booking)
                      <tr>
                        <td>{{$booking->tour->title}}</td>
                        <td>{{$booking->tour->date}}</td>
                        <td>{{$booking->tour->meetingpoint}}</td>
                        <td>{{$booking->places}}</td>
                        <td>{{$booking->total}} $</td>
                        <td><a href="/tour/{{$booking->tour->id}}">Details</a></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          @else 
            <div class="row">
              <p>
                You dont have any bookings yet !
              </p>
            </div>
          @endif
         </div>
      </div>
    </div>
 </div>
@endsection