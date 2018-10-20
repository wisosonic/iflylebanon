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
                  <h1>Add keywords</h1>
               </div>
            </div>
         </div>
      </div>
      <div class="page-content">
        <div class="container">
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
            <div class="row">
              <h3>Add a keyword</h3>
              <hr>
              <form action="" method="POST" id="addkeyword_form">
                {{ csrf_field() }}
                <input type="text" name="word" placeholder="Add a keyword" id="word">
              </form>
            </div>
            <div class="row">
              <button onclick="sendAddKkeywordForm(); return false;">Add keyword</button>
            </div>
          </div>
        </div>
      </div>
    </div>
 </div>

 <script src="/js/admin.js"></script>
 <script type="text/javascript">
   @if (Session::has('message'))
     @if (Session::get('message')=="adminexists") 
        swal({   
              title: "",   
              text: "This admin already exists !", 
              type: "warning",   
              confirmButtonColor: "#3f927e",   
              confirmButtonText: "Ok"
           });
      @elseif (Session::get('message')=="usernotfound") 
          swal({   
                title: "Something went wrong !",   
                text: "User not found !", 
                type: "error",   
                confirmButtonColor: "#3f927e",   
                confirmButtonText: "Ok"
             });
      @elseif (Session::get('message')=="adminadded") 
          swal({   
                title: "",   
                text: "Admin has been successfully added !", 
                type: "success",   
                confirmButtonColor: "#3f927e",   
                confirmButtonText: "Ok"
             });
      @endif
    @endif
 </script>

@endsection