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
                  <h1>Activate agency</h1>
               </div>
            </div>
         </div>
      </div>
      <div class="page-content">
        <div class="container">
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
               <li class="page_item page-item-5 current_page_item"><a href="/admin/all-whitelists">User whitelist</a></li>
               <li class="page_item page-item-5 current_page_item"><a href="/admin/add-to-whitelist">Add to whitelist</a></li>
            </ul>
          </div>
          <div class="neuf">
            <div class="row">
              <div class="six">
                <h3>Activate agency</h3>
                <hr>
                <form action="" method="POST" id="activateagancy_form">
                  {{ csrf_field() }}
                  @if ($agencies->count() > 0)
                    <select name="agency_id" id="agency_id">
                      <option value="">Select an agency</option>
                      @foreach ($agencies as $key => $agency)
                        <option value="{{$agency->id}}">{{$agency->name}} - {{$agency->phone}}</option>
                      @endforeach
                    </select>
                    <button onclick="sendActivateAgencyForm(); return false;">Activate</button>
                  @else 
                    There are no agencies to activate !
                  @endif
                </form>
              </div>
              <div class="six">
                <h3>Already ativated agencies</h3>
                <hr>
                @if ($activated->count() > 0)
                  @foreach ($activated as $key => $agency)
                    <div class="six">
                      {{$agency->name}} - {{$agency->phone}}
                    </div>
                    <div style="text-align: right" class="six">
                      <i>{{$agency->user()->name}}</i>
                    </div>
                    <hr>
                  @endforeach
                @else 
                  <p>
                    There are no activated agencies !
                  </p>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 </div>

 <script src="/js/admin.js"></script>
 <script type="text/javascript">
   @if (Session::has('message'))
     @if (Session::get('message')=="agencyactivated") 
        swal({   
              title: "",   
              text: "Agency has been successfully activated", 
              type: "success",   
              confirmButtonColor: "#3f927e",   
              confirmButtonText: "Ok"
           });
      @elseif (Session::get('message')=="agencynotfound") 
          swal({   
                title: "Something went wrong !",   
                text: "Agency not found !", 
                type: "error",   
                confirmButtonColor: "#3f927e",   
                confirmButtonText: "Ok"
             });
      @endif
    @endif
 </script>

@endsection