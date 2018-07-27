@extends("general")

@section("content")
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
           .carousel-inner > .item > img,
           .carousel-inner > .item > a > img {
               width: 70%;
               margin: auto;
           }
        </style>
        <div id="nb-menu-page" style="position: relative; z-index: 3;">
            <div id="sitecontainer">
               <script>
                  function updateShareBoxLinks(location) {
                    document.getElementById('share-box-title').innerText = location.getAttribute('data-title');
                    document.getElementById('share-box-fb').setAttribute("href", "http://www.facebook.com/sharer.php?u=" + location.getAttribute('data-link'));
                    document.getElementById('share-box-twitter').setAttribute("href", "http://twitter.com/home?status=" + location.getAttribute('data-title')
                        + "%20-%20" + location.getAttribute('data-link'));
                    document.getElementById('share-box-linkedin').setAttribute("href", "http://www.linkedin.com/shareArticle?mini=true&amp;url="
                        + location.getAttribute('data-link') + "&amp;title=" + location.getAttribute('data-title') + "&amp;source=I Fly Lebanon");
                    document.getElementById('share-box-pinterest').setAttribute("href", "http://pinterest.com/pin/create/button/?url="
                        + location.getAttribute('data-link') + "&amp;description=" + location.getAttribute('data-title'));
                    document.getElementById('share-box-google').setAttribute("href", "http://plus.google.com/share?url=" + location.getAttribute('data-link'));
                  }
               </script>
               <div id="share-box" class="zoom-anim-dialog mfp-hide">
                  <span class="share-subtitle tiny-details">Share</span>
                  <div class="title">
                     <h2 id="share-box-title"></h2>
                  </div>
                  <a id="share-box-fb" target="_blank" class="hint--bottom facebook-icon" data-hint="Share on Facebook">
                  <i class="fab fa-facebook-square"></i>
                  </a>
                  <a id="share-box-twitter" target="_blank" class="hint--bottom twitter-icon" data-hint="Share on Twitter">
                  <i class="fab fa-twitter-square"></i>
                  </a>
                  <a id="share-box-linkedin" target="_blank" class="hint--bottom linkedin-icon" data-hint="Share on LinkedIn">
                  <i class="fab fa-linkedin-square"></i>
                  </a>
                  <a id="share-box-pinterest" target="_blank" class="hint--bottom pinterest-icon" data-hint="Share on Pinterest">
                  <i class="fab fa-pinterest"></i>
                  </a>
                  <a id="share-box-google" target="_blank" class="hint--bottom googleplus-icon" data-hint="Share on Google+">
                  <i class="fab fa-google-plus-square"></i>
                  </a>
               </div>
               <div class="no-sections has-image no-tags page-content-wrapper title-white dark-section post-111 location type-location status-publish has-post-thumbnail hentry">
                  <div class="image-title-bg loading" style="padding-top: 90px;">
                     <div class="load-background-image fade-in" style="background-image: url({{$place->image}})">
                        <img src="{{$place->image}}" class="zero-opacity" onload="jQuery(this).parent().addClass(&#39;fade-in&#39;);">
                     </div>
                     <div class="overlay"></div>
                     <div class="container">
                        <div class="col-md-10 title-container col-md-offset-1 text-center">
                           <div class="categories badges">
                              <div class="clear"></div>
                           </div>
                           <div class="title">
                              <h1>
                                 {{$place->title}}
                              </h1>
                           </div>
                           <div class="subtitle">
                              <h2>By <a href="https://parposa.com/iflylebanon/author/rayannajjar26gmail-com/" title="Posts by iFly Team" rel="author">iFly Team</a></h2>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="page-content">
                     <div class="container">
                        <div class="col-md-8 col-md-offset-2 regular-width">
                           <div class="intro">
                              <h2>
                                 {{$place->description}}
                              </h2>
                           </div>
                           <div class="content">
                              <aside class="aside-left">Find your way to: <strong>{{$place->title}}</strong></aside>
                              <div class="col-md-12 full-width">
                                 <div class="tw-column tw-two-third tw-column-first ">
                                    <a class="themewich-lightbox no-ajaxy" href="https://maps.google.com/maps?&amp;z=12&amp;q={{$place->long}}+{{$place->lat}}&amp;ll={{$place->long}}+{{$place->lat}}">
                                       <div id="location-map-container" style="width: 100% !important; height: 300px !important; margin-right: 15px !important; position: relative; overflow: hidden;">
                                          <div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);">
                                             <div class="gm-style" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px;">
                                                <div tabindex="0" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; touch-action: pan-x pan-y;">
                                                   <div style="z-index: 1; position: absolute; left: 50%; top: 50%; transform: translate(0px, 0px);">
                                                      <div style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;">
                                                         <div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
                                                            <div style="position: absolute; z-index: 1; transform: matrix(1, 0, 0, 1, -84, -70);">
                                                               <div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px;">
                                                                  <div style="width: 256px; height: 256px;"></div>
                                                               </div>
                                                               <div style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px;">
                                                                  <div style="width: 256px; height: 256px;"></div>
                                                               </div>
                                                               <div style="position: absolute; left: -256px; top: -256px; width: 256px; height: 256px;">
                                                                  <div style="width: 256px; height: 256px;"></div>
                                                               </div>
                                                               <div style="position: absolute; left: 0px; top: -256px; width: 256px; height: 256px;">
                                                                  <div style="width: 256px; height: 256px;"></div>
                                                               </div>
                                                               <div style="position: absolute; left: 256px; top: -256px; width: 256px; height: 256px;">
                                                                  <div style="width: 256px; height: 256px;"></div>
                                                               </div>
                                                               <div style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px;">
                                                                  <div style="width: 256px; height: 256px;"></div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div>
                                                      <div style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div>
                                                      <div style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;">
                                                         <div style="position: absolute; left: 0px; top: 0px; z-index: -1;">
                                                            <div style="position: absolute; z-index: 1; transform: matrix(1, 0, 0, 1, -84, -70);">
                                                               <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: 0px;"></div>
                                                               <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px; top: 0px;"></div>
                                                               <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px; top: -256px;"></div>
                                                               <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: -256px;"></div>
                                                               <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: -256px;"></div>
                                                               <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: 0px;"></div>
                                                            </div>
                                                         </div>
                                                         <div style="width: 27px; height: 43px; overflow: hidden; position: absolute; left: -14px; top: -43px; z-index: 0;"><img alt="" src="./Afqa Waterfall - I Fly Lebanon_files/spotlight-poi2.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 27px; height: 43px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                                      </div>
                                                      <div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
                                                         <div style="position: absolute; z-index: 1; transform: matrix(1, 0, 0, 1, -84, -70);">
                                                            <div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px;"><img draggable="false" alt="" src="./Afqa Waterfall - I Fly Lebanon_files/vt" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                                            <div style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px;"><img draggable="false" alt="" src="./Afqa Waterfall - I Fly Lebanon_files/vt(1)" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                                            <div style="position: absolute; left: -256px; top: -256px; width: 256px; height: 256px;"><img draggable="false" alt="" src="./Afqa Waterfall - I Fly Lebanon_files/vt(2)" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                                            <div style="position: absolute; left: 0px; top: -256px; width: 256px; height: 256px;"><img draggable="false" alt="" src="./Afqa Waterfall - I Fly Lebanon_files/vt(3)" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                                            <div style="position: absolute; left: 256px; top: -256px; width: 256px; height: 256px;"><img draggable="false" alt="" src="./Afqa Waterfall - I Fly Lebanon_files/vt(4)" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                                            <div style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px;"><img draggable="false" alt="" src="./Afqa Waterfall - I Fly Lebanon_files/vt(5)" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="gm-style-pbc" style="z-index: 2; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; opacity: 0;">
                                                      <p class="gm-style-pbt"></p>
                                                   </div>
                                                   <div style="z-index: 3; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; touch-action: pan-x pan-y;">
                                                      <div style="z-index: 1; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px;"></div>
                                                      <div style="z-index: 4; position: absolute; left: 50%; top: 50%; transform: translate(0px, 0px);">
                                                         <div style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div>
                                                         <div style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div>
                                                         <div style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;">
                                                            <div class="gmnoprint" style="width: 27px; height: 43px; overflow: hidden; position: absolute; opacity: 0.01; left: -14px; top: -43px; z-index: 0;">
                                                               <img alt="" src="./Afqa Waterfall - I Fly Lebanon_files/spotlight-poi2.png" draggable="false" usemap="#gmimap0" style="position: absolute; left: 0px; top: 0px; width: 27px; height: 43px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                               <map name="gmimap0" id="gmimap0">
                                                                  <area log="miw" coords="13.5,0,4,3.75,0,13.5,13.5,43,27,13.5,23,3.75" shape="poly" title="" style="cursor: pointer; touch-action: none;">
                                                               </map>
                                                            </div>
                                                         </div>
                                                         <div style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <iframe frameborder="0" style="z-index: -1; position: absolute; width: 100%; height: 100%; top: 0px; left: 0px; border: none;" src="./Afqa Waterfall - I Fly Lebanon_files/saved_resource.html"></iframe>
                                                <div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;">
                                                   <a target="_blank" rel="noopener" href="https://maps.google.com/maps?ll=34.069167,35.8883&amp;z=12&amp;t=m&amp;hl=en-US&amp;gl=US&amp;mapclient=apiv3" title="Click to see this area on Google Maps" style="position: static; overflow: visible; float: none; display: inline;">
                                                      <div style="width: 66px; height: 26px; cursor: pointer;">
                                                         <img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/google4.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; user-select: none; border: 0px; padding: 0px; margin: 0px;">
                                                      </div>
                                                   </a>
                                                </div>
                                                <div style="background-color: white; padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 256px; height: 148px; position: absolute; left: 79px; top: 60px;">
                                                   <div style="padding: 0px 0px 10px; font-size: 16px;">Map Data</div>
                                                   <div style="font-size: 13px;">Map data ©2018 Google, ORION-ME</div>
                                                   <div style="width: 13px; height: 13px; overflow: hidden; position: absolute; opacity: 0.7; right: 12px; top: 12px; z-index: 10000; cursor: pointer;">
                                                      <img alt="" src="./Afqa Waterfall - I Fly Lebanon_files/mapcnt6.png" draggable="false" style="position: absolute; left: -2px; top: -336px; width: 59px; height: 492px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                   </div>
                                                </div>
                                                <div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 166px; bottom: 0px; width: 172px;">
                                                   <div draggable="false" class="gm-style-cc" style="user-select: none; height: 14px; line-height: 14px;">
                                                      <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                                         <div style="width: 1px;"></div>
                                                         <div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div>
                                                      </div>
                                                      <div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
                                                         <a style="text-decoration: none; cursor: pointer; display: none;">Map Data</a>
                                                         <span>Map data ©2018 Google, ORION-ME</span>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;">
                                                   <div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">
                                                      Map data ©2018 Google, ORION-ME
                                                   </div>
                                                </div>
                                                <div class="gmnoprint gm-style-cc" draggable="false" style="z-index: 1000001; user-select: none; height: 14px; line-height: 14px; position: absolute; right: 95px; bottom: 0px;">
                                                   <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                                      <div style="width: 1px;"></div>
                                                      <div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div>
                                                   </div>
                                                   <div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
                                                      <a href="https://www.google.com/intl/en-US_US/help/terms_maps.html" target="_blank" rel="noopener" style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);">Terms of Use</a>
                                                   </div>
                                                </div>
                                                <button draggable="false" title="Toggle fullscreen view" aria-label="Toggle fullscreen view" type="button" style="background: none rgb(255, 255, 255); border: 0px; margin: 10px 14px; padding: 0px; position: absolute; cursor: pointer; user-select: none; width: 25px; height: 25px; overflow: hidden; top: 0px; right: 0px;">
                                                   <img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/sv9.png" draggable="false" class="gm-fullscreen-control" style="position: absolute; left: -52px; top: -86px; width: 164px; height: 175px; user-select: none; border: 0px; padding: 0px; margin: 0px;">
                                                </button>
                                                <div draggable="false" class="gm-style-cc" style="user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;">
                                                   <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                                      <div style="width: 1px;"></div>
                                                      <div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div>
                                                   </div>
                                                   <div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
                                                      <a target="_blank" rel="noopener" title="Report errors in the road map or imagery to Google" href="https://www.google.com/maps/@34.0691667,35.8882998,12z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); text-decoration: none; position: relative;">Report a map error</a>
                                                   </div>
                                                </div>
                                                <div class="gmnoprint gm-bundled-control gm-bundled-control-on-bottom" draggable="false" controlwidth="28" controlheight="93" style="margin: 10px; user-select: none; position: absolute; bottom: 107px; right: 28px;">
                                                   <div class="gmnoprint" controlwidth="28" controlheight="55" style="position: absolute; left: 0px; top: 38px;">
                                                      <div draggable="false" style="user-select: none; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; cursor: pointer; background-color: rgb(255, 255, 255); width: 28px; height: 55px;">
                                                         <button draggable="false" title="Zoom in" aria-label="Zoom in" type="button" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; position: relative; cursor: pointer; user-select: none; width: 28px; height: 27px; top: 0px; left: 0px;">
                                                            <div style="overflow: hidden; position: absolute; width: 15px; height: 15px; left: 7px; top: 6px;">
                                                               <img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl.png" draggable="false" style="position: absolute; left: 0px; top: 0px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 120px; height: 54px;">
                                                            </div>
                                                         </button>
                                                         <div style="position: relative; overflow: hidden; width: 67%; height: 1px; left: 16%; background-color: rgb(230, 230, 230); top: 0px;"></div>
                                                         <button draggable="false" title="Zoom out" aria-label="Zoom out" type="button" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; position: relative; cursor: pointer; user-select: none; width: 28px; height: 27px; top: 0px; left: 0px;">
                                                            <div style="overflow: hidden; position: absolute; width: 15px; height: 15px; left: 7px; top: 6px;">
                                                               <img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl.png" draggable="false" style="position: absolute; left: 0px; top: -15px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 120px; height: 54px;">
                                                            </div>
                                                         </button>
                                                      </div>
                                                   </div>
                                                   <div class="gm-svpc" controlwidth="28" controlheight="28" style="background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; width: 28px; height: 28px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; touch-action: none; position: absolute; left: 0px; top: 0px;">
                                                      <div style="position: absolute; left: 1px; top: 1px;"></div>
                                                      <div style="position: absolute; left: 1px; top: 1px;">
                                                         <div aria-label="Street View Pegman Control" style="width: 26px; height: 26px; overflow: hidden; position: absolute; left: 0px; top: 0px;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png" draggable="false" style="position: absolute; left: -147px; top: -26px; width: 215px; height: 835px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                                         <div aria-label="Pegman is on top of the Map" style="width: 26px; height: 26px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png" draggable="false" style="position: absolute; left: -147px; top: -52px; width: 215px; height: 835px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                                         <div aria-label="Street View Pegman Control" style="width: 26px; height: 26px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png" draggable="false" style="position: absolute; left: -147px; top: -78px; width: 215px; height: 835px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                                      </div>
                                                   </div>
                                                   <div class="gmnoprint" controlwidth="28" controlheight="0" style="display: none; position: absolute;">
                                                      <div title="Rotate map 90 degrees" style="width: 28px; height: 28px; overflow: hidden; position: absolute; background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; cursor: pointer; display: none;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl4.png" draggable="false" style="position: absolute; left: -141px; top: 6px; width: 170px; height: 54px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                                         <div class="gm-tilt" style="width: 28px; height: 28px; overflow: hidden; position: absolute; background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; top: 0px; cursor: pointer;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl4.png" draggable="false" style="position: absolute; left: -141px; top: -13px; width: 170px; height: 54px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                                      </div>
                                                </div>
                                                <div class="gmnoprint" style="margin: 10px; z-index: 0; position: absolute; cursor: pointer; left: 0px; top: 0px;">
                                                      <div class="gm-style-mtc" style="float: left; position: relative;">
                                                         <div role="button" tabindex="0" title="Show street map" aria-label="Show street map" aria-pressed="true" draggable="false" style="direction: ltr; overflow: hidden; text-align: center; position: relative; color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; user-select: none; font-size: 11px; background-color: rgb(255, 255, 255); padding: 8px; border-bottom-left-radius: 2px; border-top-left-radius: 2px; background-clip: padding-box; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; min-width: 22px; font-weight: 500;">Map</div>
                                                         <div style="background-color: white; z-index: -1; padding: 2px; border-bottom-left-radius: 2px; border-bottom-right-radius: 2px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; position: absolute; left: 0px; top: 29px; text-align: left; display: none;">
                                                            <div draggable="false" title="Show street map with terrain" style="color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; user-select: none; font-size: 11px; background-color: rgb(255, 255, 255); padding: 6px 8px 6px 6px; direction: ltr; text-align: left; white-space: nowrap;">
                                                               <span role="checkbox" style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; background-color: rgb(255, 255, 255); border: 1px solid rgb(198, 198, 198); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle;">
                                                                  <div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden; display: none;"><img alt="" src="https://maps.gstatic.com/mapfiles/mv/imgs8.png" draggable="false" style="position: absolute; left: -52px; top: -44px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 68px; height: 67px;"></div>
                                                               </span>
                                                               <label style="vertical-align: middle; cursor: pointer;">Terrain</label>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="gm-style-mtc" style="float: left; position: relative;">
                                                         <div role="button" tabindex="0" title="Show satellite imagery" aria-label="Show satellite imagery" aria-pressed="false" draggable="false" style="direction: ltr; overflow: hidden; text-align: center; position: relative; color: rgb(86, 86, 86); font-family: Roboto, Arial, sans-serif; user-select: none; font-size: 11px; background-color: rgb(255, 255, 255); padding: 8px; border-bottom-right-radius: 2px; border-top-right-radius: 2px; background-clip: padding-box; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; min-width: 40px; border-left: 0px;">Satellite</div>
                                                         <div style="background-color: white; z-index: -1; padding: 2px; border-bottom-left-radius: 2px; border-bottom-right-radius: 2px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; position: absolute; right: 0px; top: 29px; text-align: left; display: none;">
                                                            <div draggable="false" title="Show imagery with street names" style="color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; user-select: none; font-size: 11px; background-color: rgb(255, 255, 255); padding: 6px 8px 6px 6px; direction: ltr; text-align: left; white-space: nowrap;">
                                                               <span role="checkbox" style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; background-color: rgb(255, 255, 255); border: 1px solid rgb(198, 198, 198); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle;">
                                                                  <div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden;"><img alt="" src="https://maps.gstatic.com/mapfiles/mv/imgs8.png" draggable="false" style="position: absolute; left: -52px; top: -44px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 68px; height: 67px;"></div>
                                                               </span>
                                                               <label style="vertical-align: middle; cursor: pointer;">Labels</label>
                                                            </div>
                                                         </div>
                                                      </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </a>
                                 </div>
                                 <div class="tw-column tw-one-third tw-column-last location-info-container">
                                    <h4 class="place-name">{{$place->department}}</h4>
                                    <i class="fab fa-facebook-f"></i> Facebook</a> <a target="_blank" href="https://parposa.com/iflylebanon/location/afqa-waterfall/#" class="social-link" title="Twitter"></a>
                                    <i class="fab fa-instagram"></i> Instagram</a> <a target="_blank" href="https://parposa.com/iflylebanon/location/afqa-waterfall/#" class="social-link" title="Google"></a>
                                    <i class="fab fa-google-plus-g"></i> Google</a> <a target="_blank" href="https://parposa.com/iflylebanon/location/afqa-waterfall/#" class="social-link" title="Pinterest"></a>
                                 </div>
                                 <div class="clear"></div>
                              </div>
                              {{$place->text}}
                              <style type="text/css">
                                 #gallery-1 .gallery-item {
                                 float: left;
                                 margin-top: 10px;
                                 }
                                 #gallery-1 .gallery-caption {
                                 margin-left: 0;
                                 }
                              </style>
                              <div class="single-slideshow gallery-wrap info pager no-autoplay" style="background: none;">
                                 <div class="bx-wrapper" style="max-width: 100%;">
                                    <div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 523px;">
                                       <ul id="gallery-1" class="bxslider gallery galleryid-111 gallery-columns-3 gallery-size-fullslideshownc pager nocaption nolink slideshow contentslideshow " style="width: auto; position: absolute; opacity: 1;">
                                          <li class="gallery-icon linked" style="float: none; list-style: none; position: absolute; width: 730px; z-index: 50; display: block;"><a href="./Afqa Waterfall - I Fly Lebanon_files/chellel-afka2_HDR2-1.jpg" class="lightbox-gallery no-ajaxy"><img src="./Afqa Waterfall - I Fly Lebanon_files/chellel-afka2_HDR2-1.jpg" class="attachment-fullslideshownc size-fullslideshownc" alt="" title="chellel afka2_HDR2" srcset="https://parposa.com/iflylebanon/wp-content/uploads/2018/05/chellel-afka2_HDR2-1.jpg 800w, https://parposa.com/iflylebanon/wp-content/uploads/2018/05/chellel-afka2_HDR2-1-300x215.jpg 300w, https://parposa.com/iflylebanon/wp-content/uploads/2018/05/chellel-afka2_HDR2-1-768x550.jpg 768w, https://parposa.com/iflylebanon/wp-content/uploads/2018/05/chellel-afka2_HDR2-1-740x530.jpg 740w, https://parposa.com/iflylebanon/wp-content/uploads/2018/05/chellel-afka2_HDR2-1-540x387.jpg 540w" sizes="(max-width: 800px) 100vw, 800px"></a></li>
                                          <li class="gallery-icon linked" style="float: none; list-style: none; position: absolute; width: 730px; z-index: 0; display: none;"><a href="./Afqa Waterfall - I Fly Lebanon_files/14844419.jpg" class="lightbox-gallery no-ajaxy"><img src="./Afqa Waterfall - I Fly Lebanon_files/14844419.jpg" class="attachment-fullslideshownc size-fullslideshownc" alt="" title="" srcset="https://parposa.com/iflylebanon/wp-content/uploads/2018/05/14844419.jpg 840w, https://parposa.com/iflylebanon/wp-content/uploads/2018/05/14844419-300x164.jpg 300w, https://parposa.com/iflylebanon/wp-content/uploads/2018/05/14844419-768x421.jpg 768w, https://parposa.com/iflylebanon/wp-content/uploads/2018/05/14844419-740x405.jpg 740w, https://parposa.com/iflylebanon/wp-content/uploads/2018/05/14844419-540x296.jpg 540w" sizes="(max-width: 840px) 100vw, 840px"></a></li>
                                          <li class="gallery-icon linked" style="float: none; list-style: none; position: absolute; width: 730px; z-index: 0; display: none;"><a href="./Afqa Waterfall - I Fly Lebanon_files/de7b7fe6af539e7c28ba4225ae43ed62.jpg" class="lightbox-gallery no-ajaxy"><img src="./Afqa Waterfall - I Fly Lebanon_files/de7b7fe6af539e7c28ba4225ae43ed62.jpg" class="attachment-fullslideshownc size-fullslideshownc" alt="" title="" srcset="https://parposa.com/iflylebanon/wp-content/uploads/2018/05/de7b7fe6af539e7c28ba4225ae43ed62.jpg 870w, https://parposa.com/iflylebanon/wp-content/uploads/2018/05/de7b7fe6af539e7c28ba4225ae43ed62-300x225.jpg 300w, https://parposa.com/iflylebanon/wp-content/uploads/2018/05/de7b7fe6af539e7c28ba4225ae43ed62-768x576.jpg 768w, https://parposa.com/iflylebanon/wp-content/uploads/2018/05/de7b7fe6af539e7c28ba4225ae43ed62-740x555.jpg 740w, https://parposa.com/iflylebanon/wp-content/uploads/2018/05/de7b7fe6af539e7c28ba4225ae43ed62-540x405.jpg 540w" sizes="(max-width: 870px) 100vw, 870px"></a></li>
                                          <li class="gallery-icon linked" style="float: none; list-style: none; position: absolute; width: 730px; z-index: 0; display: none;"><a href="./Afqa Waterfall - I Fly Lebanon_files/14844429.jpg" class="lightbox-gallery no-ajaxy"><img src="./Afqa Waterfall - I Fly Lebanon_files/14844429.jpg" class="attachment-fullslideshownc size-fullslideshownc" alt="" title="" srcset="https://parposa.com/iflylebanon/wp-content/uploads/2018/05/14844429.jpg 840w, https://parposa.com/iflylebanon/wp-content/uploads/2018/05/14844429-300x164.jpg 300w, https://parposa.com/iflylebanon/wp-content/uploads/2018/05/14844429-768x421.jpg 768w, https://parposa.com/iflylebanon/wp-content/uploads/2018/05/14844429-740x405.jpg 740w, https://parposa.com/iflylebanon/wp-content/uploads/2018/05/14844429-540x296.jpg 540w" sizes="(max-width: 840px) 100vw, 840px"></a></li>
                                       </ul>
                                    </div>
                                    <div class="bx-controls bx-has-controls-direction bx-has-pager" style="opacity: 1;">
                                       <div class="bx-controls-direction"><a class="bx-prev" href="https://parposa.com/iflylebanon/location/afqa-waterfall/">Prev</a><a class="bx-next" href="https://parposa.com/iflylebanon/location/afqa-waterfall/">Next</a></div>
                                       <div class="bx-pager bx-default-pager">
                                          <div class="bx-pager-item"><a href="https://parposa.com/iflylebanon/location/afqa-waterfall/" data-slide-index="0" class="bx-pager-link active">1</a></div>
                                          <div class="bx-pager-item"><a href="https://parposa.com/iflylebanon/location/afqa-waterfall/" data-slide-index="1" class="bx-pager-link">2</a></div>
                                          <div class="bx-pager-item"><a href="https://parposa.com/iflylebanon/location/afqa-waterfall/" data-slide-index="2" class="bx-pager-link">3</a></div>
                                          <div class="bx-pager-item"><a href="https://parposa.com/iflylebanon/location/afqa-waterfall/" data-slide-index="3" class="bx-pager-link">4</a></div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="clear"></div>
                              </div>
                              <div class="clear"></div>
                           </div>
                           <div class="sharing badges section-buttons v-item">
                              <a href="https://parposa.com/iflylebanon/location/afqa-waterfall/#share-box" onclick="updateShareBoxLinks(this);" data-title="Afqa Waterfall" data-link="https://parposa.com/iflylebanon/location/afqa-waterfall/" class="location-actions open-popup-link post-share share popup-with-move-anim">
                              <i class="fa fa-share"></i>
                              <span class="sharetitle">Share</span>
                              </a>
                              <a href="https://parposa.com/iflylebanon/location/afqa-waterfall/" class="location-actions post-like love">
                              <i class="fa fa-heart"></i>
                              <span class="sharetitle">Like</span></a>
                           </div>
                           <div id="disqus_thread">
                              <div width=730 class="fb-comments" data-href="{{$place->commentsurl}}" data-numposts="5"></div>
                              <div id="fb-root"></div>
                                 <script>(function(d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                      if (d.getElementById(id)) return;
                                      js = d.createElement(s); js.id = id;
                                      js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0';
                                      fjs.parentNode.insertBefore(js, fjs);
                                    }(document, 'script', 'facebook-jssdk'));
                                 </script>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <script>
                  // Initialize and add the map
                  function initMap() {
                    // The location of Uluru
                    var uluru = {lat: {{$place->long}}, lng: {{$place->lat}}};
                    // The map, centered at Uluru
                    var map = new google.maps.Map(
                        document.getElementById('location-map-container'), {zoom: 12, center: uluru});
                    // The marker, positioned at Uluru
                    var marker = new google.maps.Marker({position: uluru, map: map});
                  }
               </script>
               <script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3aGdyqH7NbsyHOm5V5_wEjKya7DG1FwI&callback=initMap"></script>
            </div>
            @if (count($related)>0)
               <div class="container">
                 <br>
                 <div id="myCarousel" class="carousel slide" data-ride="carousel">
                   <!-- Indicators -->
                   <ol class="carousel-indicators">
                     <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                     <li data-target="#myCarousel" data-slide-to="1"></li>
                     <li data-target="#myCarousel" data-slide-to="2"></li>
                     <li data-target="#myCarousel" data-slide-to="3"></li>
                   </ol>

                   <!-- Wrapper for slides -->
                   <div class="carousel-inner" role="listbox">

                     <div class="item active">
                       <img src="img_chania.jpg" alt="Chania" width="460" height="345">
                       <div class="carousel-caption">
                         <h3>Chania</h3>
                         <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
                       </div>
                     </div>

                     <div class="item">
                       <img src="img_chania2.jpg" alt="Chania" width="460" height="345">
                       <div class="carousel-caption">
                         <h3>Chania</h3>
                         <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
                       </div>
                     </div>
                   
                     <div class="item">
                       <img src="img_flower.jpg" alt="Flower" width="460" height="345">
                       <div class="carousel-caption">
                         <h3>Flowers</h3>
                         <p>Beautiful flowers in Kolymbari, Crete.</p>
                       </div>
                     </div>

                     <div class="item">
                       <img src="img_flower2.jpg" alt="Flower" width="460" height="345">
                       <div class="carousel-caption">
                         <h3>Flowers</h3>
                         <p>Beautiful flowers in Kolymbari, Crete.</p>
                       </div>
                     </div>
                 
                   </div>

                   <!-- Left and right controls -->
                   <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                     <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                     <span class="sr-only">Previous</span>
                   </a>
                   <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                     <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                     <span class="sr-only">Next</span>
                   </a>
                 </div>
               </div>
            @endif
         </div>

      </div>
      <div id="nb-menu-blocker" class="nb-fixed"></div>
      <iframe style="display: none;" src="./Afqa Waterfall - I Fly Lebanon_files/saved_resource(2).html"></iframe>
@endsection