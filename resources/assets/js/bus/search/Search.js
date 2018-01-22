/**
 * The Search scripts
 *
 * @author Inon Baguio <inonbaguio@gmail.com>
 * @since 1.0.0
 */
var Search = (function() {

    'use strict';

    // placeholder for cached DOM elements
    var DOM = {};

    /**
     * Cache DOM
     */
    function cacheDom() {
        DOM.$viewArrivals = $('.viewArrivals');
        DOM.$busStopTitle = $('#busStopTitle');
        DOM.$stopDetails = $('#stopDetails');
        DOM.$userCoordinates = $('#usersCoordinates');
        DOM.$busSearchForm = $('#busSearchForm');
        DOM.$busNearMe = $('#nearMe');
    }

    /**
     * Bind DOM events
     */
    function bindEvents() {
        DOM.$viewArrivals.click(handleClick);
        DOM.$busNearMe.click(handleNearMeSearch);
    }

    /**
     * Parses Bust Stop details
     * @param {Object} data
     */
    function displayDetails(data) {
        DOM.$stopDetails.html('');
        DOM.$busStopTitle.html('Arrival times of Bus stop: <strong>' + data.data.BusStopCode + '</strong>');
        DOM.$stopDetails.html(data.html);
    }

    /**
     * Click handler for viewArrivals
     *
     * @param {Object} event
     */
    function handleClick(event) {
        DOM.$stopDetails.html('<strong class="text-center">..fetching</strong>');
        var url = '/bus-stops/' + this.getAttribute('data-code');

        Utilities
            .getData(url)
            .then(displayDetails),
            function(err, code) {
                alert('Error');
                console.log(err);
            };
    }

    /**
     * Function that gets user coordinates
     *
     * @param {Object} event
     */
    function handleNearMeSearch(event)
    {
        Utilities.getLocation(function(data) {
            DOM.$userCoordinates.val(data.coords.latitude + ',' + data.coords.longitude);
            DOM.$busSearchForm.submit();
        });
    }

    /**
     *  The init method
     */
    function init() {
        cacheDom();
        bindEvents();
    }

    return {
        init : init,
    }
}());
