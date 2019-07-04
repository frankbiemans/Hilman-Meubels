$(function() {
    setNewestProjectsTitleHeight();
    initCycleSlideShow();

    $(".custom-dropdown-menu").on('change', function() {
        var newURL = $(this).find(':selected').val();
        window.location.assign(newURL);
    });
});

$(window).resize(function() {
    setNewestProjectsTitleHeight();
});
