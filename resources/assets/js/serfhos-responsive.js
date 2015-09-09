/**
 * Responsive functionality
 *
 * @type object
 */
Serfhos.Responsive = {

    /**
     * @param boolean
     */
    currentToggle: null,

    /**
     * Initialize plugins
     *
     * @return void
     */
    initialize: function () {
        Serfhos.Responsive.registerResponsiveObjects();
        Serfhos.Responsive.registerMenuToggle();
    },

    /**
     * Register menu toggle interaction
     *
     * @return void
     */
    registerMenuToggle: function () {
        var container = jQuery('.serfhos-container'),
                button = jQuery('.menu-toggle-container');

        var toggleMenu = function () {
            var currentToggle = Serfhos.Responsive.currentToggle;

            if (null === currentToggle) {
                // check if toggle is active
                if (jQuery('.navigation-content.page-label:visible').length > 0) {
                    currentToggle = 'big';
                } else {
                    currentToggle = 'small';
                }

                // Remove no-toggle class
                container.removeClass('no-toggle');
            }

            if (currentToggle == 'small') {
                Serfhos.Responsive.currentToggle = 'big';
                container.addClass('toggle-big');
                container.removeClass('toggle-small');
            } else {
                Serfhos.Responsive.currentToggle = 'small';
                container.removeClass('toggle-big');
                container.addClass('toggle-small');
            }
        };

        button.click(toggleMenu);
    },

    /**
     * Interactive Toggles
     *
     * @return void
     */
    registerToggles: function () {
        var container = jQuery('.toggleable');
        if (container.length > 0) {
            container.each(function (pIndex, pElement) {
                var currentToggle = jQuery(pElement);
                var toggleGroup = null;
                if (currentToggle.hasClass('toggle-group')) {
                    var toggleClasses = currentToggle.prop('class').split(' ');
                    for (var i in toggleClasses) {
                        if (toggleClasses.hasOwnProperty(i)) {
                            if (toggleClasses[i].substring(0, 6) == 'group-') {
                                toggleGroup = jQuery('.' + toggleClasses[i]);
                                break;
                            }
                        }
                    }
                }
                currentToggle.find('.toggle-link').first().click(function (e) {
                    e.preventDefault();
                    if (currentToggle.hasClass('active')) {
                        currentToggle.removeClass('active');
                    } else {
                        if (toggleGroup) {
                            toggleGroup.removeClass('active');
                        }
                        currentToggle.addClass('active');
                    }
                });
            });
        }
    },

    /**
     * Display responsive objects matched on user agent
     *
     * @return void
     */
    registerResponsiveObjects: function () {
        if (Serfhos.Responsive.isInterfacePhone()) {
            jQuery(document.body).addClass('detected-phone');
            jQuery('.visible-phone').removeClass('hide');
            jQuery('.hidden-phone').addClass('hide');
        } else {
            jQuery('.visible-phone').addClass('hide');
            jQuery('.hidden-phone').removeClass('hide');
        }

        if (Serfhos.Responsive.isInterfaceTablet()) {
            jQuery(document.body).addClass('detected-tablet');
            jQuery('.visible-table').removeClass('hide');
            jQuery('.hidden-tablet').addClass('hide');
        } else {
            jQuery('.visible-tablet').addClass('hide');
            jQuery('.hidden-tablet').removeClass('hide');
        }
    },

    /**
     * Check if current interface is a phone
     *
     * @returns {boolean}
     */
    isInterfacePhone: function () {
        return (navigator.userAgent.match(/Android|iPhone|WebOS|BlackBerry|IEMobile|Opera Mini/i) && !navigator.userAgent.match(/iPod|iPad/i));
    },

    /**
     * Check if current interface is a tablet
     *
     * @returns {boolean}
     */
    isInterfaceTablet: function () {
        return (navigator.userAgent.match(/Tablet|iPad|iPod/i) && jQuery(window).width() <= 1280 && jQuery(window).height() <= 800)
    },


    /**
     * Check if current interface is not a phone or tablet
     *
     * @returns {boolean}
     */
    isInterfaceDesktop: function () {
        if (Serfhos.Responsive.isInterfacePhone()) {
            return false;
        } else if (Serfhos.Responsive.isInterfaceTablet()) {
            return false;
        }

        return true;
    },

    /**
     * Check if current screen is in configured breaking points for Extra Small
     *
     * @returns {boolean}
     */
    isScreenExtraSmall: function () {
        return (jQuery(window).width() < 768);
    },

    /**
     * Check if current screen is in configured breaking points for Small
     *
     * @returns {boolean}
     */
    isScreenSmaller: function () {
        return (jQuery(window).width() >= 480);
    },

    /**
     * Check if current screen is in configured breaking points for Small
     *
     * @returns {boolean}
     */
    isScreenSmall: function () {
        return (jQuery(window).width() >= 768);
    },


    /**
     * Check if current screen is in configured breaking points for Medium
     *
     * @returns {boolean}
     */
    isScreenMedium: function () {
        return (jQuery(window).width() >= 992);
    },

    /**
     * Check if current screen is in configured breaking points for Large
     *
     * @returns {boolean}
     */
    isScreenLarge: function () {
        return (jQuery(window).width() >= 1200);
    }

};
/**
 * On ready event
 */
jQuery(function () {
    Serfhos.Responsive.initialize();
});
