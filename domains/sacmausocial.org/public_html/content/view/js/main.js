﻿function SetAutoWithImage(){var t=$("#wrapper #boxContent").width();$("#boxContent table").each(function(){var e=$(this);null==e.attr("data-width")&&(e.attr("data-width",e.width()),e.attr("data-height",e.height())),parseInt(e.attr("data-width"))<t?e.css({width:e.attr("data-width"),height:e.attr("data-height")}):e.width()>t&&(e.css({width:"100%",height:"auto"}),e.addClass("tableResize"))}),$("#boxContent .page-content img").each(function(){var e=$(this);null==e.attr("data-width")&&(e.attr("data-width",e.width()),e.attr("data-height",e.height())),parseInt(e.attr("data-width"))<t?e.css({width:e.attr("data-width"),height:e.attr("data-height")}):e.width()>t&&(e.css({width:"100%",height:"auto"}),e.addClass("imgResize"))})}function Booking(t){return Loading(),document.location.href=t,!1}function Schedule(t){return Loading(),$.ajax({url:obj[7].url+"?ran="+Math.random(),type:"POST",data:{id:t},dataType:"json",cache:!1,success:function(t){return RemoveLoading(),$("#myModal .modal-title").html(t.title),$("#myModal .modal-body").html(t.content),$("#myModal").modal({keyboard:!1}),!1},error:function(t,e,a){RemoveLoading(),ShowMsg(a,"error")}}),!1}function popupVideo(){$(".popup-youtube, .popup-vimeo, .popup-gmaps").magnificPopup({disableOn:700,type:"iframe",mainClass:"mfp-fade",removalDelay:160,preloader:!1,fixedContentPos:!1})}function SetLightboxImage(){$("#wrapper .page-content img").each(function(){var t=$(this);t.wrap('<a href="'+t.attr("src")+'" class="gallery-link" title="'+t.attr("alt")+'"></a>')}),$("#wrapper").magnificPopup({delegate:"a.gallery-link",type:"image",gallery:{enabled:!0,navigateByImgClick:!0,arrowMarkup:'<button type="button" class="mfp-arrow mfp-arrow-%dir%" title="%title%"></button>',tPrev:"Previous",tNext:"Next",tCounter:'<span class="mfp-counter">%curr% of %total%</span>'},image:{titleSrc:"title"},zoom:{enabled:!0,duration:300,opener:function(t){return t.find("img")}}})}var msgMessi;function Loading(){msgMessi=new Messi('<div class="loading-span"></div>',{padding:20,width:"auto",height:"auto",modal:!0,closeButton:!1})}function RemoveLoading(){null!=msgMessi&&msgMessi.hide()}function ShowMsg(t,e){msgMessi=new Messi(t,{titleClass:e,title:obj[0].title,modal:!0,width:"auto",buttons:[{id:0,label:obj[0].close,val:"X"}]})}function ToTop(){$("html,body").animate({scrollTop:cTop-400},"slow")}function ReloadSupport(){}var menuWidth=0;function MenuAutoWitdh(){if($contain=$("#menu .navbar"),$(window).width()>=750){$("ul.nav.navbar-nav > li > a").css("padding","0"),menuWidth=$("ul.nav.navbar-nav").width();var t=($contain.width()-menuWidth-40)/$("ul.nav.navbar-nav > li:not(.menu-hide) > a").length/2;$("ul.nav.navbar-nav > li > a").css("padding","0 "+(t>20?20:0==t?2:t)+"px")}else $("ul.nav.navbar-nav > li > a").css("padding","0 15px");$("ul.nav.navbar-nav").css("opacity",1)}function ToggleSearch(){return $(".boxSerch .search").fadeToggle(),$(".boxSerch .search #txtSearch").focus(),!1}$(function(){$(".dotdot").dotdotdot(),HideOutSide(".boxSerch .search"),$(window).load(function(){setTimeout(function(){$("body").addClass("loaded"),$("#loader-wrapper").remove()},200)}),MenuAutoWitdh(),$.ajax({url:obj[4].url,cache:!1,dataType:"json",success:function(t){$(".online").html(t.Online),$(".visitor").html(t.TatCa)}}),$("#menu ul li a."+obj[2].controller+",.boxButton a."+obj[2].controller).addClass("active"),$("img.lazy").lazyload({effect:"fadeIn",load:function(){$(this).removeClass("lazy")}}),SetLightboxImage(),SetAutoWithImage(),$(window).resize(function(){SetAutoWithImage(),MenuAutoWitdh()}),$("a[rel^='prettyPhoto']").length>0&&$("a[rel^='prettyPhoto']").prettyPhoto({theme:"facebook",autoplay_slideshow:!0,deeplinking:!1}),popupVideo(),$(document).bind("ajaxComplete",function(){$("img.lazy").lazyload({effect:"fadeIn",load:function(){$(this).removeClass("lazy")}}),popupVideo()}),$(".magnific-popup").length&&$(".magnific-popup").magnificPopup({disableOn:0,closeOnBgClick:!0,showCloseBtn:!0,closeBtnInside:!0,enableEscapeKey:!0,closeOnContentClick:!1,modal:!0,type:"ajax"}),$("#owl-view-product").length>0&&$("#owl-view-product").owlCarousel({itemsCustom:[[0,1],[400,2],[600,3],[750,2],[981,3],[1e3,3]],pagination:!0,navigation:!1,navigationText:!1,autoPlay:!0,slideSpeed:300,paginationSpeed:800,rewindSpeed:1e3}),$("#owl-view-product-cungloai").length>0&&$("#owl-view-product-cungloai").owlCarousel({itemsCustom:[[0,1],[400,2],[600,3],[750,2],[981,3],[1e3,3]],pagination:!0,navigation:!1,navigationText:!1,autoPlay:!0,slideSpeed:300,paginationSpeed:800,rewindSpeed:1e3}),$(".datepicker").length>0&&$(".datepicker").datetimepicker({format:"DD/MM/YYYY",locale:"vi"}),$(".datetimepicker").length>0&&$(".datetimepicker").datetimepicker({format:"DD/MM/YYYY HH:mm",locale:"vi"}),$(".timepicker").length>0&&$(".timepicker").datetimepicker({format:"HH:mm",locale:"vi"}),$("#boxSliderHome .bxslider").length>0&&$("#boxSliderHome .bxslider").bxSlider({adaptiveHeight:!0,pager:!0,controls:!0,auto:!0,autoHover:!0,onSliderLoad:function(t){var e=$("#boxSliderHome .bxslider li:not(.bx-clone):first").find(".caption").html(),a=$("#boxSliderHome .bxslider li:not(.bx-clone):first").find("a").attr("href")+"";$("#boxSliderHomeCaptions .caption-desc").html('<a href="'+a+'">'+e+"</a>")},onSlideAfter:function(t,e,a){var i=$(t).find(".caption").html(),o=$(t).find("a").attr("href")+"";$("#boxSliderHomeCaptions .caption-desc").html('<a href="'+o+'">'+i+"</a>")},onSlideBefore:function(t,e,a){var i=$(t).find(".caption").html(),o=$(t).find("a").attr("href")+"";$("#boxSliderHomeCaptions .caption-desc").html('<a href="'+o+'">'+i+"</a>")},onSlideNext:function(t,e,a){var i=$(t).find(".caption").html(),o=$(t).find("a").attr("href")+"";$("#boxSliderHomeCaptions .caption-desc").html('<a href="'+o+'">'+i+"</a>")},onSlidePrev:function(t,e,a){var i=$(t).find(".caption").html(),o=$(t).find("a").attr("href")+"";$("#boxSliderHomeCaptions .caption-desc").html('<a href="'+o+'">'+i+"</a>")}}),$(".parallax-banner").length>0&&$(".parallax-banner").parallaxor({top:50,layers:{img:{distance:"50%"}}})});