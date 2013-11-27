$.showLoader = function() {

        var ww = $(window).width();
        var wh = $(window).height();

        $('<div class="preloaderContainer"><div class="preloaderBox"></div></div>').appendTo("body");

        $(".preloaderContainer")
                .css("position", "absolute")
                .css("left", ((ww / 2) - 100))
                .css("top", ((wh / 2) - 100) + $(window).scrollTop());

    }

$.hideLoader = function() {    
        $(".preloaderContainer, .preloaderBox").remove();

}
