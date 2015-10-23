(function() {
	
	fixNavigation();

	//rangeSlider();

	//searchDropdowns();

	//tabsSwitcher();

	fixFooter();

})();

function fixNavigation() {
	jQuery('.navigation li:has(ul)').addClass('exp');
	
	jQuery('.mobileOnly .navigation .exp').on('click', function(e) {
		jQuery(this).toggleClass('active');
	});

	jQuery('.mobileOnly .navigation .exp > a').on('click', function(e) {
		e.preventDefault();
	});

	jQuery('.header').on('click', '.mobileNavBtn', function(e) {
		jQuery(e.delegateTarget).toggleClass('active');
		jQuery('.navigationWrapper.mobileOnly').toggleClass('stretched');

		if( jQuery('.navigationWrapper.mobileOnly').hasClass('stretched') ) {
			jQuery('.navigationWrapper.mobileOnly').css('min-height', jQuery(window).height()-jQuery('.header').height());
		} else {
			jQuery('.navigationWrapper.mobileOnly').css('min-height', 'auto');
		}

		jQuery('#overlay').toggleClass('active');
	});

	jQuery('#overlay').on('click', function(e) {
		jQuery('.header .mobileNavBtn').click();
	});

}

function rangeSlider() {
	var element = jQuery("#priceRange"),
		range;
	
	if( element.length > 0 ) {
		range = element.attr('data-range').split('-');
	} else {
		return;
	}

	element.noUiSlider({
	    range: {
	        'min': parseFloat( range[0] ),
	        'max': parseFloat( range[1] )
	    },
	    start: [parseFloat( range[0] ), parseFloat( range[1] )],
	    connect: true
	});

	jQuery("#priceRange").Link('lower').to( jQuery('#priceRange_lower') );
	jQuery("#priceRange").Link('upper').to( jQuery('#priceRange_upper') );
};

function searchDropdowns() {
	var dd_control = jQuery('#searchForm .searchParam'),
		current;

	dd_control.on('click', function(e) {	
		// jQuery(this).toggleClass('active');
		if( current && (jQuery(this).attr('data-target').split('.')[2] != current.split('.')[2]) ) {
			jQuery(current).removeClass('active');
		}
		current = jQuery(this).attr('data-target');
		jQuery(current).toggleClass('active');
	});

};


function tabsSwitcher() {
	var container = jQuery('.contentTabs');

	container.each(function() {
		var container = this,
			tabs = jQuery('.tabsPanel a', container);

		tabs.on('click', function(e) {
			e.preventDefault();

			jQuery('.contentItem', container).removeClass('active');
			jQuery('.contentItem.'+ jQuery(this).attr('data-target'), container).toggleClass('active');
			tabs.removeClass('active');
			jQuery(this).toggleClass('active');
		});
	});

};

function fixFooter() {
	var pages = [
		'search',
		'mainPage'
	];

	pages.forEach(function(page) {

		if( jQuery('#'+page).length > 0 ) {
			jQuery('body').css('height', '100%');
		}

	});
};



jQuery('document').ready(function() {
    jQuery('.neighborhoods-filter').click(function() {
        jQuery('.neighborhoods-filter').each(function(index, item) {
            jQuery(item).removeClass('active');
        });
        jQuery(this).addClass('active');
        var filter = jQuery(this).data('filter');
        if (filter!='') {
            jQuery('.cat-'+filter).show();
            jQuery('.neighborhoods .images > div').not('.cat-'+filter).hide();
        } else {
            jQuery('.neighborhoods .images > div').show();
        }
    });
    
   jQuery('.img-responsive').each(function() {
   	 jQuery(this).wrap('<figure class="tint"></figure>');
   });

jQuery('.about .inner-btn, .next, .about .nav ul li a').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = jQuery(this.hash);
      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        jQuery('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });

   // jQuery('.nav').hide();
		
	jQuery(window).scroll(function() {
	    var windscroll = jQuery(window).scrollTop();
	    if (windscroll >= 795) {
	        jQuery('.nav').addClass('fixed').animate({position:"fixed"}, 500, 'swing');
	        jQuery('.about section').each(function(i) {
	            if (jQuery(this).position().top <= windscroll + 20) {
	                jQuery('.nav a.active').removeClass('active');
	                jQuery('.nav a').eq(i).addClass('active');
	            }
	        });

	    } else {

	        jQuery('.nav').removeClass('fixed');
	        jQuery('.nav a.active').removeClass('active');
	        jQuery('.nav a:first').addClass('active');
	    }
	});
}); //-->end document.ready










