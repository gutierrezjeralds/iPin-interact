//Script for Ajax token
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
//End script for Ajax token

//Scripts for post ajax loading more
var postPage = 1;
$(window).scroll(function() {
    if( $(window).scrollTop() + $(window).height() >= $(document).height() ) {
        postPage++;
        
        if ( postPage <= postPageCount) {
            loadMoreData(postPage);
        } else {
            $('.ajax-post-load-more').css("display","none");
            $('.alert-no-more-stories').css("display","block");
        }
    }
});

function loadMoreData(postPage){
    $.ajax({
        url: '?page=' + postPage,
        type: "get",
        beforeSubmit: function(){
            $('.ajax-post-load-more').css("display","block");
        },
        success: function(data){
            // require('../../../../node_modules/video.js/dist/video.min');
            $('.dropdown-toggle').dropdown();
            $("#post-view").append(data.html);
        },
        error: function(xhr,status,error){
            console.log('Server not responding...');
        }
    });
}
//End scripts for post ajax loading more


//Script for dropdown menu click ones
$('.dropdown-toggle').dropdown();
//End script for dropdown menu click ones

//Script for stop propagation of dropdown menu from inside
//$('.dropdown-menu').on('click', function(e) {e.stopPropagation();});
//End script for stop propagation of dropdown menu from inside

//Scripts for carousel interval
// interval is in milliseconds. 1000 = 1 second - so 1000 * 10 = 10 seconds
$('.carousel').carousel({
    interval: 1000 * 10
})
//End scripts for carousel interval

//Scripts for contenteditable paste as a plain text
if (urlName == 'home') {
    // document.querySelector("div[contenteditable]").addEventListener("paste", function(e) {
    //     e.preventDefault();
    //     var text = e.clipboardData.getData("text/plain");
    //     document.execCommand("insertHTML", false, text);
    // });
}
//End scripts for contenteditable paste as a plain text

//Scripts for Tooltips Initialization
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

$("body").on("click", "[data-toggle='tooltip']", function(){
    $('[data-toggle="tooltip"]').tooltip('hide');
});
//End scripts for Tooltips Initialization

//Scripts for navbar left
$(".button-collapse").sideNav();
//End scripts for navbar left

//Scripts for animated scroll
wow = new WOW({
    boxClass: 'wow', // default
    animateClass: 'animated', // default
    offset: 0, // default
    mobile: true, // default
    live: true // default
})
wow.init();
//End scripts for animated scroll