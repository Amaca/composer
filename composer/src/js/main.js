
console.log(mainTheme);

/*--------------------------------------------------
Window Scroll Header
--------------------------------------------------*/
function compactMenu() {
    jQuery(window).scroll( function () {
        if (jQuery(document).scrollTop() > 1) {
            jQuery('.main-menu').addClass('compact');
            jQuery('.header').addClass('compact');
            jQuery('.logo').addClass('compact');
        }
        else {
            jQuery('.main-menu').removeClass('compact');
            jQuery('.header').removeClass('compact');
            jQuery('.logo').removeClass('compact');
        }
    });
}


/*--------------------------------------------------
Nav
--------------------------------------------------*/
function nav(){
    jQuery('.nav-toggle').on('click', function () {
        jQuery('.nav-toggle, .main-nav, .main').toggleClass('open');

        if ( jQuery('.searchbar:not(.close)')) {
            jQuery('.searchbar').addClass('close');
            jQuery('.header').removeClass('search-open');
            jQuery('.btn-search').removeClass('open');
        }
        
        return false;
    });
}

/*--------------------------------------------------
Category Mobile Nav
--------------------------------------------------*/
function navCat() {
    if (jQuery('.cat-toggle').length) {
        jQuery('.cat-toggle').on('click', function () {
            jQuery(this).toggleClass('open');
            jQuery('.breadcrumbs .cont-right ul').toggleClass('open');
            return false;
        });
    }
}

/*--------------------------------------------------
Slick Slider Products
--------------------------------------------------*/
function featSlider() {
    jQuery('#product-slider').slick({
        arrows: false,
        dots: true,
        autoplay: false,
        fade: true,
        speed: 500,
        focusOnSelect: false,
        autoplaySpeed: 3000,
        pauseOnHover: false,
        adaptiveHeight: true,
        customPaging: function (slick, index) {
            
            return '<img src="' + wpInfo.templateUrl + '/dist/img/point.png">';
        }
    });
}

/*--------------------------------------------------
Slick Lightbox 
--------------------------------------------------*/
function startLightbox() {
    jQuery("a.fancybox").fancybox();
    jQuery(".post a.fancybox").fancybox();
}


/*--------------------------------------------------
Blog Gallery
--------------------------------------------------*/
function blogGallery() {
    $('.blog-gallery').slick({
        arrows: false,
        dots: true,
        autoplay: false,
        fade: true,
        speed: 500,
        focusOnSelect: false,
        autoplaySpeed: 3000,
        pauseOnHover: false,
        adaptiveHeight: true,
        customPaging: function (slick, index) {

            return '<img src="' + wpInfo.templateUrl + '/dist/img/point.png">';
        }
    });
}


/*--------------------------------------------------
Show More Button
--------------------------------------------------*/
function showMore() {
    jQuery('.more-info .btn-animate').on('click', function () {
        jQuery('.more-info .text').toggleClass('open').slideToggle(500, "easeOutExpo");

        var text = $('.more-info .btn-animate').text();
        $('.more-info .btn-animate').text(text == wpInfo.showMoreLabel ? wpInfo.showMoreClose : wpInfo.showMoreLabel);

        return false;
    });
}


/*--------------------------------------------------
Scroll Product Sub Categories
--------------------------------------------------*/
function subCatScroll() {
    $('ul li').on('click', 'a', function () {
        href = $(this).attr('href');
        id = $(href);
        offset = id.offset().top - 70;

        $('html, body').stop().animate({ scrollTop: offset }, 800, 'easeInOutQuart');

        return false;
    });
}


/*--------------------------------------------------
Open Search Bar
--------------------------------------------------*/
function searchBar() {
    jQuery('.btn-search').on('click', function () {
        jQuery('.searchbar').toggleClass('close');
        jQuery('.header').toggleClass('search-open'); 
        jQuery(this).toggleClass('open');
    });
}


