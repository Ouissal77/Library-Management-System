$(document).ready(function() {
    $(".alert").fadeOut(5000);
});

// $('.nav-item').toggleAttribute('.active')
// $(function() {
//     // let url = window.location.href;
//     // if(url.includes('books')){
//     //     $(".nav-link").removeClass("active");
//     //     $(".nav-link-salle").addClass("active");    }
//     // else if(url.includes('responsables')){
//     //     $(".nav-link").removeClass("active");
//     //     $(".nav-link-responsable").addClass("active");
//     // }else{
//     //     console.log('error');
//     // }
//
//     $(".nav-link").click(function() {
//         // remove classes from all
//         $(".nav-link").removeClass("active");
//         // add class to the one we clicked
//         $(this).addClass("active");
//
//     });
// });

$(function() {
    let url = window.location.href;

    // Loop through each nav link
    $(".nav-link").each(function() {
        let linkHref = this.href; // Get the href of the current nav link

        // Check if the current URL includes the link's href
        if (url.includes(linkHref)) {
            // If yes, add the active class to the nav link
            $(".nav-link").removeClass("active");
            $(this).addClass("active");
        }
    });
    $(".nav-link").click(function() {
        // remove classes from all
        $(".nav-link").removeClass("active");
        // add class to the one we clicked
        $(this).addClass("active");

    });
    // Handle click event for all nav links
    // $(".nav-link").click(function(event) {
    //     event.preventDefault(); // Prevent default link behavior
    //     let targetUrl = this.href; // Get the href of the current nav link
    //     $(".nav-link").removeClass("active"); // Remove active class from all nav links
    //     $(this).addClass("active"); // Add active class to the clicked nav link
    //
    //     // Do whatever you need to do when a nav link is clicked
    //     // For example, you might want to navigate to the target URL
    //     window.location.href = targetUrl;
    // });
});
var carouselWidth = $(".carousel-inner")[0].scrollWidth;
var cardWidth = $(".carousel-item").width();
var scrollPosition = 0;
$(".carousel-control-next").on("click", function () {
    if (scrollPosition < (carouselWidth - cardWidth * 4)) { //check if you can go any further
        scrollPosition += cardWidth;  //update scroll position
        $(".carousel-inner").animate({ scrollLeft: scrollPosition },600); //scroll left
    }
});
$(".carousel-control-prev").on("click", function () {
    if (scrollPosition > 0) {
        scrollPosition -= cardWidth;
        $(".carousel-inner").animate(
            { scrollLeft: scrollPosition },
            600
        );
    }
});

var multipleCardCarousel = document.querySelector(
    "#carouselExample"
);
if (window.matchMedia("(min-width: 768px)").matches) {
    var carousel = new bootstrap.Carousel(multipleCardCarousel, {
        interval: false,
    });
    var carouselWidth = $(".carousel-inner")[0].scrollWidth;
    var cardWidth = $(".carousel-item").width();
    var scrollPosition = 0;
    $("#carouselExample .carousel-control-next").on("click", function () {
        if (scrollPosition < carouselWidth - cardWidth * 4) {
            scrollPosition += cardWidth;
            $("#carouselExample .carousel-inner").animate(
                { scrollLeft: scrollPosition },
                600
            );
        }
    });
    $("#carouselExample .carousel-control-prev").on("click", function () {
        if (scrollPosition > 0) {
            scrollPosition -= cardWidth;
            $("#carouselExample .carousel-inner").animate(
                { scrollLeft: scrollPosition },
                600
            );
        }
    });
} else {
    $(multipleCardCarousel).addClass("slide");
}

