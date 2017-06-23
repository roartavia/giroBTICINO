function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        console.log("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {
    var x = document.getElementById("demo");
    var latitud = document.getElementById("latitud");
    var longitud = document.getElementById("longitud");
    latitud.value = position.coords.latitude;
    longitud.value = position.coords.longitude;

}

(function() {
    'use strict';
    window.onload = function() {
        var selector = document.getElementById("selector");
        if(selector) {
            selector.onclick = function() {
                var checkboxes = document.getElementsByClassName("checkbox");
                for (var i = 0; i < checkboxes.length; i++) {
                    var element = checkboxes[i];
                    if (element.classList.contains('hidden')) {
                        element.classList.remove("hidden");
                        element.classList.add("shown");
                    } else {
                        element.classList.remove("shown");
                        element.classList.add("hidden");
                    }
                }
            };
        }

        var closeItems = document.getElementById("close_btn");
        if(closeItems) {
            closeItems.onclick = function () {
                    var divModal = document.getElementsByClassName("section-modal-legal-disclaimer")[0];
                    var divBlackBG = document.getElementsByClassName("section-black-modal-BG")[0];
                    divModal.classList.remove('shown');
                    divBlackBG.classList.remove('shown');
                    divModal.classList.add('hidden');
                    divBlackBG.classList.add('hidden');
            }
        }

        var btnGetLocation = document.getElementById("getLocation");
        if(btnGetLocation) {
            btnGetLocation.onclick = function () {
                    getLocation();
            }
        }
    };
})();
