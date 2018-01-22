/**
 * The Search scripts
 *
 * @author Inon Baguio <inonbaguio@gmail.com>
 * @since 1.0.0
 */
var Utilities = (function() {

    return {
        /**
         * GET Ajax helper function
         *
         * @param {String} url
         */
        getData: function(url) {
            return $.ajax({
                type: 'GET',
                url: url,
                dataType: 'json'
            });
        },

        /**
         * Function that retrieves users coordinates
         */
        getLocation : function(handler) {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(handler);
            } else {
                alert('Geolocation is not supported by this browser.');
            }
        }
    };
}());
