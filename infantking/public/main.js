// defining name space
var ik = ik || {};

$(function() {
    $(".opaque").css("margin-top", $(".keyvisual").outerHeight());

    $(document).scroll(function(){
        var offset = (dw_getScrollOffsets()).y;
        var completeHeight = $("body").outerHeight();
        $(".keyvisual").css("top", "" + (-offset / completeHeight)*150 + "px");
        $(".keyvisual-copy").css("top", "" + (-offset / completeHeight)*300 + "px");
    });
    $(window).resize(onresize);
    setTimeout(onresize, 100);

    $(".player-button").on("click", function() {
        var player = $(this).data("player");
        var frame = $("#player-frame");
        frame.attr("src", frame.data(player));
        frame.removeClass("to-hide");
        $(".player-button").remove();
    });

    $('#contact-submit').on("click", function(e) {
        e.preventDefault();
        var form = e.currentTarget.form;
        
        var isValid = validateEmail(form["your-email"].value) && form["your-name"].value.length > 2 && form["your-message"].value.length > 2;
        $.ajax({
            method: "POST",
            url: "/contact",
            data: {
                name: form["your-name"].value,
                replyaddr: form["your-email"].value,
                message: form["your-message"].value
            },
                success: function(data)
                {
                    alert(data); // show response from the php script.
                }
        })
    });
});

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

var onresize = function() {
    var margin = parseInt($(".keyvisual").outerHeight())-30;
    $(".opaque").css("margin-top", margin);
    var width = parseInt($("#wrapper").width());
    $(".iframe").width(width).height(parseInt(width*0.5625));
};

// http://www.dyn-web.com/javascript/scroll-distance/
function dw_getScrollOffsets() {
    var doc = document, w = window;
    var x, y, docEl;

    if ( typeof w.pageYOffset === 'number' ) {
        x = w.pageXOffset;
        y = w.pageYOffset;
    } else {
        docEl = (doc.compatMode && doc.compatMode === 'CSS1Compat')?
            doc.documentElement: doc.body;
        x = docEl.scrollLeft;
        y = docEl.scrollTop;
    }
    return {x:x, y:y};
}

// HYPHENATOR

/*
 *  Hyphenator 5.0.0(devel) - client side hyphenation for webbrowsers
 *  Copyright (C) 2015  Mathias Nater, Zürich (mathiasnater at gmail dot com)
 *  https://github.com/mnater/Hyphenator
 *
 *  Released under the MIT license
 *  http://mnater.github.io/Hyphenator/LICENSE.txt
 */