$(document).ready(function () {
    let navbar = $(".layout-navbar");

    $(".content-wrapper").on("scroll", function () {
        if ($(this).scrollTop() > 50) {
            navbar.addClass("scrolled");
        } else {
            navbar.removeClass("scrolled");
        }
    });
});
