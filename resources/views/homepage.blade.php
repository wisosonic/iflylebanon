@extends("general")

@section("content")

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
        <div id="fullpage-wrapper">
           <div id="fullpage" class="scrolling-auto animations-on fullpage-show home-page">
              <section id="section-1" class="section text-image-section section-1 no-image nav-overlayimage-background layout-left dark-section" data-section="1" data-title="Afqa Waterfall" style="background-image:url(/images/places/afqa_roman__bridges_from_below_by_alanove-d9ub7sp-1.jpg);">
                 <a name="section-1"></a>
                 <div class="overlay" style="background:#000000; opacity:0.15; filter:alpha(opacity=15); "></div>
                 <div class="container">
                    <div class="section-entry">
                       <div class="text-image-wrapper">
                          <div class="col-md-6 text-cell">
                             <div class="text-layout-inner">
                                <a href="https://maps.google.com/maps?&z=12&q=34.0691667+35.8882998&ll=34.0691667+35.8882998" target="_blank" class="fa-icon-link themewich-lightbox no-ajaxy" title="Location On Map">
                                   <div class="v-item subtitle tiny-details black-text-shadow">
                                      <i class="fas fa-map-marker-alt" style="font-size: 1.3em !important;"></i> Jbeil 
                                   </div>
                                </a>
                                <div class="v-item title">
                                   <h2 class="black-text-shadow">1 - Afqa Waterfall</h2>
                                </div>
                                <div class="section-buttons v-item social-media-links hidden-xs">
                                   <a target="_blank" href="#" class="social-link" title="Facebook">
                                   <i class="fab fa-facebook-f"></i></a> <a target="_blank" href="#" class="social-link" title="Twitter">
                                   <i class="fab fa-twitter"></i></a> <a target="_blank" href="#" class="social-link" title="Instagram">
                                   <i class="fab fa-instagram"></i></a> <a target="_blank" href="#" class="social-link" title="Google">
                                   <i class="fab fa-google-plus-g"></i></a> <a target="_blank" href="#" class="social-link" title="Pinterest">
                                   <i class="fab fa-pinterest-p"></i></a> 
                                </div>
                                <hr class="v-item title-divider" data-width="100px" />
                                <div class="v-item content black-text-shadow">Distinguished for its colossal grotto. Afqa is a rectangular-prism-shaped from a distance the cave appears like a mouth opening and bursts forth with a gushing waterfall that feeds into Nahr Ibrahim. </div>
                                <div class="sharing badges section-buttons v-item">
                                   <a href="/location/afqa-waterfall/" class="location-actions popup-with-move-anim">
                                   <i class="fas fa-info"></i>
                                   <span class="sharetitle">More</span></a>
                                   <a href="#share-box" onclick="updateShareBoxLinks(this);" data-title="Afqa Waterfall" data-link="./location/afqa-waterfall/" class="location-actions open-popup-link post-share share popup-with-move-anim">
                                   <i class="fa fa-share"></i>
                                   <span class="sharetitle">Share</span>
                                   </a>
                                   <a href="/location/afqa-waterfall/" class="location-actions post-like love">
                                   <i class="fa fa-heart"></i>
                                   <span class="sharetitle">Like</span></a>
                                </div>
                             </div>
                             <div class="clear"></div>
                          </div>
                          <div class="clear"></div>
                       </div>
                    </div>
                 </div>
                 <a href="#section-2" class="nextbutton nobg scroll-animate next-section-link">
                 <span>Next Section </span> </a>
                 <div class="credits tiny-details black-text-shadow">
                    Image by john
                 </div>
              </section>
              <section id="section-2" class="section text-image-section section-2 no-image nav-overlayimage-background layout-left dark-section" data-section="2" data-title="Phoenician wall" style="background-image:url(/images/places/sour_12-1.jpg);">
                 <a name="section-2"></a>
                 <div class="overlay" style="background:#000000; opacity:0; filter:alpha(opacity=); "></div>
                 <div class="container">
                    <div class="section-entry">
                       <div class="text-image-wrapper">
                          <div class="col-md-6 text-cell">
                             <div class="text-layout-inner">
                                <a href="https://maps.google.com/maps?&z=12&q=34.2550159+35.6535118&ll=34.2550159+35.6535118" target="_blank" class="fa-icon-link themewich-lightbox no-ajaxy" title="Location On Map">
                                   <div class="v-item subtitle tiny-details black-text-shadow">
                                      <i class="fas fa-map-marker-alt" style="font-size: 1.3em !important;"></i> Batroun 
                                   </div>
                                </a>
                                <div class="v-item title">
                                   <h2 class="black-text-shadow">2 - Phoenician wall</h2>
                                </div>
                                <div class="section-buttons v-item social-media-links hidden-xs"></div>
                                <hr class="v-item title-divider" data-width="100px" />
                                <div class="v-item content black-text-shadow">Ancient 225 meter long Phoenician wall a natural structure composed of petrified sand dunes,the Phoenicians reinforced it with rocks and used it as protection from sea storms and invaders. </div>
                                <div class="sharing badges section-buttons v-item">
                                   <a href="/location/phoenician-wall/" class="location-actions popup-with-move-anim">
                                   <i class="fas fa-info"></i>
                                   <span class="sharetitle">More</span></a>
                                   <a href="#share-box" onclick="updateShareBoxLinks(this);" data-title="Phoenician wall" data-link="./location/phoenician-wall/" class="location-actions open-popup-link post-share share popup-with-move-anim">
                                   <i class="fa fa-share"></i>
                                   <span class="sharetitle">Share</span>
                                   </a>
                                   <a href="/location/phoenician-wall/" class="location-actions post-like love">
                                   <i class="fa fa-heart"></i>
                                   <span class="sharetitle">Like</span></a>
                                </div>
                             </div>
                             <div class="clear"></div>
                          </div>
                          <div class="clear"></div>
                       </div>
                    </div>
                 </div>
                 <a href="#section-3" class="nextbutton nobg scroll-animate next-section-link">
                 <span>Next Section </span> </a>
                 <div class="credits tiny-details black-text-shadow">
                    Image by john
                 </div>
              </section>
              <section id="section-3" class="section text-image-section section-3 no-image nav-overlayimage-background layout-left dark-section" data-section="3" data-title="Kadisha Valley" style="background-image:url(/images/places/a-side-walk-on-the-side-of-the-mountain-qannoubine-mona66804138-l.jpg);">
                 <a name="section-3"></a>
                 <div class="overlay" style="background:#000000; opacity:0.2; filter:alpha(opacity=20); "></div>
                 <div class="container">
                    <div class="section-entry">
                       <div class="text-image-wrapper">
                          <div class="col-md-6 text-cell">
                             <div class="text-layout-inner">
                                <a href="https://maps.google.com/maps?&z=12&q=34.1083546+35.6484006&ll=34.1083546+35.6484006" target="_blank" class="fa-icon-link themewich-lightbox no-ajaxy" title="Location On Map">
                                   <div class="v-item subtitle tiny-details black-text-shadow">
                                      <i class="fas fa-map-marker-alt" style="font-size: 1.3em !important;"></i> Becharre 
                                   </div>
                                </a>
                                <div class="v-item title">
                                   <h2 class="black-text-shadow">3 - Kadisha Valley</h2>
                                </div>
                                <div class="section-buttons v-item social-media-links hidden-xs"></div>
                                <hr class="v-item title-divider" data-width="100px" />
                                <div class="v-item content black-text-shadow">Holy valley hike with adventures in Lebanon, a side walk on the side of the Mountain. Hikers will explore in details the monuments and nature. </div>
                                <div class="sharing badges section-buttons v-item">
                                   <a href="/location/kadisha-valley/" class="location-actions popup-with-move-anim">
                                   <i class="fas fa-info"></i>
                                   <span class="sharetitle">More</span></a>
                                   <a href="#share-box" onclick="updateShareBoxLinks(this);" data-title="Kadisha Valley" data-link="./location/kadisha-valley/" class="location-actions open-popup-link post-share share popup-with-move-anim">
                                   <i class="fa fa-share"></i>
                                   <span class="sharetitle">Share</span>
                                   </a>
                                   <a href="/location/kadisha-valley/" class="location-actions post-like love">
                                   <i class="fa fa-heart"></i>
                                   <span class="sharetitle">Like</span></a>
                                </div>
                             </div>
                             <div class="clear"></div>
                          </div>
                          <div class="clear"></div>
                       </div>
                    </div>
                 </div>
                 <a href="#section-4" class="nextbutton nobg scroll-animate next-section-link">
                 <span>Next Section </span> </a>
                 <div class="credits tiny-details black-text-shadow">
                    Image by john
                 </div>
              </section>
              <section id="section-4" class="section text-image-section section-4 no-image nav-overlayimage-background layout-left dark-section" data-section="4" data-title="Sidon Sea Castle" style="background-image:url(/images/places/10-worlds-oldest-cities9.jpg);">
                 <a name="section-4"></a>
                 <div class="overlay" style="background:#000000; opacity:0.1; filter:alpha(opacity=10); "></div>
                 <div class="container">
                    <div class="section-entry">
                       <div class="text-image-wrapper">
                          <div class="col-md-6 text-cell">
                             <div class="text-layout-inner">
                                <a href="https://maps.google.com/maps?&z=12&q=33.5671578+35.3687628&ll=33.5671578+35.3687628" target="_blank" class="fa-icon-link themewich-lightbox no-ajaxy" title="Location On Map">
                                   <div class="v-item subtitle tiny-details black-text-shadow">
                                      <i class="fas fa-map-marker-alt" style="font-size: 1.3em !important;"></i> Sidon 
                                   </div>
                                </a>
                                <div class="v-item title">
                                   <h2 class="black-text-shadow">4 - Sidon Sea Castle</h2>
                                </div>
                                <div class="section-buttons v-item social-media-links hidden-xs"></div>
                                <hr class="v-item title-divider" data-width="100px" />
                                <div class="v-item content black-text-shadow">Take a tour of the Crusaders Sea Castle, Lebanon to visit historic site in Sidon. </div>
                                <div class="sharing badges section-buttons v-item">
                                   <a href="/location/sidon-sea-castle/" class="location-actions popup-with-move-anim">
                                   <i class="fas fa-info"></i>
                                   <span class="sharetitle">More</span></a>
                                   <a href="#share-box" onclick="updateShareBoxLinks(this);" data-title="Sidon Sea Castle" data-link="./location/sidon-sea-castle/" class="location-actions open-popup-link post-share share popup-with-move-anim">
                                   <i class="fa fa-share"></i>
                                   <span class="sharetitle">Share</span>
                                   </a>
                                   <a href="/location/sidon-sea-castle/" class="location-actions post-like love">
                                   <i class="fa fa-heart"></i>
                                   <span class="sharetitle">Like</span></a>
                                </div>
                             </div>
                             <div class="clear"></div>
                          </div>
                          <div class="clear"></div>
                       </div>
                    </div>
                 </div>
                 <a href="#section-5" class="nextbutton nobg scroll-animate next-section-link">
                 <span>Next Section </span> </a>
                 <div class="credits tiny-details black-text-shadow">
                    Image by john
                 </div>
              </section>
              <section id="section-5" class="section text-image-section section-5 no-image nav-overlayimage-background layout-left dark-section" data-section="5" data-title="Ouyoun al-Samak" style="background-image:url(/images/places/FB_IMG_1527505805286.jpg);">
                 <a name="section-5"></a>
                 <div class="overlay" style="background:#000000; opacity:0.1; filter:alpha(opacity=10); "></div>
                 <div class="container">
                    <div class="section-entry">
                       <div class="text-image-wrapper">
                          <div class="col-md-6 text-cell">
                             <div class="text-layout-inner">
                                <a href="https://maps.google.com/maps?&z=12&q=34.4395027+36.0194264&ll=34.4395027+36.0194264" target="_blank" class="fa-icon-link themewich-lightbox no-ajaxy" title="Location On Map">
                                   <div class="v-item subtitle tiny-details black-text-shadow">
                                      <i class="fas fa-map-marker-alt" style="font-size: 1.3em !important;"></i> tripoli 
                                   </div>
                                </a>
                                <div class="v-item title">
                                   <h2 class="black-text-shadow">5 - Ouyoun al-Samak</h2>
                                </div>
                                <div class="section-buttons v-item social-media-links hidden-xs"></div>
                                <hr class="v-item title-divider" data-width="100px" />
                                <div class="v-item content black-text-shadow">Also known as “springs of fish” the springs here feed the Cold River, the mountain area of Oyoun es-Samak is home to a beautiful lake and waterfalls. The green area is ideal for hiking or a picnic. </div>
                                <div class="sharing badges section-buttons v-item">
                                   <a href="/location/ouyoun-al-samak/" class="location-actions popup-with-move-anim">
                                   <i class="fas fa-info"></i>
                                   <span class="sharetitle">More</span></a>
                                   <a href="#share-box" onclick="updateShareBoxLinks(this);" data-title="Ouyoun al-Samak" data-link="./location/ouyoun-al-samak/" class="location-actions open-popup-link post-share share popup-with-move-anim">
                                   <i class="fa fa-share"></i>
                                   <span class="sharetitle">Share</span>
                                   </a>
                                   <a href="/location/ouyoun-al-samak/" class="location-actions post-like love">
                                   <i class="fa fa-heart"></i>
                                   <span class="sharetitle">Like</span></a>
                                </div>
                             </div>
                             <div class="clear"></div>
                          </div>
                          <div class="clear"></div>
                       </div>
                    </div>
                 </div>
                 <a href="#section-6" class="nextbutton nobg scroll-animate next-section-link">
                 <span>Next Section </span> </a>
                 <div class="credits tiny-details black-text-shadow">
                    Image by john
                 </div>
              </section>
              <section id="section-6" class="section text-image-section section-6 no-image nav-overlayimage-background layout-left dark-section" data-section="6" data-title="Our Lady Of Nourieh Monastery" style="background-image:url(/images/places/dscn2542_2207.jpg);">
                 <a name="section-6"></a>
                 <div class="overlay" style="background:#000000; opacity:0.05; filter:alpha(opacity=5); "></div>
                 <div class="container">
                    <div class="section-entry">
                       <div class="text-image-wrapper">
                          <div class="col-md-6 text-cell">
                             <div class="text-layout-inner">
                                <a href="https://maps.google.com/maps?&z=12&q=34.3106601+35.6970356&ll=34.3106601+35.6970356" target="_blank" class="fa-icon-link themewich-lightbox no-ajaxy" title="Location On Map">
                                   <div class="v-item subtitle tiny-details black-text-shadow">
                                      <i class="fas fa-map-marker-alt" style="font-size: 1.3em !important;"></i> Chekka 
                                   </div>
                                </a>
                                <div class="v-item title">
                                   <h2 class="black-text-shadow">6 - Our Lady Of Nourieh Monastery</h2>
                                </div>
                                <div class="section-buttons v-item social-media-links hidden-xs"></div>
                                <hr class="v-item title-divider" data-width="100px" />
                                <div class="v-item content black-text-shadow">When it comes to my favorite places in Lebanon, the Saydet el Nourieh (Our Lady of the Light) Orthodox ranks high. </div>
                                <div class="sharing badges section-buttons v-item">
                                   <a href="/location/our-lady-of-nourieh-monastery/" class="location-actions popup-with-move-anim">
                                   <i class="fas fa-info"></i>
                                   <span class="sharetitle">More</span></a>
                                   <a href="#share-box" onclick="updateShareBoxLinks(this);" data-title="Our Lady Of Nourieh Monastery" data-link="./location/our-lady-of-nourieh-monastery/" class="location-actions open-popup-link post-share share popup-with-move-anim">
                                   <i class="fa fa-share"></i>
                                   <span class="sharetitle">Share</span>
                                   </a>
                                   <a href="/location/our-lady-of-nourieh-monastery/" class="location-actions post-like love">
                                   <i class="fa fa-heart"></i>
                                   <span class="sharetitle">Like</span></a>
                                </div>
                             </div>
                             <div class="clear"></div>
                          </div>
                          <div class="clear"></div>
                       </div>
                    </div>
                 </div>
                 <a href="#section-7" class="nextbutton nobg scroll-animate next-section-link">
                 <span>Next Section </span> </a>
                 <div class="credits tiny-details black-text-shadow">
                    Image by john
                 </div>
              </section>
              <section id="section-7" class="section text-image-section section-7 no-image nav-overlayimage-background layout-left dark-section" data-section="7" data-title="Chouwen Lake" style="background-image:url(/images/places/the-view-lake-forest-lebanon-green-nature-snaps-4-10-2017-9-50-24-am-l.jpg);">
                 <a name="section-7"></a>
                 <div class="overlay" style="background:#000000; opacity:0.2; filter:alpha(opacity=20); "></div>
                 <div class="container">
                    <div class="section-entry">
                       <div class="text-image-wrapper">
                          <div class="col-md-6 text-cell">
                             <div class="text-layout-inner">
                                <a href="https://maps.google.com/maps?&z=12&q=34.0815735+35.7794242&ll=34.0815735+35.7794242" target="_blank" class="fa-icon-link themewich-lightbox no-ajaxy" title="Location On Map">
                                   <div class="v-item subtitle tiny-details black-text-shadow">
                                      <i class="fas fa-map-marker-alt" style="font-size: 1.3em !important;"></i> Keserwan 
                                   </div>
                                </a>
                                <div class="v-item title">
                                   <h2 class="black-text-shadow">7 - Chouwen Lake</h2>
                                </div>
                                <div class="section-buttons v-item social-media-links hidden-xs"></div>
                                <hr class="v-item title-divider" data-width="100px" />
                                <div class="v-item content black-text-shadow">Adventures in Lebanon will take you to hike & swim in the splendid wild nature of Jannet Chouwenvalley and river, located in Ftouh Keserwan </div>
                                <div class="sharing badges section-buttons v-item">
                                   <a href="/location/chouwen-lake/" class="location-actions popup-with-move-anim">
                                   <i class="fas fa-info"></i>
                                   <span class="sharetitle">More</span></a>
                                   <a href="#share-box" onclick="updateShareBoxLinks(this);" data-title="Chouwen Lake" data-link="./location/chouwen-lake/" class="location-actions open-popup-link post-share share popup-with-move-anim">
                                   <i class="fa fa-share"></i>
                                   <span class="sharetitle">Share</span>
                                   </a>
                                   <a href="/location/chouwen-lake/" class="location-actions post-like love">
                                   <i class="fa fa-heart"></i>
                                   <span class="sharetitle">Like</span></a>
                                </div>
                             </div>
                             <div class="clear"></div>
                          </div>
                          <div class="clear"></div>
                       </div>
                    </div>
                 </div>
                 <a href="#section-8" class="nextbutton nobg scroll-animate next-section-link">
                 <span>Next Section </span> </a>
                 <div class="credits tiny-details black-text-shadow">
                    Image by john
                 </div>
              </section>
              <section id="section-8" class="section text-image-section section-8 no-image nav-overlayimage-background layout-left dark-section" data-section="8" data-title="Baatara Gorge Waterfall" style="background-image:url(/images/places/DSC03161.jpg);">
                 <a name="section-8"></a>
                 <div class="overlay" style="background:#000000; opacity:0; filter:alpha(opacity=0); "></div>
                 <div class="container">
                    <div class="section-entry">
                       <div class="text-image-wrapper">
                          <div class="col-md-6 text-cell">
                             <div class="text-layout-inner">
                                <a href="https://maps.google.com/maps?&z=12&q=34.1752966+35.8668956&ll=34.1752966+35.8668956" target="_blank" class="fa-icon-link themewich-lightbox no-ajaxy" title="Location On Map">
                                   <div class="v-item subtitle tiny-details black-text-shadow">
                                      <i class="fas fa-map-marker-alt" style="font-size: 1.3em !important;"></i> Tannourine 
                                   </div>
                                </a>
                                <div class="v-item title">
                                   <h2 class="black-text-shadow">8 - Baatara Gorge Waterfall</h2>
                                </div>
                                <div class="section-buttons v-item social-media-links hidden-xs"></div>
                                <hr class="v-item title-divider" data-width="100px" />
                                <div class="v-item content black-text-shadow"> </div>
                                <div class="sharing badges section-buttons v-item">
                                   <a href="/location/baatara-gorge-waterfall/" class="location-actions popup-with-move-anim">
                                   <i class="fas fa-info"></i>
                                   <span class="sharetitle">More</span></a>
                                   <a href="#share-box" onclick="updateShareBoxLinks(this);" data-title="Baatara Gorge Waterfall" data-link="./location/baatara-gorge-waterfall/" class="location-actions open-popup-link post-share share popup-with-move-anim">
                                   <i class="fa fa-share"></i>
                                   <span class="sharetitle">Share</span>
                                   </a>
                                   <a href="/location/baatara-gorge-waterfall/" class="location-actions post-like love">
                                   <i class="fa fa-heart"></i>
                                   <span class="sharetitle">Like</span></a>
                                </div>
                             </div>
                             <div class="clear"></div>
                          </div>
                          <div class="clear"></div>
                       </div>
                    </div>
                 </div>
                 <a href="#section-9" class="nextbutton nobg scroll-animate next-section-link">
                 <span>Next Section </span> </a>
                 <div class="credits tiny-details black-text-shadow">
                    Image by john
                 </div>
              </section>
              <section id="section-9" class="section text-image-section section-9 no-image nav-overlayimage-background layout-left dark-section" data-section="9" data-title="Jeita Grotto" style="background-image:url(/images/places/jeita-grotto_2.jpg);">
                 <a name="section-9"></a>
                 <div class="overlay" style="background:#000000; opacity:0.4; filter:alpha(opacity=40); "></div>
                 <div class="container">
                    <div class="section-entry">
                       <div class="text-image-wrapper">
                          <div class="col-md-6 text-cell">
                             <div class="text-layout-inner">
                                <a href="https://maps.google.com/maps?&z=12&q=33.9435839+35.6386393&ll=33.9435839+35.6386393" target="_blank" class="fa-icon-link themewich-lightbox no-ajaxy" title="Location On Map">
                                   <div class="v-item subtitle tiny-details black-text-shadow">
                                      <i class="fas fa-map-marker-alt" style="font-size: 1.3em !important;"></i> Jeita 
                                   </div>
                                </a>
                                <div class="v-item title">
                                   <h2 class="black-text-shadow">9 - Jeita Grotto</h2>
                                </div>
                                <div class="section-buttons v-item social-media-links hidden-xs"></div>
                                <hr class="v-item title-divider" data-width="100px" />
                                <div class="v-item content black-text-shadow">A system of two separate, but interconnected, karstic limestone caves spanning an overall length of nearly 9 kilometres. </div>
                                <div class="sharing badges section-buttons v-item">
                                   <a href="/location/jeita-grotto/" class="location-actions popup-with-move-anim">
                                   <i class="fas fa-info"></i>
                                   <span class="sharetitle">More</span></a>
                                   <a href="#share-box" onclick="updateShareBoxLinks(this);" data-title="Jeita Grotto" data-link="./location/jeita-grotto/" class="location-actions open-popup-link post-share share popup-with-move-anim">
                                   <i class="fa fa-share"></i>
                                   <span class="sharetitle">Share</span>
                                   </a>
                                   <a href="/location/jeita-grotto/" class="location-actions post-like love">
                                   <i class="fa fa-heart"></i>
                                   <span class="sharetitle">Like</span></a>
                                </div>
                             </div>
                             <div class="clear"></div>
                          </div>
                          <div class="clear"></div>
                       </div>
                    </div>
                 </div>
                 <a href="#section-10" class="nextbutton nobg scroll-animate next-section-link">
                 <span>Next Section </span> </a>
                 <div class="credits tiny-details black-text-shadow">
                    Image by john
                 </div>
              </section>
              <section id="section-10" class="section text-image-section section-10 no-image nav-overlayimage-background layout-left dark-section" data-section="10" data-title="Raouché" style="background-image:url(/images/places/rawshe.jpg);">
                 <a name="section-10"></a>
                 <div class="overlay" style="background:#000000; opacity:0.1; filter:alpha(opacity=10); "></div>
                 <div class="container">
                    <div class="section-entry">
                       <div class="text-image-wrapper">
                          <div class="col-md-6 text-cell">
                             <div class="text-layout-inner">
                                <a href="https://maps.google.com/maps?&z=12&q=33.886527+35.4692563&ll=33.886527+35.4692563" target="_blank" class="fa-icon-link themewich-lightbox no-ajaxy" title="Location On Map">
                                   <div class="v-item subtitle tiny-details black-text-shadow">
                                      <i class="fas fa-map-marker-alt" style="font-size: 1.3em !important;"></i> Beirut 
                                   </div>
                                </a>
                                <div class="v-item title">
                                   <h2 class="black-text-shadow">10 - Raouché</h2>
                                </div>
                                <div class="section-buttons v-item social-media-links hidden-xs">
                                   <a target="_blank" href="#" class="social-link" title="Facebook">
                                   <i class="fab fa-facebook-f"></i></a> <a target="_blank" href="#" class="social-link" title="Twitter">
                                   <i class="fab fa-twitter"></i></a> <a target="_blank" href="#" class="social-link" title="Instagram">
                                   <i class="fab fa-instagram"></i></a> <a target="_blank" href="#" class="social-link" title="Google">
                                   <i class="fab fa-google-plus-g"></i></a> <a target="_blank" href="#" class="social-link" title="Pinterest">
                                   <i class="fab fa-pinterest-p"></i></a> 
                                </div>
                                <hr class="v-item title-divider" data-width="100px" />
                                <div class="v-item content black-text-shadow">Natural wonders in Beirut. A stunning set of rocks welcome you to the city of Beirut. </div>
                                <div class="sharing badges section-buttons v-item">
                                   <a href="/location/raouche/" class="location-actions popup-with-move-anim">
                                   <i class="fas fa-info"></i>
                                   <span class="sharetitle">More</span></a>
                                   <a href="#share-box" onclick="updateShareBoxLinks(this);" data-title="Raouché" data-link="./location/raouche/" class="location-actions open-popup-link post-share share popup-with-move-anim">
                                   <i class="fa fa-share"></i>
                                   <span class="sharetitle">Share</span>
                                   </a>
                                   <a href="/location/raouche/" class="location-actions post-like love">
                                   <i class="fa fa-heart"></i>
                                   <span class="sharetitle">Like</span></a>
                                </div>
                             </div>
                             <div class="clear"></div>
                          </div>
                          <div class="clear"></div>
                       </div>
                    </div>
                 </div>
                 <a href="#section-11" class="nextbutton nobg scroll-animate next-section-link">
                 <span>Next Section </span> </a>
                 <div class="credits tiny-details black-text-shadow">
                    Image by john
                 </div>
              </section>
              <section id="section-11" class="section text-image-section section-11 no-image nav-overlayimage-background layout-left dark-section" data-section="11" data-title="Temples Of Baalbek" style="background-image:url(./images/places/Baalbek-test.jpg);">
                 <a name="section-11"></a>
                 <div class="overlay" style="background:#000000; opacity:0.1; filter:alpha(opacity=10); "></div>
                 <div class="container">
                    <div class="section-entry">
                       <div class="text-image-wrapper">
                          <div class="col-md-6 text-cell">
                             <div class="text-layout-inner">
                                <a href="https://maps.google.com/maps?&z=12&q=34.0046871+36.1935303&ll=34.0046871+36.1935303" target="_blank" class="fa-icon-link themewich-lightbox no-ajaxy" title="Location On Map">
                                   <div class="v-item subtitle tiny-details black-text-shadow">
                                      <i class="fas fa-map-marker-alt" style="font-size: 1.3em !important;"></i> Baalbeck 
                                   </div>
                                </a>
                                <div class="v-item title">
                                   <h2 class="black-text-shadow">11 - Temples Of Baalbek</h2>
                                </div>
                                <div class="section-buttons v-item social-media-links hidden-xs">
                                   <a target="_blank" href="#" class="social-link" title="Facebook">
                                   <i class="fab fa-facebook-f"></i></a> <a target="_blank" href="#" class="social-link" title="Twitter">
                                   <i class="fab fa-twitter"></i></a> <a target="_blank" href="#" class="social-link" title="Instagram">
                                   <i class="fab fa-instagram"></i></a> <a target="_blank" href="#" class="social-link" title="Google">
                                   <i class="fab fa-google-plus-g"></i></a> <a target="_blank" href="#" class="social-link" title="Pinterest">
                                   <i class="fab fa-pinterest-p"></i></a> 
                                </div>
                                <hr class="v-item title-divider" data-width="100px" />
                                <div class="v-item content black-text-shadow">Baalbek, Lebanon's greatest Roman treasure, can be counted among the wonders of the ancient world. </div>
                                <div class="sharing badges section-buttons v-item">
                                   <a href="/location/temples-of-baalbek/" class="location-actions popup-with-move-anim">
                                   <i class="fas fa-info"></i>
                                   <span class="sharetitle">More</span></a>
                                   <a href="#share-box" onclick="updateShareBoxLinks(this);" data-title="Temples Of Baalbek" data-link="./location/temples-of-baalbek/" class="location-actions open-popup-link post-share share popup-with-move-anim">
                                   <i class="fa fa-share"></i>
                                   <span class="sharetitle">Share</span>
                                   </a>
                                   <a href="/location/temples-of-baalbek/" class="location-actions post-like love">
                                   <i class="fa fa-heart"></i>
                                   <span class="sharetitle">Like</span></a>
                                </div>
                             </div>
                             <div class="clear"></div>
                          </div>
                          <div class="clear"></div>
                       </div>
                    </div>
                 </div>
                 <a href="#section-12" class="nextbutton nobg scroll-animate next-section-link">
                 <span>Next Section </span> </a>
                 <div class="credits tiny-details black-text-shadow">
                    Image by john
                 </div>
              </section>
           </div>
        </div>
        <div class="clear"></div>
        <div id="footer">
           <div class="container clearfix">
              <div class="col-md-6 left-footer tiny-details">
                 &copy; Copyright 2016 
              </div>
           </div>
           <div class="clear"></div>
        </div>
    </div>

@endsection