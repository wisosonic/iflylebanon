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
                  <h3>All tours :</h3>
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
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
                  <div class="tab-content">
                    <div class="tab-pane active" id="thisweek" role="tabpanel" aria-labelledby="thisweek-tab">
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
                            <th>Details</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if (count($thisweek)>0)
                            @foreach ($thisweek as $key => $tour)
                              <tr>
                                <td><a href="/agency/tour/{{$tour->id}}">{{$tour->title}}</a></td>
                                <td>{{$tour->date}}</td>
                                <td>{{$tour->duration}}</td>
                                <td>{{$tour->availableplaces}}</td>
                                <td>{{$tour->price}} $</td>
                                <td>{{$tour->meetingpoint}}</td>
                                <td>{{$tour->agency()->first()->name}}</td>
                                <td>{{$tour->agency()->first()->phone}}</td>
                                <td><a href="/agency/tour/{{$tour->id}}">Details</a></td>
                              </tr>
                            @endforeach
                          @else
                            <tr>
                              <td colspan="8">There are no available tours this week !</td>
                            </tr>
                          @endif
                        </tbody>
                        <tfoot>
                          <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Duration</th>
                            <th>Available places</th>
                            <th>Price / person</th>
                            <th>Meeting point</th>
                            <th>Agency</th>
                            <th>Contact</th>
                            <th>Details</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <div class="tab-pane" id="upcoming" role="tabpanel" aria-labelledby="upcoming-tab">
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
                            <th>Details</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if (count($upcoming)>0)
                            @foreach ($upcoming as $key => $tour)
                              <tr>
                                <td><a href="/agency/tour/{{$tour->id}}">{{$tour->title}}</a></td>
                                <td>{{$tour->date}}</td>
                                <td>{{$tour->duration}}</td>
                                <td>{{$tour->availableplaces}}</td>
                                <td>{{$tour->price}} $</td>
                                <td>{{$tour->meetingpoint}}</td>
                                <td>{{$tour->agency()->first()->name}}</td>
                                <td>{{$tour->agency()->first()->phone}}</td>
                                <td><a href="/agency/tour/{{$tour->id}}">Details</a></td>
                              </tr>
                            @endforeach
                          @else
                            <tr>
                              <td colspan="8">There are no upcoming tours !</td>
                            </tr>
                          @endif
                        </tbody>
                        <tfoot>
                          <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Duration</th>
                            <th>Available places</th>
                            <th>Price / person</th>
                            <th>Meeting point</th>
                            <th>Agency</th>
                            <th>Contact</th>
                            <th>Details</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <div class="tab-pane" id="ended" role="tabpanel" aria-labelledby="ended-tab">
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
                            <th>Details</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if (count($ended)>0)
                            @foreach ($ended as $key => $tour)
                              <tr>
                                <td><a href="/agency/tour/{{$tour->id}}">{{$tour->title}}</a></td>
                                <td>{{$tour->date}}</td>
                                <td>{{$tour->duration}}</td>
                                <td>{{$tour->availableplaces}}</td>
                                <td>{{$tour->price}} $</td>
                                <td>{{$tour->meetingpoint}}</td>
                                <td>{{$tour->agency()->first()->name}}</td>
                                <td>{{$tour->agency()->first()->phone}}</td>
                                <td><a href="/agency/tour/{{$tour->id}}">Details</a></td>
                              </tr>
                            @endforeach
                          @else
                            <tr>
                              <td colspan="8">There are no previous tours !</td>
                            </tr>
                          @endif
                        </tbody>
                        <tfoot>
                          <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Duration</th>
                            <th>Available places</th>
                            <th>Price / person</th>
                            <th>Meeting point</th>
                            <th>Agency</th>
                            <th>Contact</th>
                            <th>Details</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
         </div>
      </div>
    </div>
 </div>
@endsection