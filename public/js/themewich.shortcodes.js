jQuery.noConflict();(function($){"use strict";$.fn.themewichLightBox=function(options){if(this.length==0)return this;var defaults={notimages:true}
var lightbox={};var el=this;lightbox.el=this;lightbox.settings=$.extend({},defaults,options);lightbox.el.imageselectors=$(lightbox.el.selector+'[href*=".jpg"]').add(lightbox.el.selector+'[href*="jpeg"]').add(lightbox.el.selector+'[href*=".png"]').add(lightbox.el.selector+'[href*=".gif"]');if(lightbox.settings.notimages){lightbox.el.inlineselectors=lightbox.el.not(lightbox.el.imageselectors);}
lightbox.el.imageselectors.magnificPopup({type:'image',closeBtnInside:true,mainClass:'mfp-zoom-in',tLoading:'<div class="tw-loading"></div>',removalDelay:500,image:{tError:'<a href="%url%">The image #%curr%</a> could not be loaded.',titleSrc:function(item){return item.el.find('img').attr('title');},markup:'<div class="mfp-figure">'+
'<div class="mfp-close"></div>'+
'<div class="mfp-img"></div>'+
'<div class="mfp-bottom-bar">'+
'<div class="mfp-title-wrapper"><div class="mfp-title"></div></div>'+
'<div class="mfp-counter"></div>'+
'</div>'+
'</div>'},callbacks:{imageLoadComplete:function(){var self=this;setTimeout(function(){self.wrap.addClass('mfp-image-loaded');},16);},close:function(){this.wrap.removeClass('mfp-image-loaded');}},closeOnContentClick:true,midClick:true});lightbox.el.inlineselectors.magnificPopup({disableOn:700,closeBtnInside:true,tLoading:'<div class="tw-loading"></div>',type:'iframe',mainClass:'mfp-fade',removalDelay:160,preloader:false,fixedContentPos:false});}
$.fn.themewichIsotope=function(){if(this.length==0)return this;$(this).each(function(){var $this=$(this),columnNumber=$this.attr('data-value'),isoBrick=$this.find('.isobrick'),colnum=2;isoBrick.css({'margin-left':0,'margin-right':0});function setColNumber(){if($(window).width()<767){colnum=2;}else{colnum=columnNumber;}
return colnum;}
function runIsotope(){colnum=setColNumber();if(columnNumber!='1'){$this.isotope({masonry:{columnWidth:$this.width()/colnum},itemSelector:'.isobrick',layoutMode:'masonry'});}}
runIsotope();$(window).resize(function(){runIsotope();});$this.imagesLoaded(function(){runIsotope();});});};$.fn.themewichParallax=function(){var $this=$(this);function setWidth(){var postWidth=$this.outerWidth(),windowWidth=$(window).width(),padding=(windowWidth-postWidth)/2;$('.tw-full-bg-image').css({'margin-left':-padding+'px','margin-right':-padding+'px','padding-left':padding+'px','padding-right':padding+'px'});}
setWidth();$(window).resize(function(){setWidth();});};$(document).ready(function(){if($.fn.magnificPopup){$('a.tw-lightbox').themewichLightBox();}
$(".tw-tabs-shortcode").tabs({heightStyle:"content"});if($.fn.isotope){$('.tw-postshortcode .isotopecontainer').themewichIsotope();}
if($.fn.accordion){$('.tw-accordion').accordion({heightStyle:'content'});}
$('.tw-toggle-trigger').click(function(){$(this).toggleClass('active').next().slideToggle('fast');return false;});if($.fn.themewichParallax){$('.tw-post-break').themewichParallax();}
jQuery.fn.redraw=function(){return this.hide(0,function(){$(this).show();});};$('.chrome .tw-parallax-scroll').redraw();$(window).scroll(function(){$('.chrome .tw-parallax-scroll').redraw();});});})(jQuery);