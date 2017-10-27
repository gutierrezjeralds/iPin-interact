//Script for Ajax token
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
//End script for Ajax token

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
//End scripts for Tooltips Initialization

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