/*--------------------------------------------------
Create Map
--------------------------------------------------*/
function createMap() {

        var map = jQuery('#map');
        var txtInfo = map.html();
        map.html('');

        map = new google.maps.Map(
         map.get(0),
         {
             center: new google.maps.LatLng(41.897869,12.577357),
             zoom: 14,
             mapTypeId: google.maps.MapTypeId.ROADMAP,
             mapTypeControl: true,
             mapTypeControlOptions: {
                 style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                 position: google.maps.ControlPosition.LEFT_BOTTOM
             }
         });

        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(41.897866,12.537357),
            icon: wpInfo.templateUrl + '/dist/img/point.png',
            map: map
        });

        var infoWindow = new google.maps.InfoWindow({
            content: txtInfo
        });

        function openIW(){
            infoWindow.open(map, marker);
	
        }

        setTimeout(function () { infoWindow.close(); }, 5);

        google.maps.event.addListener(marker, 'click', openIW);

        google.maps.event.addListener(infoWindow,'closeclick',function(){

        });


        google.maps.event.trigger(marker, 'click');
        map.panBy(-500,40);
        map.set('styles', [
          {
              "featureType": "water",
              "elementType": "geometry",
              "stylers": [
                  {
                      "color": "#e9e9e9"
                  },
                  {
                      "lightness": 17
                  }
              ]
          },
          {
              "featureType": "landscape",
              "elementType": "geometry",
              "stylers": [
                  {
                      "color": "#f5f5f5"
                  },
                  {
                      "lightness": 20
                  }
              ]
          },
          {
              "featureType": "road.highway",
              "elementType": "geometry.fill",
              "stylers": [
                  {
                      "color": "#ffffff"
                  },
                  {
                      "lightness": 17
                  }
              ]
          },
          {
              "featureType": "road.highway",
              "elementType": "geometry.stroke",
              "stylers": [
                  {
                      "color": "#ffffff"
                  },
                  {
                      "lightness": 29
                  },
                  {
                      "weight": 0.2
                  }
              ]
          },
          {
              "featureType": "road.arterial",
              "elementType": "geometry",
              "stylers": [
                  {
                      "color": "#ffffff"
                  },
                  {
                      "lightness": 18
                  }
              ]
          },
          {
              "featureType": "road.local",
              "elementType": "geometry",
              "stylers": [
                  {
                      "color": "#ffffff"
                  },
                  {
                      "lightness": 16
                  }
              ]
          },
          {
              "featureType": "poi",
              "elementType": "geometry",
              "stylers": [
                  {
                      "color": "#f5f5f5"
                  },
                  {
                      "lightness": 21
                  }
              ]
          },
          {
              "featureType": "poi.park",
              "elementType": "geometry",
              "stylers": [
                  {
                      "color": "#dedede"
                  },
                  {
                      "lightness": 21
                  }
              ]
          },
          {
              "elementType": "labels.text.stroke",
              "stylers": [
                  {
                      "visibility": "on"
                  },
                  {
                      "color": "#ffffff"
                  },
                  {
                      "lightness": 16
                  }
              ]
          },
          {
              "elementType": "labels.text.fill",
              "stylers": [
                  {
                      "saturation": 36
                  },
                  {
                      "color": "#333333"
                  },
                  {
                      "lightness": 40
                  }
              ]
          },
          {
              "elementType": "labels.icon",
              "stylers": [
                  {
                      "visibility": "off"
                  }
              ]
          },
          {
              "featureType": "transit",
              "elementType": "geometry",
              "stylers": [
                  {
                      "color": "#f2f2f2"
                  },
                  {
                      "lightness": 19
                  }
              ]
          },
          {
              "featureType": "administrative",
              "elementType": "geometry.fill",
              "stylers": [
                  {
                      "color": "#fefefe"
                  },
                  {
                      "lightness": 20
                  }
              ]
          },
          {
              "featureType": "administrative",
              "elementType": "geometry.stroke",
              "stylers": [
                  {
                      "color": "#fefefe"
                  },
                  {
                      "lightness": 17
                  },
                  {
                      "weight": 1.2
                  }
              ]
          }
        ]);

}


/*--------------------------------------------------
DOC READY
--------------------------------------------------*/
$(function () {
    //Prende la path localizzata da functions.php
    //console.log(wpInfo);

    if (wpInfo.contatti == wpInfo.postID) {
        createMap();
    }

    if (wpInfo.isSinglePost) {
        showMore();
        featSlider();
        blogGallery();
    }

    if (wpInfo.isProductCat) {
        subCatScroll();
    }

    if (jQuery(window).width() > 1199) {
        var s = skrollr.init({
            forceHeight: false
        });
    }

    compactMenu();
    nav();
    navCat();
    startLightbox();
    searchBar();

}); 
  
    
/*--------------------------------------------------
WIN LOAD
--------------------------------------------------*/
$(window).on('load', function () {
});                    