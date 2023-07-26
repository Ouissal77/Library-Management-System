// $(document).ready(function() {
//     $(".alert").fadeOut(3000);
// });

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



