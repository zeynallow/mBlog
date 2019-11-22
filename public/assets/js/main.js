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
      return false;
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
      var testmonialItem = $('.testimonial-item');
      if (testmonialItem.length) {
        testmonialItem.slick({
          dots: false,
          arrows: false,
          autoplay: true,
          autoplaySpeed: 4000
        });
      }

      /*
      CounterUp ACTIVE
      ================================ */
      var cunterActive = $('.counter');
      if (cunterActive.length) {
        cunterActive.counterUp({
          delay: 50,
          time: 3000
        });
      }

      /*
      SLIDER PARTICLES.JS ACTIVE
      =============================== */
      if ( $('#particles-bg').length ) {
        particlesJS("particles-bg", {
          "particles": {
            "number": {
              "value": 100,
              "density": {
                "enable": true,
                "value_area": 800
              }
            },
            "color": {
              "value": "#666666"
            },
            "shape": {
              "type": "circle",
              "stroke": {
                "width": 0,
                "color": "#000000"
              },
              "polygon": {
                "nb_sides": 5
              },
              "image": {
                "src": "img/github.svg",
                "width": 100,
                "height": 100
              }
            },
            "opacity": {
              "value": 0.5,
              "random": false,
              "anim": {
                "enable": false,
                "speed": 1,
                "opacity_min": 0.1,
                "sync": false
              }
            },
            "size": {
              "value": 3,
              "random": true,
              "anim": {
                "enable": false,
                "speed": 40,
                "size_min": 0.1,
                "sync": false
              }
            },
            "line_linked": {
              "enable": true,
              "distance": 150,
              "color": "#666666",
              "opacity": 0.4,
              "width": 1
            },
            "move": {
              "enable": true,
              "speed": 6,
              "direction": "none",
              "random": true,
              "straight": false,
              "out_mode": "out",
              "bounce": false,
              "attract": {
                "enable": false,
                "rotateX": 600,
                "rotateY": 600
              }
            }
          },
          "interactivity": {
            "detect_on": "canvas",
            "events": {
              "onhover": {
                "enable": true,
                "mode": "grab"
              },
              "onclick": {
                "enable": true,
                "mode": "push"
              },
              "resize": true
            },
            "modes": {
              "grab": {
                "distance": 250,
                "line_linked": {
                  "opacity": 1
                }
              },
              "bubble": {
                "distance": 600,
                "size": 80,
                "duration": 2,
                "opacity": 8,
                "speed": 3
              },
              "repulse": {
                "distance": 200,
                "duration": 0.4
              },
              "push": {
                "particles_nb": 4
              },
              "remove": {
                "particles_nb": 2
              }
            }
          },
          "retina_detect": true
        });
      }

      /*
      CONTACT FORM VALIDATIONS SETTINGS
      ========================================*/
      var contactForm = $('#contact_form');
      if (contactForm.length) {
        contactForm.validate({
          onfocusout: false,
          onkeyup: false,
          rules: {
            name: "required",
            email: {
              required: true,
              email: true
            }
          },
          errorPlacement: function(error, element) {
            error.insertBefore(element);
          },
          messages: {
            name: "What's your name?",
            email: {
              required: "What's your email?",
              email: "Please, enter a valid email"
            }
          },
          highlight: function(element) {
            $(element)
            .text('').addClass('error')
          },
          success: function(element) {
            element
            .text('').addClass('valid')
          }
        });
      }

      /*
      CONTACT FORM SCRIPT
      ========================================*/
      var contactSubmit = $('#contact_submit');
      if (contactForm.length) {
        contactForm.submit(function() {
          // submit the form
          if ($(this).valid()) {
            contactSubmit.button('loading');
            var action = $(this).attr('action');
            $.ajax({
              url: action,
              type: 'POST',
              data: {
                contactName: $('#contact_name').val(),
                contactEmail: $('#contact_email').val(),
                contactPhone: $('#contact_phone').val(),
                contactWebsite: $('#contact_website').val(),
                contactMessage: $('#contact_message').val()
              },
              success: function() {
                contactSubmit.button('reset');
                contactSubmit.button('complete');
              },
              error: function() {
                contactSubmit.button('reset');
                contactSubmit.button('error');
              }
            });
            // return false to prevent normal browser submit and page navigation
          } else {
            CTSubmit.button('reset')
          }
          return false;
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

        // FITROWS GRID
        var fitRowGrid = $('.fitRows-grid');
        if (fitRowGrid.length) {
          fitRowGrid.isotope({
            itemSelector: '.grid-item',
            // layout mode options
            layoutMode: 'fitRows'
          });
        }
        // MASONRY GRID
        var masonryGrid = $('.masonry-grid');
        if (masonryGrid.length) {
          masonryGrid.isotope({
            itemSelector: '.grid-item',
            // layout mode options
            layoutMode: 'masonry',
            masonryHorizontal: {
              rowHeight: 100
            }
          });
        }

      });

    })(jQuery);
