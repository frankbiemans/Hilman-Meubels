function setNewestProjectsTitleHeight() {
    if ($('.newest-projects').length > 0) {
        $('.project-content').find('a span').css('height', 'auto');
        var highest = 0;

        $('.project-content').each(function() {
            var height = $(this).find('a span').outerHeight();
            if (height > highest) {
                highest = height;
            }
        });

        $('.project-content').find('a span').css('height', highest);
    }
}

function initCycleSlideShow() {

    $('.slide-show').cycle({
        fx: 'fade',
        speed: 500,
        timeout: 3000
    });

}
