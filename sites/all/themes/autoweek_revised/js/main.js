/*
    **********
    SECTION 01 - VARIABLES AND BASE FUNCTIONS
    **********
*/
jQuery(document).ready(function($) { 
    // Define variables
    var wind = $(window);
        body = $('body');
        breakpoints = [320, 480, 550, 650, 720, 790, 1000, 1190];
        width = "phone";
        changed = true;
        sideNav = $('.side-nav-wrap');
        homeSideNav = $('.home .side-nav-wrap');
        sideNavActive = $('.side-nav a.current-page-item');
        sideNavInactive = $(sideNavActive).parent().siblings();
        sectionActive = $('.search li a.current-page-item');
        sectionInactive = $(sectionActive).parent().siblings();
        topNav = $('.top-nav');
        navBtn = $('.nav-btn');
        search = $('.search');
        searchBtn = $('.search-btn');
        mainNav = $('.main-nav');
        headerTopHeight = $('.header-top').outerHeight();
        clear = $('<div class="clear"></div>');
    
    
    // Check Width
    var checkWidth = (function() {
        var changed;
        if (wind.width() < 480) {
            if ( width == "phone" ) {
                changed = false;
            } else {
                changed = true;
                width = "phone";
            }
        } else if ( (wind.width() >= 480) && (wind.width() < 768) ) {
            if ( width == "phone-l" ) {
                changed = false;
            } else {
                changed = true;
                width = "phone-l";
            }
        } else if ( (wind.width() >= 768) && (wind.width() < 980) ) {
            if ( width == "tablet" ) {
                changed = false;
            } else {
                changed = true;
                width = "tablet";
            }
        } else if ( (wind.width() >= 980) && (wind.width() < 1230) ) {
            if ( width == "desktop" ) {
                changed = false;
            } else {
                changed = true;
                width = "desktop";
            }
        } else {
            if ( width == "desktop-l" ) {
                changed = false;
            } else {
                changed = true;
                width = "desktop-l";
            }
        }
        return changed;
    });
    checkWidth();
    
    
    
    
    /*
        **********
        SECTION 02 - ELEMENT POSITIONING
        **********
    */
    
    // Positioning Elements
    
    var positionElements = function() {
    
    // Side nav positioning
    
    if ( ( width == "desktop-l" ) || ( width == "desktop" ) ) {
        $('.side-nav-wrap').insertBefore('.main-body');
    } else {
        $('.side-nav-wrap').insertAfter(topNav);
    }
    
    // Move active page to top of side nav in mobile layouts
    
    sideNavActive.parent('li').addClass('currentParent');
    
    // If active page is not the first list element
    if ( $('.currentParent').is(':not(:first-child)') ) {
    
        function saveLocation(element) {
            var loc = {};
            var item = $(element).prev();
            loc.element = element;
            if (item.length) {
                loc.prev = item[0];
            } else {
                loc.parent = $(element).parent()[0];
            }
            return(loc);
        }
        function restoreLocation(loc) {
            if (loc.parent) {
                $(loc.parent).prepend(loc.element);
            } else {
                $(loc.prev).after(loc.element);
            }
        }
    
        if ( ( width == "desktop-l" ) || ( width == "desktop" ) ) {
            restoreLocation('.currentParent');
            saveLocation('.currentParent');
        } else {
            $('.currentParent').prependTo($('.side-nav'));
        }
    
    }
    
    // Specific page functionality
    
    switch(thisPage) {
    
    case "home":
        if ( ( width == "desktop-l" ) || ( width == "desktop" ) ) {
            $('.sidebar').append( $('.sb-wrap-one'), $('.sb-wrap-two'), $('.ad.two'), $('.social'), $('.ad.three'), $('.ad.four') );
            $('.ad.one').insertAfter('.picks');
        } else {
            $('.ad.one').insertAfter('.wrap-content.one');
            $('.ad.two').insertAfter('.wrap-content.two');
            clear.insertAfter('.sidebar .right');
        }
        break;
    
    
    case "aggregation":
        $('.side-nav-wrap').insertBefore('.main-body');
        if ( ( width == "desktop-l" ) || ( width == "desktop" ) ) {
            $('.ad.two').insertAfter('.wrap-content.one');
            $('.ad.one').insertAfter('.popular');
        } else {
            clear.insertAfter('.sidebar .right');
            $('.ad.two').insertAfter('.wrap-content.one');
            $('.ad.one').insertAfter('.wrap-content.two');
        }
        if ( width == "desktop-l" ) {
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-730x90.png" alt="Ad spot" /></a>');
        } else {
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot" /></a>');
        }
        break;
    
    
    case "article":
        if ( ( width == "desktop" ) || ( width == "desktop-l" ) ) {
            $('.sidebar').append( $('.sb-wrap-one'), $('.sb-wrap-two') );
        } else {
            clear.insertAfter('.sidebar .right');
            $('.sb-wrap-two').insertAfter('.wrap-content.two');
        }
        if ( width == "desktop-l" ) {
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-730x90.png" alt="Ad spot" /></a>');
        }
        if ( width == "desktop" ) {
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot" /></a>');
        }
        if ( width == "tablet" ) {
            $('.sb-wrap-one').prependTo($('.article .story.contents'));
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-730x90.png" alt="Ad spot" /></a>');
        } else {
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot" /></a>');
        }
        if ( ( width == "phone" ) || ( width == "phone-l" ) ) {
            $('.sb-wrap-one').prependTo($('.wrap-content.one'));
            $('.ad.one').insertAfter('.contents p:eq(3)');
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot" /></a>');
            $('.wrap-content .featured-gallery').prependTo('.main-body');
        } else {
            $('.ad.one').appendTo('.sb-wrap-one');
        }
        break;
    
    case "article-instaread":
    	if ( width == "desktop-l" ) {
    		$('.ad.two').empty().append('<a href="#"><img src="img/place-ad-730x90.png" alt="Ad spot" /></a>');
    	}
    	else if ( width == "desktop" ) {
    		$('.ad.two').empty().append('<a href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot" /></a>');
    	}
    	else if ( width == "tablet" ) {
    		$('.ad.two').empty().append('<a href="#"><img src="img/place-ad-730x90.png" alt="Ad spot" /></a>');
    	}
    	else if ( ( width == "phone" ) || ( width == "phone-l" ) ) {
    		$('.ad.two').empty().append('<a href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot" /></a>');
    	}
    	break;
    
    
    case "article-gallery":
    
        if ( ( width == "desktop" ) || ( width == "desktop-l" ) ) {
            $('.sidebar').insertAfter($('.main-body'));
            $('.sidebar').append( $('.sb-wrap-one'), $('.ad.one'), $('.sb-wrap-two') );
        } else {
            $('.ad.one').insertAfter($('.wrap-content.two'));
            $('.sidebar').prependTo($('.wrap-content.one'));
            $('.sb-wrap-two').insertAfter($('.ad.one'));
        }
        if ( width == "tablet" ) {
            $('.ad.one').empty().append('<a href="#"><img src="img/place-ad-730x90.png" alt="Ad spot" /></a>');
        } else {
            $('.ad.one').empty().append('<a href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot" /></a>');
        }
        if ( ( width == "phone" ) || ( width == "phone-l" ) || ( width == "desktop" )  ) {
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot" /></a>');
        } else {
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-730x90.png" alt="Ad spot" /></a>');
        }
        break;
    
    
    case "article-video":
        if ( ( width == "desktop-l" ) || ( width == "desktop" ) ) {
            $('.sidebar').append( $('.sb-wrap-one'), $('.ad.one'), $('.social'), clear );
        } else {
            $('.ad.one').insertAfter('.wrap-content.two');
        }
        if ( width == "desktop-l" ) {
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-730x90.png" alt="Ad spot" /></a>');
        }
        if ( width == "desktop" ) {
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot" /></a>');
        }
        if ( width == "tablet" ) {
            $('.ad.one').empty().append('<a href="#"><img src="img/place-ad-730x90.png" alt="Ad spot" /></a>');
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-730x90.png" alt="Ad spot" /></a>');
            $('.story.social').insertAfter('.story.around');
            clear.insertAfter('.story.social');
            $('.story.social').addClass('right');
            $('.story.around').removeClass('right');
        } else {
            $('.ad.one').empty().append('<a href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot" /></a>');
        }
        if ( ( width == "phone-l" ) || ( width == "phone" ) ) {
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot" /></a>');
            $('.story.social').insertAfter('.story.around');
            clear.insertAfter('.story.social');
            $('.story.social').addClass('right');
            $('.story.around').removeClass('right');
        }
        break;
    
    
    case "reviews-gallery":
        if ( ( width == "desktop-l" ) || ( width == "desktop" ) ) {
            $('.sidebar').append( $('.sb-wrap-one'), $('.ad.one'), $('.sb-wrap-two') );
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-730x90.png" alt="Ad spot" /></a>');
        } else {
            $('.sb-wrap-two').insertAfter($('.wrap-content.two'));
        }
        if ( width == "desktop" ) {
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot" /></a>');
        } else {
    
        }
        if ( width == "tablet" ) {
            $('.sidebar').prependTo($('.article .story.contents'));
            $('.ad.one').appendTo($('.sidebar'));
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-730x90.png" alt="Ad spot" /></a>');
        } else {
            $('.sidebar').insertAfter($('.main-body'));
        }
        if ( ( width == "phone-l" ) || ( width == "phone" ) ) {
            $('.sidebar').insertBefore($('.contents'));
            $('.review-summary').insertAfter('.contents > p:eq(2)');
            $('.ad.one').insertAfter('.contents > p:eq(4)');
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot" /></a>');
        } else {
            $('.review-summary').prependTo('.sb-wrap-one');
        }
        break;
    
    
    case "article-review":
        if ( ( width == "desktop-l" ) || ( width == "desktop" ) ) {
            $('.sidebar').append( $('.sb-wrap-one'), $('.ad.one'), $('.social') );
        } else {
            $('.ad.one').insertAfter('.wrap-content.one');
        }
        if ( width == "desktop-l" ) {
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-730x90.png" alt="Ad spot" /></a>');
        }
        if ( width == "desktop" ) {
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot" /></a>');
        }
        if ( width == "tablet" ) {
            $('.ad.one').empty().append('<a href="#"><img src="img/place-ad-730x90.png" alt="Ad spot" /></a>');
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-730x90.png" alt="Ad spot" /></a>');
        } else {
            $('.ad.one').empty().append('<a href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot" /></a>');
        }
        if ( ( width == "phone-l" ) || ( width == "phone" ) || ( width == "tablet" ) ) {
            $('.story.social').insertAfter('.story.around');
            clear.insertAfter('.story.social');
        } else {
            $('.story.social').insertAfter('.ad.one');
        }
        if ( ( width == "phone-l" ) || ( width == "phone" ) ) {
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot" /></a>');
        }
        break;
    
    
    case "article-review-select":
    
        $('.side-nav .current-page-item').parent('li').addClass('currentParent');
        function saveLocation(element) {
            var loc = {};
            var item = $(element).prev();
            loc.element = element;
            if (item.length) {
                loc.prev = item[0];
            } else {
                loc.parent = $(element).parent()[0];
            }
            return(loc);
        }
        function restoreLocation(loc) {
            if (loc.parent) {
                $(loc.parent).prepend(loc.element);
            } else {
                $(loc.prev).after(loc.element);
            }
        }
        saveLocation('.currentParent');
    
        if ( ( width == "desktop-l" ) || ( width == "desktop" ) ) {
            restoreLocation('.currentParent');
            $('.sidebar').append( $('.sb-wrap-one'), $('.ad.one'), $('.social') );
            $('.side-nav').prepend($('.currentPlaceholder'));
        } else {
            $('.currentParent').prependTo($('.side-nav'));
            $('.ad.one').insertAfter('.wrap-content.one');
            $('.hide').prepend($('.currentPlaceholder'));
        }
        if ( width == "desktop-l" ) {
            //$('.ad.two').empty().append('<a href="#"><img src="img/place-ad-730x90.png" alt="Ad spot" /></a>');
            $('.ad.two a img').attr('src', 'img/place-ad-730x90.png');
        }
        if ( width == "desktop" ) {
            //$('.ad.two').empty().append('<a href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot" /></a>');
            $('.ad.two a img').attr('src', 'img/place-ad-300x250.jpg');
        }
        if ( width == "tablet" ) {
    	    $('.ad.one').insertAfter('.wrap-content.one');
            //$('.ad.one').empty().append('<a href="#"><img src="img/place-ad-730x90.png" alt="Ad spot" /></a>');
            $('.ad.one a img').attr('src', 'img/place-ad-730x90.png');
            //$('.ad.two').empty().append('<a href="#"><img src="img/place-ad-730x90.png" alt="Ad spot" /></a>');
            $('.ad.two a img').attr('src', 'img/place-ad-730x90.png');
            $('.story.social').insertAfter('.story.around');
            clear.insertAfter($('.story.social'));
            $('.story.social').addClass('right');
            $('.story.around').removeClass('right');
        } else {
            //$('.ad.one').empty().append('<a href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot" /></a>');
            $('.ad.one').insertBefore('.wrap-content.one');
            $('.ad.one a img').attr('src', 'img/place-ad-300x250.jpg');
        }
        if ( ( width == "phone-l" ) || ( width == "phone" ) ) {
            //$('.ad.two').empty().append('<a href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot" /></a>');
            $('.ad.two a img').attr('src', 'img/place-ad-300x250.jpg');
            
            $('.story.social').insertAfter('.story.around');
            clear.insertAfter($('.story.social'));
            $('.story.social').addClass('right');
            $('.story.around').removeClass('right');
        }
        break;
    
    case "racing-landing":
        if ( ( width == "desktop-l" ) || ( width == "desktop" ) ) {
            // $('.sidebar').append( $('.sb-wrap-one'), $('.sb-wrap-two'), $('.ad.two'), $('.social'), $('.twitterfeed'), $('.ad.three'), $('.ad.four') );
            $('.ad.one').insertAfter('.picks');
            $('.ad.two').insertAfter('.sb-wrap-two');
        } else {
            $('.ad.one').insertAfter('.wrap-content.one');
            $('.ad.two').insertAfter('.wrap-content.two');
            clear.insertAfter('.sidebar .right');
        }
        if ( ( width == "desktop" ) || ( width == "phone" ) || ( width == "phone-l" )  ) {
            $('.ad.five').empty().append('<a href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot" /></a>');
        } else {
            $('.ad.five').empty().append('<a href="#"><img src="img/place-ad-730x90.png" alt="Ad spot" /></a>');
        }
        break;
    
    case "racing-article":
        if ( ( width == "desktop" ) || ( width == "desktop-l" ) ) {
            $('.sidebar').append( $('.sb-wrap-one'), $('.sb-wrap-two'), $('.sb-wrap-three') );
            $('.standings.sb').insertAfter($('.schedule.sb'));
        } else {
            clear.insertAfter('.sidebar .right');
            $('.sb-wrap-two').insertAfter('.wrap-content.two');
            $('.sb-wrap-three').insertAfter('.sb-wrap-two');
        }
        if ( width == "desktop-l" ) {
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-730x90.png" alt="Ad spot" /></a>');
        }
        if ( width == "desktop" ) {
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot" /></a>');
        }
        /*
        if ( ( width == "tablet" ) || ( width == "desktop" ) || ( width == "desktop-l" ) ) {
            $('.track-info').addClass('expanded');
            $('.track-info .toggle').hide();
            $('.track-info .cb-toggle').show();
            $('.track-info h2 a').hide();
            // $('.track-info .more-track-info').hide();
        } else {
            $('.track-info').removeClass('expanded');
            $('.track-info .toggle').show();
            $('.track-info .cb-toggle').hide();
            $('.track-info h2 a').show();
            // $('.track-info .more-track-info').show();
        }
        */
        if ( width == "tablet" ) {
            $('.sb-wrap-one').prependTo($('.article .story.contents'));
            $('.standings.sb').insertBefore($('.story.picks'));
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-730x90.png" alt="Ad spot" /></a>');
        }
        if ( ( width == "phone" ) || ( width == "phone-l" ) ) {
            $('.sb-wrap-one').prependTo($('.wrap-content.one'));
            $('.ad.one').insertAfter('.contents p:eq(3)');
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot" /></a>');
            $('.wrap-content .featured-gallery').prependTo('.main-body');
        } else {
            $('.ad.one').insertAfter('.story.social');
        }
        break;
    
    case "series-landing":
        if ( ( width == "desktop-l" ) || ( width == "desktop" ) ) {
            $('.ad.one').insertAfter('.sb-wrap-one');
            $('.sb-wrap-two').insertAfter('.ad.one');
            // $('.sidebar').append( $('.sb-wrap-one'), $('.ad.one'), $('.sb-wrap-two'), $('.sb-wrap-three') );
        } else {
            $('.ad.one').insertAfter('.wrap-content.one');
        }
        if ( width == "desktop-l" ) {
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-730x90.png" alt="Ad spot" /></a>');
        }
        if ( width == "desktop" ) {
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot" /></a>');
        }
        if ( width == "tablet" ) {
            $('.ad.one').empty().append('<a href="#"><img src="img/place-ad-730x90.png" alt="Ad spot" /></a>');
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-730x90.png" alt="Ad spot" /></a>');
        } else {
            $('.ad.one').empty().append('<a href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot" /></a>');
        }
        if ( ( width == "phone-l" ) || ( width == "phone" ) || ( width == "tablet" ) ) {
            $('.sb-wrap-two').insertAfter('.story.around');
            clear.insertAfter('.twitterfeed');
        } else {
            $('.sb-wrap-two').insertAfter('.ad.one');
        }
        if ( ( width == "phone-l" ) || ( width == "phone" ) ) {
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot" /></a>');
        }
        break;
    
    case "series-pressroom":
        $('.side-nav-wrap').insertBefore('.main-body');
        if ( ( width == "desktop-l" ) || ( width == "desktop" ) ) {
            $('.ad.one').insertAfter('.around');
        } else {
            $('.ad.one').insertAfter('.wrap-content.one');
        }
        if ( width == "tablet" ) {
            $('.ad.one').empty().append('<a href="#"><img src="img/place-ad-730x90.png" alt="Ad spot" /></a>');
        } else {
            $('.ad.one').empty().append('<a href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot" /></a>');
        }
        break;
    
    case "alms-standings":
        if ( width == "desktop" ) {
            $('.ad.two').appendTo('.outer-wrap');
        } else {
            $('.ad.two').appendTo('.main-body');
        }
        if ( width == "phone-l" ) {
            //$('.ad.one').insertAfter('.sb-wrap-one');
            $('.schedule').prependTo('.sb-wrap-two');
        } else {
            $('.schedule').prependTo('.sb-wrap-two');
            //$('.ad.one').insertAfter('.social');
        }
        if ( ( width == "phone" ) || ( width == "phone-l" ) ) {
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot" /></a>');
        } else {
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-730x90.png" alt="Ad spot" /></a>');
        }
        if ( width == "tablet" ) {
            // $('.schedule').prependTo('.sb-wrap-two');
        } else {
    
        }
        break;
    
    case "sprint-cup-standings":
        if ( ( width == "phone" ) || ( width == "phone-l" ) ) {
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot" /></a>');
        } else {
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-730x90.png" alt="Ad spot" /></a>');
        }
        // if ( ( width == "phone-l" ) ) {
        //     $('.ad.one').insertAfter('.social');
        //     $('.picks').insertAfter('.schedule');
        // } else {
        //     $('.ad.one').insertAfter('.schedule');
        //     $('.picks').appendTo('.sb-wrap-two');
        // }
        // if ( ( width == "tablet" ) || ( width == "desktop" ) ) {
        //     $('.ad.one').insertBefore('.picks');
        //     clear.insertAfter('.picks');
        // }
        break;
    
    case "sprint-cup-results":
        if ( ( width == "tablet" ) || ( width == "desktop" ) ) {
            $('.ad.one').empty().append('<a href="#"><img src="img/place-ad-730x90.png" alt="Ad spot" /></a>');
        } else {
            $('.ad.one').empty().append('<a href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot" /></a>');
        }
        if ( ( width == "phone" ) || ( width == "phone-l" ) ) {
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot" /></a>');
        } else {
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-730x90.png" alt="Ad spot" /></a>');
        }
        // if ( width == "desktop" ) {
        //     $('.ad.one').insertAfter('.sb-wrap-one');
        // } else {
        //     $('.ad.one').insertAfter('.race-stats');
        // }
        // if ( ( width == "desktop" ) ) {
        //     $('.schedule').prependTo('.sb-wrap-two');
        // } else {
        //     $('.schedule').insertAfter('.ad.one');
        // }
        // if ( ( width == "desktop" ) || ( width == "desktop-l" ) ) {
        //     $('.picks').appendTo('.sb-wrap-two');
        // } else {
        //     $('.picks').insertAfter('.schedule');
        // }
        // if ( width == "tablet" ) {
        //     $('.ad.one').empty().append('<a href="#"><img src="img/place-ad-730x90.png" alt="Ad spot" /></a>');
        // } else {
        //     $('.ad.one').empty().append('<a href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot" /></a>');
        // }
        break;
    
    case "driver-detail":
        if ( ( width == "phone" ) || ( width == "phone-l" )  ) {
    		$('.ad.two a img').attr('src', 'img/place-ad-300x250.jpg');
            //$('.ad.two').empty().append('<a href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot" /></a>');
        } else {
    		$('.ad.two a img').attr('src', 'img/place-ad-730X90.png');
           // $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-730X90.png" alt="Ad spot" /></a>');
        }
        if ( ( width == "phone" ) || ( width == "phone-l" )  ) {
            $('.driver-sb').insertAfter('.next-race-box');
        }
    
        break;
    
    case "sprint-cup-schedule":
        if ( ( width == "phone" ) || ( width == "phone-l" )  ) {
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot" /></a>');
        } else {
            $('.ad.two').empty().append('<a href="#"><img src="img/place-ad-730X90.png" alt="Ad spot" /></a>');
        }
        break;
    
    
    
    default:
        break;
    } // End switch
    console.log("Width is currently " + width);
    }; // positionElements
    positionElements();
    
    
    
    
    /*
        **********
        SECTION 03 - HEADER AND NAVIGATION FUNCTIONALITY
        **********
    */
    
    // Nav functionality
    
    var sideNavFunction = function() {
        if ( ( width == "phone" ) || ( width == "phone-l" ) || ( width == "tablet" ) ) {
            sideNavInactive.hide();
            sideNavActive.removeClass('expanded');
        } else {
            sideNavInactive.show();
        }
    };
    sideNavFunction();
    
    sectionInactive.hide();
    sectionActive.click(function(event) {
        sectionInactive.slideToggle(300);
        sectionActive.toggleClass('expanded');
        event.preventDefault();
    });
    
    sideNavActive.click(function(event) {
        if ( ( width == "phone" ) || ( width == "phone-l" ) || ( width == "tablet" ) ) {
            sideNavInactive.slideToggle(300);
            sideNavActive.toggleClass('expanded');
            event.preventDefault();
        } else {
            return false;
        }
    });
    
    navBtn.click(function() {
        topNav.slideToggle(300);
    });
    
    search.hide();
    searchBtn.click(function() {
        search.slideToggle(300);
    });
    
    // Sticky Header
    
    var fixedNav = false;
    
    var stickyHeader = function() {
        var headerTopHeight = $('.header-top').outerHeight();
        if ( ( width == "tablet" ) || ( width == "desktop" ) || ( width == "desktop-l" ) ) {
            if ( (wind.scrollTop() > headerTopHeight) ) {
                mainNav.addClass('fixed');
                if ( fixedNav == false) {
                    if ( width == "tablet" ) {
                        topNav.addClass("moved");
                        searchBtn.addClass("moved");
                        homeSideNav.addClass("moved");
                    }
                    $('.minilogo a').animate({'top':'0'}, "medium");
                    $('.subscribe-top img').fadeOut("medium");
                    $('.subscribe-top').animate({'top':'7px'}, "medium");
                    fixedNav = true;
                }
            } else {
                mainNav.removeClass('fixed');
                if ( fixedNav ) {
                    $('.subscribe-top').animate({'top':'-45px'}, "fast", function() {
                        $('.subscribe-top img').fadeIn("medium");
                    });
                    $('.minilogo a').animate({'top':'182px'}, "fast", function() {
                        if ( width == "tablet" ) {
                            topNav.removeClass("moved");
                            searchBtn.removeClass("moved");
                            homeSideNav.removeClass("moved");
                        }
                    });
                    fixedNav = false;
                }
            }
        }
    };
    stickyHeader();
    
    
    
    
    /*
        **********
        SECTION 04 - MISCELLANEOUS EXTRAS
        **********
    */
    
    // Add some necessary classes for styling
    
    $('.main-body a').has('img').each(function() {
        if ( !( ($(this).parent().hasClass('royalSlider')) || ($(this).hasClass('lightbox')) ) ) {
            $(this).addClass('img-wrap');
        }
    });
    $('.excerpt:first').addClass('first-on-page');
    $('.contents .featured:first').addClass('first-featured');
    
    
    // Vertically center excerpts
    
    var verticalCenter = function() {
        $('.center .excerpt').each(function() {
            $(this).attr("style","");
            if( ( ($(this).siblings('.img-wrap').width() != $(this).parent().width()) ) && ($(this).height() < ($(this).siblings('.img-wrap').height())) ) {
                $(this).css({
                    "position":"absolute",
                    "top":"50%",
                    "margin-top":( 0 - ( $(this).height() / 2 ) ) + "px"
                });
            }
        });
    }
    
    wind.bind("load", function() {
        verticalCenter();
    });
    
    
    // Standings Tables
    
    function initHideTables() {
        $(".standings-wrapper").each(function(){
            var _holder = $(this);
            var _slide = _holder.find(" > table");
            var _opener = _holder.find(".dropdown");
            var _slideSpeed = 0;
    
            _opener.click(function(){
                if ( ( width == "tablet" ) || ( width == "desktop" ) || ( width == "desktop-l" ) ) {
                    return false;
                } else {
                    if(_holder.hasClass("active")) {
                        _slide.slideUp(_slideSpeed,function(){
                            _holder.removeClass("active");
                        });
                    }
                    else {
                        _slide.slideDown(_slideSpeed,function(){
                            _holder.addClass("active");
                        });
                    }
                    return false;
                }
            });
        });
    }
    
    $(document).ready(function(){
        initHideTables();
    });
    
    
    // Press room page collapsing
    
    if ( thisPage == "series-pressroom" ) {
        $('.expanded').hide();
        $('.readmore a').each(function() {
          $(this).click(function() {
                var expanded = $(this).parent().siblings(".expanded");
                if ( expanded.is(':visible') ) {
                    expanded.hide();
                    $(this).text("Read More");
                } else {
                    expanded.show();
                    $(this).text("Read Less");
                }
                $(this).toggleClass("arrowup");
            });
        });
    }
    
    
    // Track information sidebar module
    $('.track-info .toggle').click(function(){
        $('.track-info').toggleClass('expanded');
    });
    
    
    // Toggle lightbox off on mobile layouts
    var toggleLightbox = function(){
        $(".lightbox").each(function() {
            $(this).wrap(function() {
              return "<div class='lbWrap' />";
            });
            if ( ( width == "phone" ) || ( width == "phone-l" ) ) {
                $(this).click(function(){
                    return false;
                });
                $(this).children('.lightboxBtn').hide();
            } else {
                $(this).click(function(){
                    return true;
                });
                $(this).children('.lightboxBtn').show();
            }
        });
    };
    toggleLightbox();
    
    
    // Prevent clicking empty links
    $("a[href='#']").click(function() {
        return false;
    });
    
    /*
        **********
        SECTION 05- RESPONSIVE FUNCTIONALITY
        **********
    */
    
    // Responsive Events
    
    var responsiveEvents = function() {
        widthChanged = checkWidth();
        verticalCenter();
        if (widthChanged) {
            // Make sure nav button is correct
            if ( navBtn.is(':visible') ) {
                topNav.hide();
            } else {
                topNav.show();
            }
            if ( sideNavInactive.is(':visible') ) {
                sideNavActive.addClass('expanded');
            } else {
                sideNavActive.removeClass('expanded');
            }
            sideNavFunction();
            stickyHeader();
            positionElements();
            toggleLightbox();
            setTimeout(function() {
                verticalCenter();
            },300);
        }
    };
    
    wind.resize(function() {
        responsiveEvents();
    });
    
    wind.on('focus', function() {
        responsiveEvents();
        body.css("display","inline-block");
        body.offsetHeight;
        body.css("display","block");
    });
    
    wind.scroll(function() {
        stickyHeader();
    });
    
    // UGH, sadly I have to add this.
    $(window).on('resize', function()
    {
    	if( thisPage == "driver-detail" )
    	{
    		if(  $(window).width() <= 768 && $(window).width() > 480 )
    		{
    			if( $('.sidebar-min').length < 1 )
    			{
    				var sbMin = $( document.createElement('div') ).addClass('sidebar-min');
    				sbMin.prependTo('.article-wrap .dr-excerpt')
    				
    				sbMin.append( $('.sb.social') );
    				sbMin.append( $('.ad.two') );
    			}
    		}
    		else
    		{
    			if( $('.sidebar-min').length > 0 )
    			{
    				$('.sb.social').prependTo( $('.sb-wrap-one') );
    				
    				$('.ad.two').appendTo( $('.outer-wrap') );
    				
    				if( $('.article-wrap .sidebar-min').children().length == 0 )
    				{
    					$('.article-wrap .sidebar-min').remove();
    				}
    			}
    		}
    	}
    });
    
    // Fix iPad Scrolling
    document.addEventListener("touchmove", ScrollStart, false);
    
    function ScrollStart() {
        stickyHeader();
    }
    
    /*
        **********
        SECTION 05- PLUGIN CONFIGURATION
        **********
    */
    
    // If RoyalSlider exists on page
    if ( $('.royalSlider').length > 0 ) {
    
    // RoyalSlider inits
    
    $('.featured-gallery').royalSlider({
      fullscreen: {
        enabled: false
      },
      controlNavigation: 'thumbnails',
      autoHeight: true,
      imageScaleMode: 'none',
      autoScaleSlider: false,
      imageAlignCenter: false,
      loop: false,
      navigateByClick: true,
      numImagesToPreload:2,
      arrowsNav:true,
      arrowsNavAutoHide: false,
      arrowsNavHideOnTouch: true,
      keyboardNavEnabled: true,
      fadeinLoadedSlide: true,
      globalCaption: true,
      globalCaptionInside: false,
      imageScalePadding: false,
      allowCSS3: false,
      thumbs: {
        firstMargin: true,
        fitInViewport: false
      }
    });
    
    $('.content-gallery').royalSlider({
      fullscreen: {
        enabled: false
      },
      controlNavigation: 'none',
      autoHeight: true,
      imageScaleMode: 'none',
      autoScaleSlider: false,
      imageAlignCenter: false,
      loop: false,
      navigateByClick: true,
      numImagesToPreload:2,
      arrowsNav:true,
      arrowsNavAutoHide: false,
      arrowsNavHideOnTouch: true,
      keyboardNavEnabled: true,
      fadeinLoadedSlide: true,
      globalCaption: false,
      imageScalePadding: false,
      allowCSS3: false
    });
    
    $('.landing-featured').royalSlider({
      fullscreen: {
        enabled: false
      },
      controlNavigation: 'bullets',
      autoHeight: true,
      imageScaleMode: 'none',
      autoScaleSlider: false,
      imageAlignCenter: false,
      loop: false,
      navigateByClick: true,
      numImagesToPreload:2,
      arrowsNav:true,
      arrowsNavAutoHide: true,
      arrowsNavHideOnTouch: true,
      keyboardNavEnabled: true,
      fadeinLoadedSlide: true,
      globalCaption: true,
      imageScalePadding: false,
      allowCSS3: false,
      controlsInside: true
    });
    
    $('.video-gallery').royalSlider({
        arrowsNav: false,
        fadeinLoadedSlide: true,
        controlNavigationSpacing: 0,
        controlNavigation: 'none',
        keyboardNavEnabled: true,
        autoHeight: true,
        imageScaleMode: 'none',
    	autoScaleSlider: false,
    	imageAlignCenter: false,
        slidesSpacing: 0,
        loop: false,
        loopRewind: true,
        video: {
          autoHideArrows:true,
          autoHideControlNav:false,
          autoHideBlocks: true
        }
    });
    
    // RoyalSlider element positioning
    
    var caption = $('.featured-gallery .rsGCaption');
        caption.each(function() {
            $(this).insertAfter( $(this).siblings('.rsOverflow') );
        });
        clear.insertAfter($('.featured-gallery .rsNavItem:last'));
        clear.insertAfter($('.featured-gallery .rsThumbs'));
    
    } // End if royalSlider exists
    
    // Colorbox
    
    $(".lightbox").colorbox({
        scalePhotos: false,
        opacity: 1
    });
    
    // see more stories function
    $('.see-more > a').click(function() {
        $('.see-more > a').addClass('.see-more-clicked');
        $('.older-content').toggle("fast");
    });
    
    //driver-detail dropdown
    $('.driver-stats-header').click(function() {
        $('.season-stats-list').toggle("fast");
        $('.stats-triangle').removeClass("stats-triangle").toggleClass("triangle");
    });
    
    //login-box functionality
    $(window).on('load', function()
    {
        if( $('a.login').length > 0 )
        {
        	$('a#policy_toggle').on('click', function( event )
        	{
                event.preventDefault();
                
    	    	$('.policy').css({ 'display' : 'block', 'opacity' : 0  });
    	    	$('.policy').animate({ 'opacity' : 1 }, 350);
        	});
        	
            $('.policy a.close').on('click', function( event )
            {
                event.preventDefault();
                
               $('.policy').animate({ 'opacity' : 0 }, 350, function(){ $('.policy').css({ 'display' : 'none'}); });
            });
            
            
            $('a.login').on('click', function( event )
            {
                event.preventDefault();
                
                $('.login-popup').css({ 'display' : 'block', 'opacity' : 0 , 'position' : 'absolute', 'right' : 0, 'top' : 0, 'z-index' : 100 });
                $('.login-popup').animate({ 'opacity' : 1 }, 350);
            });
            
            $('.login-popup a.close').on('click', function( event )
            {
                event.preventDefault();
                
               $('.login-popup').animate({ 'opacity' : 0 }, 350, function(){ $('.login-popup').css({ 'display' : 'none'}); });
            });
            
        }
    	
    	$(window).resize();
    });
    
    
    //product page videos
    
    $('.product-img').click(function(){
        var video = '<iframe src="'+ $(this).attr('data-video') +'"></iframe>';
        $(this).replaceWith(video);
    });
    
})