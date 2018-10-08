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

  input[type=name],
  input[type=phone],
  textarea {
    padding: 10px 10px;
    width: 100%;
    margin-bottom: 10px;
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
                  <h1>Booking</h1>
               </div>
            </div>
         </div>
      </div>
      <div class="page-content">
         <div class="container datatab">
          <div class="douze">
            <div class="row">
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
          </div>
           <div class="six">
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
           </div>
           <div class="six">
              <form action="" method="POST" id="booktour_form">
                {{ csrf_field() }}
                <input type="hidden" name="tour_id" value="{{$tour->id}}">
                <div class="row">
                  <h3>Contact :</h3>
                  <hr>
                  <div class="douze">
                    <label for="name">Name : *</label>
                  </div>
                  <div class="douze">
                    <input type="name" name="name" id="name" placeholder="Your name">
                  </div>
                </div>
                <div class="row">
                  <div class="douze">
                    <label for="name">Phone : *</label>
                  </div>
                  <div class="douze">
                    <input type="phone" name="phone" id="phone" placeholder="Your phone number">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="six"><label for="places">Number of places : *</label></div>
                  <div class="six">
                    <select style="width: 100%" id="places" name="places">
                      <option value="">-</option>
                      @for ($i=1; $i <= $tour->availableplaces ; $i++)
                        <option value="{{$i}}">{{$i}} places</option>
                      @endfor
                    </select>
                  </div>
                </div>
                <div style="text-align: right; margin-top: 30px" class="row">
                  <button onclick="sendBookingForm(); return false;">Validate & Book</button>
                </div>
               </form>
           </div>
         </div>
      </div>
    </div>
 </div>

 <script src="/js/bookings.js"></script>

@endsection