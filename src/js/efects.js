(function() {
    'use strict';
    window.onload = function() {
        var selector = document.getElementById("selector");
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
    };
})();
