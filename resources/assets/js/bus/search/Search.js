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
    }

    /**
     * Bind DOM events
     */
    function bindEvents() {
        DOM.$viewArrivals.click(handleClick);
    }

    /**
     * Parses Bust Stop details
     * @param {Object} data
     */
    function displayDetails(data)
    {
        DOM.$busStopTitle.html('Arrival times of Bus stop: <strong>' + data.data.BusStopCode + '</strong>');
        DOM.$stopDetails.html(data.html);
    }

    /**
     * Click handler for viewArrivals
     *
     * @param {Object} event
     */
    function handleClick(event) {
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