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
                     All tours
                  </h1>
               </div>
            </div>
         </div>
      </div>
      <div class="page-content">
         <div class="container datatab">
            <div class="row">
              <!-- Nav tabs -->
              <ul style="margin-bottom: 20px"  class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item active">
                  <a class="nav-link" id="thisweek-tab" data-toggle="tab" href="#thisweek" role="tab" aria-controls="thisweek" aria-selected="true">This week ({{count($thisweek)}})</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="upcoming-tab" data-toggle="tab" href="#upcoming" role="tab" aria-controls="upcoming" aria-selected="true">Upcoming ({{count($upcoming)}})</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="ended-tab" data-toggle="tab" href="#ended" role="tab" aria-controls="ended" aria-selected="true">Ended ({{count($ended)}})</a>
                </li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active" id="thisweek" role="tabpanel" aria-labelledby="thisweek-tab">
                  @if (count($thisweek)>0)
                    @foreach ($thisweek as $key => $tour)
                      <div class="row">
                        <div class="six">
                          <h3><a href="/tour/{{$tour->id}}">{{$tour->title}}</a></h3>
                          <p>
                            Date & time : {{$tour->date}} <br>
                            Duration : {{$tour->duration}} <br>
                            @if ($tour->availableplaces > 5)
                              Available places : <b style="color:green">{{$tour->availableplaces}}</b> <br>
                            @elseif ($tour->availableplaces == 1)
                              Available places : <b style="color:red">only {{$tour->availableplaces}} place is available !</b> <br>
                            @else
                              Available places : <b style="color:red">only {{$tour->availableplaces}} places are available !</b> <br>
                            @endif
                            Agency & contact : <b> {{$tour->agency()->first()->name}} </b> - {{$tour->agency()->first()->phone}}
                          </p>
                        </div>
                        <div class="deux">
                          <b> {{$tour->price}} $ / place </b>
                        </div>
                        <div class="deux">
                          <a href="/tour/{{$tour->id}}">Details</a>
                        </div>
                        <div class="deux">
                          @if (Auth::user() && !Auth::user()->blacklist()->first() )
                            <button onclick="bookTour('{{$tour->id}}'); return false;" >Book now !</button>
                          @endif
                        </div>
                      </div>
                      <hr>
                    @endforeach
                  @else
                    There are no available tours this week !
                  @endif
                </div>
                <div class="tab-pane" id="upcoming" role="tabpanel" aria-labelledby="upcoming-tab">
                  @if (count($upcoming)>0)
                    @foreach ($upcoming as $key => $tour)
                      <div class="row">
                        <div class="six">
                          <h3><a href="/tour/{{$tour->id}}">{{$tour->title}}</a></h3>
                          <p>
                            Date & time : {{$tour->date}} <br>
                            Duration : {{$tour->duration}} <br>
                            @if ($tour->availableplaces > 5)
                              Available places : <b style="color:green">{{$tour->availableplaces}}</b> <br>
                            @elseif ($tour->availableplaces == 1)
                              Available places : <b style="color:red">only {{$tour->availableplaces}} place is available !</b> <br>
                            @else
                              Available places : <b style="color:red">only {{$tour->availableplaces}} places are available !</b> <br>
                            @endif
                            Agency & contact : <b> {{$tour->agency()->first()->name}} </b> - {{$tour->agency()->first()->phone}}
                          </p>
                        </div>
                        <div class="deux">
                          <b> {{$tour->price}} $ / place </b>
                        </div>
                        <div class="deux">
                          <a href="/tour/{{$tour->id}}">Details</a>
                        </div>
                        <div class="deux">
                          @if (Auth::user() && !Auth::user()->blacklist()->first() )
                            <button onclick="bookTour('{{$tour->id}}'); return false;" >Book now !</button>
                          @endif
                        </div>
                      </div>
                      <hr>
                    @endforeach
                  @else
                    There are no upcoming tours !
                  @endif
                </div>
                <div class="tab-pane" id="ended" role="tabpanel" aria-labelledby="ended-tab">
                  @if (count($ended)>0)
                    @foreach ($ended as $key => $tour)
                      <div class="row">
                        <div class="six">
                          <h3><a href="/tour/{{$tour->id}}">{{$tour->title}}</a></h3>
                          <p>
                            Date & time : {{$tour->date}} <br>
                            Duration : {{$tour->duration}} <br>
                            Agency & contact : <b> {{$tour->agency()->first()->name}} </b> - {{$tour->agency()->first()->phone}}
                          </p>
                        </div>
                        <div class="deux">
                          <b> {{$tour->price}} $ / place </b>
                        </div>
                        <div class="deux">
                          <a href="/tour/{{$tour->id}}">Details</a>
                        </div>
                        <div class="deux">
                          <b> Ended </b>
                        </div>
                      </div>
                      <hr>
                    @endforeach
                  @else
                    There are no previous tours !
                  @endif
                </div>
              </div>
            </div>
         </div>
      </div>
 </div>

 <script type="text/javascript">
   function bookTour(id) {
    window.location.href = "/book-tour/"+id;
   }
 </script>

@endsection