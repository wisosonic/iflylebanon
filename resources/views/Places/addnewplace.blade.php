@extends("general")

@section("content")
  <!-- Font Awesome Icon Library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/css/rating.css">
  <style>
    .checked {
        color: orange;
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
                     Add new place
                  </h1>
               </div>
            </div>
         </div>
      </div>
      <div class="page-content">
         <div class="container">
            <div class="col-md-6 full-width">
              <label for="title">Title : </label>
              <input type="text" name="title" id="title" placeholder="Title">
            </div >
            <div class="col-md-6 full-width">
              <label for="department">Department : </label>
              <input type="text" name="department" id="department" placeholder="Department">
            </div>
            <div class="col-md-12 full-width">
              <label for="description">Description : </label>
              <input type="text" name="description" id="description" placeholder="Description">
            </div>
         </div>
      </div>
   </div>

  </div>


@endsection