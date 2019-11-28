(function($) {
  "use strict";

  /*
  MOBILE MENU
  ================================== */
  //  Main menu
  var MainLiDrop = $('.mainmenu li.dropdown,.mainmenu li.sub-dropdown');
  var droPBtn = $('<div class="dropdown-btn"></div>');
  MainLiDrop.append(droPBtn);
  //Dropdown Button
  var mainLiDDbtn = $('.mainmenu li.dropdown .dropdown-btn');
  if (mainLiDDbtn.length) {
    mainLiDDbtn.on('click', function() {
      $(this).toggleClass('submenu-icon');
      $(this).prev('ul').slideToggle(400);
      return false;
    });
  }

  //Search Box Active
  var searchBoxI = $('.search-box i');
  var closeBox = $('#close');
  if (searchBoxI.length) {
    searchBoxI.on('click', function() {
      $(this).parent().toggleClass('active-search');
    });
  }

  /*
  STICKY
  ================================== */
  var AcSticky = $('.active-sticky');
  var WinD = $(window);
  if (WinD.length) {
    WinD.on('scroll', function() {
      var scroll = $(window).scrollTop();
      var AESticky = AcSticky;
      if (scroll < 1) {
        AESticky.removeClass("is-sticky");
      } else {
        AESticky.addClass("is-sticky");
      }
      return false;
    });
  }

  /*
  Menu A Active Jquery
  ================================== */
  var pgurl = window.location.href.substr(window.location.href
    .lastIndexOf("/")+1);
    var aActive = $('ul li a');
    if (aActive.length) {
      aActive.each(function(){
        if($(this).attr("href") === pgurl || $(this).attr("href") === '' )
        $(this).addClass("active");
      });
    }

    /*
    ISOTOPE MENU
    ================================ */
    var folioMenuLi = $('.portfolio-menu li');
    if (folioMenuLi.length) {
      folioMenuLi.on('click', function() {
        var folioGrid = $('.portfolio-grid');
        folioMenuLi.removeClass("active");
        $(this).addClass("active");
        var selector = $(this).attr('data-filter');
        folioGrid.isotope({
          filter: selector,
          animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false
          }
        });
      });
    }

    /*
    VENOBOX ACTIVE
    ================================ */
    var venBOx = $('.venobox');
    venBOx.venobox();

    /*
    SLICK CAROUSEL AS NAV
    ===================================*/
    var oneItem = $('#one-item');
    if (oneItem.length) {
      oneItem.slick({
        dots: true,
        arrows: false,
        slidesToShow: 3,
        slidesToScroll: 3,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }]
        });
      }


      /*
      SCROLLUP
      ================================ */
      $.scrollUp({
        scrollText: '<i class="zmdi zmdi-long-arrow-up"></i>',
        easingType: 'linear',
        scrollSpeed: 500,
        animation: 'slide'
      });

      /*
      LOAD MORE JQUERY
      ================================== */
      var loadItem = $('.load-more');
      var addNewItem = 3;
      var loadBtn = $("#load-more-btn");
      var numInList = loadItem.length;
      loadItem.hide();
      if (numInList > addNewItem) {
        loadBtn.show();
      }
      if (loadBtn.length) {
        loadBtn.on('click',function(){
          var showing = loadItem.filter(':visible').length;
          loadItem.slice(showing - 0, showing + addNewItem).fadeIn();
          var nowShowing = loadItem.filter(':visible').length;
          if (nowShowing >= numInList) {
            loadBtn.hide();
          }

          var MasCol = $('.portfolio-grid');
          MasCol.isotope('layout'); // Isotope Layout Fit
        });
      }
      var polioMenuLi = $('.portfolio-menu li:not(:first-child)');
      if (polioMenuLi.length) {
        polioMenuLi.on('click',function(){
          loadBtn.hide();
        }); // Button Hide on Filtering
      }

      /*
      WINDOW LOAD FUNCTIONS
      ================================== */
      WinD.on('load', function() {
        // Preloader
        var preeLoad = $('#loading-wrap');
        preeLoad.fadeOut(1000);

      });


    })(jQuery);

    function commentReply(comment_id){
      $("#comment_reply_"+comment_id).fadeToggle();
    }
