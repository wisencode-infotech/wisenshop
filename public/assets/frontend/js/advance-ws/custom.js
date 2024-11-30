(function ($) {
    eCommerce = {
      init: function () {
        this.general_open();
        this.all_slider();
        this.tabs_open();
        this.accordion_open();
        this.all_popup_js();
        this.Preloader_js();
      },
  
          /*======================================
           01. General Open JS
          ========================================*/
  
          general_open: function () {
  
            /* Page scroll to Header sticky */
            $(window).scroll(function() {
              if ($(this).scrollTop() > 0){  
                $('.site-header').addClass("sticky");
              }
              else{
                $('.site-header').removeClass("sticky");
              }
            });
  
            /* Mobile menu*/
            $("body").on('click', '.header-button .toggle-menu, .mobile-menu-close a, .menu li a', function(){
                  $('.mobile-menu').toggleClass('open');
                  $(this).toggleClass('active');
                  $('body, html').toggleClass('menu-open');
              });
  
          /* Mobile menu dropdown */
          if( $(window).width() <= 991 ) {
                $(".mobile-menu .menu li").each(function (i) {
                    if ($(this).has("ul").length)
                    {
                        $(this).find('ul').addClass("sub-menu");
                        $(this).find('> a').after('<span class="caret-arrow"></span>');
                        //$(this).find('> .sub-menu').css('display', 'none');
                    }
                });
                $('.mobile-menu .menu li .caret-arrow').click(function () {
                    var catSubUl = $(this).next('.sub-menu');
                    var catSubli = $(this).closest('li');
                    if (catSubUl.is(':hidden'))
                    {
                        //$("#window > ul > li .sub-menu").slideUp();
                        catSubUl.slideDown();
                        //$('.caret').removeClass('active');
                        $(this).addClass('active');
                        catSubli.addClass('active');
                    }
                    else
                    {
                        catSubUl.slideUp();
                        $(this).removeClass('active');
                        catSubli.removeClass('active');
                    }
                });
            }
  
            //TOGGLING NESTED ul
            $(document).on("click", ".drop-down .selected", function(){
              $(".drop-down .search-categories").show();
            });

            // $(".drop-down .selected").click(function() {
            //   $(".drop-down .search-categories").toggle();
            // });
  
            //SELECT OPTIONS AND HIDE OPTION AFTER SELECTION
            $(document).on("click", ".drop-down .search-categories li", function(){
              var text = $(this).html();
              $(".drop-down .selected span").html(text);
              $(".drop-down .search-categories").hide();
            });

            // $(".drop-down .search-categories li").click(function() {
            //   var text = $(this).html();
            //   $(".drop-down .selected span").html(text);
            //   $(".drop-down .search-categories").hide();
            // }); 
  
  
            //HIDE OPTIONS IF CLICKED ANYWHERE ELSE ON PAGE
            $(document).bind('click', function(e) {
              var $clicked = $(e.target);
              if (! $clicked.parents().hasClass("drop-down"))
                $(".drop-down .search-categories").hide();
            });
  
            /* all categories menu js */
            $(document).on("click", ".all-categories .dropdown-toggle", function(){
              $('.departments-menu').slideToggle("");
            });
  
            /* Cookie popup js */
            $(document).on("click", ".cookie-popup .accept-all-btn", function(){
              $('.cookie-popup').removeClass("open");
            });
  
  
            /* mini cart popup js */
            $(document).on("click", ".header-button .cart-icon, .mini-cart-close a, .overflow", function(){
              $('.mini-cart-dropdown').toggleClass("open");
              $('body').toggleClass("minicart-open");
            });
  
            /* Filter sidebar popup js */
            $(document).on("click", ".sidebar-inner .filter-close", function(){
              $('.sidebar').removeClass("open");
            });

            $(document).on("click", ".filter-shop-loop .filter-mobile-btn", function(){
              $('.sidebar').addClass("open");
            });
  
            
            /* countdown js */
            if ($('.product-countdown').length>0){
              const second = 1000,
                    minute = second * 60,
                    hour = minute * 60,
                    day = hour * 24;
  
              //I'm adding this section so I don't have to keep updating this pen every year :-)
              //remove this if you don't need it
              let today = new Date(),
                  dd = String(today.getDate()).padStart(2, "0"),
                  mm = String(today.getMonth() + 1).padStart(2, "0"),
                  yyyy = today.getFullYear(),
                  nextYear = yyyy + 1,
                  dayMonth = "09/30/",
                  birthday = dayMonth + yyyy;
              
              today = mm + "/" + dd + "/" + yyyy;
              if (today > birthday) {
                birthday = dayMonth + nextYear;
              }
              //end
              
              const countDown = new Date(birthday).getTime(),
                  x = setInterval(function() {    
  
                    const now = new Date().getTime(),
                          distance = countDown - now;
  
                    document.getElementById("days").innerText = Math.floor(distance / (day)),
                      document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
                      document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
                      document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);
  
                    //do something later when date is reached
                    if (distance < 0) {
                      document.getElementById("headline").innerText = "It's my birthday!";
                      document.getElementById("countdown").style.display = "none";
                      document.getElementById("content").style.display = "block";
                      clearInterval(x);
                    }
                    //seconds
                  }, 0)
                }
  
            /* Plus Minus button js */
  
            var buttonPlus  = $(".quantity .plus");
            var buttonMinus = $(".quantity .minus");
  
            var incrementPlus = buttonPlus.click(function() {
              var $n = $(this)
              .parent(".quantity")
              .find(".input-qty");
              $n.val(Number($n.val())+1 );
            });
  
            var incrementMinus = buttonMinus.click(function() {
              var $n = $(this)
              .parent(".quantity")
              .find(".input-qty");
              var amount = Number($n.val());
              if (amount > 0) {
                $n.val(amount-1);
              }
            });
  
            /* Page scroll */
            $(".scroll a").click(function (event) {
              $('.scroll a').removeClass("active");
              event.preventDefault();
              var full_url = this.href;
              var parts = full_url.split("#");
              var trgt = parts[1];
              var target_offset = $("#" + trgt).offset();
              var target_top = target_offset.top;
              $('html, body').animate({scrollTop: target_top - 100 }, 0);
              $(this).addClass("active");
            });
  
            /* Search Popup */
            $(document).on("click", ".search-icon, .close-search", function(){
              $('.search-bar').toggleClass("open");
            });
            
          },
  
          
  
          /*======================================
           02. Slider Open JS
          ========================================*/
        all_slider: function () {
  
        /*Trending Collection slider*/
        var swiper = new Swiper(".trending-collection-slider .swiper", {
          slidesPerView: 1,
          spaceBetween: 0,
          navigation: {
            nextEl: ".trending-collection-section .swiper-button-next",
            prevEl: ".trending-collection-section .swiper-button-prev",
          },
          breakpoints: {
            640: {
              slidesPerView: 2,
            },
            768: {
              slidesPerView: 3,
            },
            1024: {
              slidesPerView: 4,
            },
          },
        });
  
        
              /*hero slider*/
        var swiper = new Swiper(".hero-slider-section .swiper", {
          slidesPerView: 1,
          spaceBetween: 0,
          
          pagination: {
            el: ".hero-slider-section .swiper-pagination",
            clickable: true,
          },
        });
  
              /*Season Collection slider*/
        var swiper = new Swiper(".season-collection-slider .swiper", {
          slidesPerView: 1,
          spaceBetween: 15,
          navigation: {
            nextEl: ".season-collection-section .swiper-button-next",
            prevEl: ".season-collection-section .swiper-button-prev",
          },
          breakpoints: {
            640: {
              slidesPerView: 2,
            },
            768: {
              slidesPerView: 3,
              spaceBetween: 25,
            },
            1024: {
              slidesPerView: 3,
              spaceBetween: 32,
            },
          },
        });
  
               /*new arrival slider*/
        var swiper = new Swiper(".new-arrival-slider .swiper", {
          slidesPerView: 1,
          spaceBetween: 15,
          navigation: {
            nextEl: ".new-arrival-slider .swiper-button-next",
            prevEl: ".new-arrival-slider .swiper-button-prev",
          },
          breakpoints: {
            640: {
              slidesPerView: 2,
            },
            768: {
              slidesPerView: 3,
              spaceBetween: 20,
            },
            1024: {
              slidesPerView: 4,
              spaceBetween: 20,
            },
          },
        });
  
              /*testimonial slider*/
        var swiper = new Swiper(".testimonial-slider .mySwiper", {
          spaceBetween: 0,
          slidesPerView: 1,
          effect: "fade",
        });
        var swiper2 = new Swiper(".testimonial-slider .mySwiper2", {
          spaceBetween: 0,
          pagination: {
            el: ".testimonial-slider .swiper-pagination",
            clickable: true,
          },
          thumbs: {
            swiper: swiper,
          },
        });
  
              /*product gallery vertical*/
        var swiper = new Swiper(".product-gallery-vertical .mySwiper", {
          spaceBetween: 5,
          slidesPerView: 4,
          freeMode: true,
          watchSlidesProgress: true,
          direction: "vertical",
        });
        var swiper2 = new Swiper(".product-gallery-vertical .mySwiper2", {
          spaceBetween: 0,
          navigation: {
            nextEl: ".product-gallery-vertical .swiper-button-next",
            prevEl: ".product-gallery-vertical .swiper-button-prev",
          },
          thumbs: {
            swiper: swiper,
          },
        });
  
              /*product gallery horizontal*/
        var swiper = new Swiper(".product-gallery-horizontal .mySwiper", {
          spaceBetween: 5,
          slidesPerView: 3,
          freeMode: true,
          watchSlidesProgress: true,
  
          breakpoints: {
            640: {
              slidesPerView: 3,
            },
            768: {
              slidesPerView: 4,
            },
            1024: {
              slidesPerView: 5,
            },
          },
        });
        var swiper2 = new Swiper(".product-gallery-horizontal .mySwiper2", {
          spaceBetween: 0,
          navigation: {
            nextEl: ".product-gallery-horizontal .swiper-button-next",
            prevEl: ".product-gallery-horizontal .swiper-button-prev",
          },
          thumbs: {
            swiper: swiper,
          },
        });
  
        
      },
  
      
      /*======================================
       03. Tabs Open JS
      ========================================*/
      tabs_open: function() {
  
        $('.wc-tabs li, .tab-link-title').click(function(){
          var tab_id = $(this).attr('data-tab');
          $('.wc-tabs li, .tab-link-title').removeClass('active');
          $('.tabs-entry-content').removeClass('active');
          $(this).addClass('active');
          $("#"+tab_id).addClass('active');
        });
  
      },
  
      /*======================================
       04. Accordion Open JS
      ========================================*/
      accordion_open: function() {
  
        $("body").on("click",".accordion .accordion-title",function(){
          $(".accordion-content").slideUp(),
          $(this).hasClass("active")?($(this).next(".accordion-content").slideUp(),
            $(this).removeClass("active")):(
            $(".accordion .accordion-title").removeClass("active"),
            $(this).addClass("active"),
            $(this).next(".accordion-content").slideDown())
          });
  
      },
  
      /*======================================
       06. All popup JS
      ========================================*/
      all_popup_js: function() {
        
        /* Newsletter Popup JS */
          setTimeout(function() {
            $('body').find('.newsletter-popup-link').trigger('click');
          }, 2000);
        
      },
  
      /*=====================================
      07. Preloader JS
      ======================================*/  
      Preloader_js: function() {
        //After 2s preloader is fadeOut
        $('.preloader').delay(2000).fadeOut('slow');
        setTimeout(function() {
        //After 2s, the no-scroll class of the body will be removed
          $('body').removeClass('no-scroll');
        }, 2000); //Here you can change preloader time
      },
  
      
  
  
    };
    eCommerce.init();
  
  })(jQuery);