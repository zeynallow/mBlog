(function($) {
    "use strict";

    document.getElementById('hamburgler').addEventListener('click', checkNav);
    window.addEventListener("keyup", function(e) {
        if (e.keyCode === 27) closeNav();
    }, false);

    function checkNav() {
        if (document.body.classList.contains('hamburgler-active')) {
            closeNav();
        } else {
            openNav();
        }
    }

    function closeNav() {
        document.body.classList.remove('hamburgler-active');
    }

    function openNav() {
        document.body.classList.add('hamburgler-active');
    }

})(jQuery);