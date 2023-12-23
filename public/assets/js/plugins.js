// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }

    // map popup

var showMap = $('#show-map');

function initialize() {
    var mapOptions = {
	    center: { lat: 0, lng: 0 },
	    zoom: 8
	};
	var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
}

$(document).ready(function(){
    $('#show-map').on('click',initialize)
});
}());

// Place any jQuery/helper plugins in here.

// map popup

var showMap = $('#show-map');

function initialize() {
    var mapOptions = {
	    center: { lat: 0, lng: 0 },
	    zoom: 8
	};
	var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
}

$(document).ready(function(){
    $('#show-map').on('click',initialize)
});

