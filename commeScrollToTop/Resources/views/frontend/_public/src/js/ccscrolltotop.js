(function($, window, StateManager) {

    $('div.cc-stt-floater').click(function () {
        if($('.is--storytelling').length) {
            // Show Header + Nav
            $('header').removeClass('is--invisible');
            $('nav').removeClass('is--invisible');
            // ScrollToTop
            $('.page-wrap').css('transform', 'translateY(0px)');
            // Set Home Active
            $('.emotion--section-nav .link--start').addClass('is--active');
   
        } else {
            $('html,body').stop();
            var scrollFrom = $('div.cc-stt-floater').data('show-from');
            if ($(window).scrollTop() > scrollFrom) {
                $('html,body').animate({
                     scrollTop: 0
                }, 1000);
            }
        }
        return false;
    });

    function displayScrollButton(element) {

        var scrolled = $(window).scrollTop(),
            el = $(element),
            scrollFrom = el.data('show-from'),
            showDesktop = el.data('show-desktop'),
            showTabletLandscape = el.data('show-tablet-landscape'),
            showTabletPortrait = el.data('show-tablet-portrait'),
            showMobileLandscape = el.data('show-mobile-landscape'),
            showMobilePortrait = el.data('show-mobile-portrait'),
            aPossibleStates = new Array()

        // Set States
        if (showMobilePortrait) {
            aPossibleStates.push('xs');
        }
        if (showMobileLandscape) {
            aPossibleStates.push('s');
        }
        if (showTabletPortrait) {
            aPossibleStates.push('m');
        }
        if (showTabletLandscape) {
            aPossibleStates.push('l');
        }
        if (showDesktop) {
            aPossibleStates.push('xl');
        }

        // If is correct state show/hide Button
        if (StateManager.isCurrentState(aPossibleStates)) {
            if (scrolled > scrollFrom) {
                // Change forbidden if Tablet/Mobile should not be shown
                el.show();
            } else {
                el.hide();
            }
        } else if (StateManager.getCurrentState()) {
            el.hide();
        }
    }

    $(window).scroll(function () {
        displayScrollButton('div.cc-stt-floater');
    });

    $(window).resize(function () {
        displayScrollButton('div.cc-stt-floater');
    });

})(jQuery, window, StateManager);
