//Script for Ajax token
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
//End script for Ajax token

//Scripts for item view layout
function itemViewLayout() {
    $('#post-view').imagesLoaded( function(){
        $('#post-view').isotope({
            itemSelector : '.item-view'
        });
    });
}

jQuery(document).ready(function($){
    //itemViewLayout();
});
//End scripts for item view layout

//Script for user cliked back button when logout
var pAsValue = 0;
$("body").on("click", function() {
    pAsValue = 1;
    CheckTheUserLogout();
});

CheckTheUserLogout();

function CheckTheUserLogout() {
    $.ajax({
        url: "/post/auth/secure",
        type: "GET",
        data: {},
        success: function (response) {
            if (response==0) {
                if (urlName == 'home' || urlName == 'profile') {
                    if (pAsValue == 1) {
                        $('#modalExpired').modal('show');
                        // $('body').removeClass('body-dont-scroll');
                    } else{
                        $('body').css("display", "none");
                        location.href="/login";
                    }
                }
            }
            else {
                pAsValue = 0;
                //Do Nothing
            }
        },
        failure: function (msg) {
            console.log(msg);
        }
    });
}
//End script for user cliked back button when logout

if (urlName == 'home' || urlName == 'profile') {
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

    //Scripts for contenteditable paste as a plain text
    // document.querySelector("div[contenteditable]").addEventListener("paste", function(e) {
    //     e.preventDefault();
    //     var text = e.clipboardData.getData("text/plain");
    //     document.execCommand("insertHTML", false, text);
    // });
    //End scripts for contenteditable paste as a plain text
}

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

//Scripts for Tooltips Initialization
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

$("body").on("click", "[data-toggle='tooltip']", function(){
    $('[data-toggle="tooltip"]').tooltip('hide');
});
//End scripts for Tooltips Initialization

//Scripts for context menu in modal show
function preventContextMenu() {
    $('.wrapper-modals-create').find('.modal').on('keydown', function (e) {
        if(event.keyCode == 123) {
            return false;
        }
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
            return false;
        }
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)){
            return false;
        }
        if(e.metaKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)){
            return false;
        }
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
            return false;
        }
        if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
            return false;
        }
        if(e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)){
            return false;
        }
        if(e.ctrlKey && e.keyCode == 'C'.charCodeAt(0)){
            return false;
        }
    });
    $('.wrapper-modals-create').find('.modal').on("contextmenu",function(e){
       return false;
    });
}

preventContextMenu();
//End scripts for context menu in modal show

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