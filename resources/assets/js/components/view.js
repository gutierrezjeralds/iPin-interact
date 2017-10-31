//Scripts for inline variable
var postId = 0;
var postCaptionElement = null;
var postCaptionEditDivElement = null;
var postCaptionActionElement = null;
var postCaptionEditElement = null;

//Scripts for edit post
$("body").on("click", ".edit-post", function(event){
    event.preventDefault();

    var hash = this.hash;
    $('html, body').stop().animate({scrollTop: $(hash).offset().top - 100}, 1000);

    postId = $(event.target).closest('.view-post-display').attr("tack").substring(8);
    postCaptionElement = $(event.target).closest('.view-post-display').find('.post-caption');
    postCaptionEditDivElement = $(event.target).closest('.view-post-display').find('.edit-caption');
    postCaptionActionElement = $(event.target).closest('.view-post-display').find('.action-post').find('.dropdown-menu');
    postCaptionEditElement = $(event.target).closest('.view-post-display').find('.edit-caption-here');

    postCaptionElement.css("display", "none");
    postCaptionEditDivElement.css("display", "block");
    postCaptionActionElement.removeClass("show");

    var postCaption = postCaptionElement.html();
    postCaptionEditElement.html(postCaption);
});

$("body").on("click", "#editPostSave", function() {
    $.ajax({
        method: 'POST',
        url: "/edit-post",
        data: {caption: $(postCaptionEditElement).html(), postId: postId}
    })
        .done(function (msg){
            $(postCaptionElement).css("display", "block");
            $(postCaptionEditDivElement).css("display", "none");
            $(postCaptionElement).html(msg['new_caption']);

            toastr["success"]("Successfully update your post.");
        });
});

$("body").on("click", "#editPostCancel", function() {
    $(postCaptionElement).css("display", "block");
    $(postCaptionEditDivElement).css("display", "none");
});
// End scripts for edit post

//Scripts for delete post
$("body").on("click", ".delete-post", function(event){
    event.preventDefault();
    postId = $(event.target).closest('.view-post-display').attr("tack").substring(8);

    $('#modalConfirm').find('.heading').text('Are you sure you want to delete?');
    $('#modalConfirm').find('#btnModalConfirmYes').addClass('btn-delete-post-modal-confirm-yes');
    $('#modalConfirm').modal('show');
});

$("body").on("click", ".btn-delete-post-modal-confirm-yes", function(event){
    event.preventDefault();

    $.ajax({
        url:  '/delete-post/' + user_id + '/' + postId,
        method: 'GET',
        success : function(data){
            $("div[tack='20010311"+postId+"']").remove();
            toastr["success"]("Successfully deleted your post.");
            $('#modalConfirm').modal('hide');
            //console.log(data);
        }
    });
});
//End scripts for delete post

//Scripts for copy post URL
$("body").on("click", ".copyButtonURL", function(event) {
    event.preventDefault();
    postId = $(event.target).closest('.view-post-display').attr("tack").substring(8);
    var postClipboardInput = $('#copyTargetURL-20010311'+postId);

    copyToClipboard();

    toastr["success"]("Copied!");

    function copyToClipboardFF(text) {
        //window.prompt ("Copy to clipboard: Ctrl C, Enter", text);
    }

    function copyToClipboard() {
        var success   = true,
            range     = document.createRange(),
            selection;

        // For IE.
        if (window.clipboardData) {
            window.clipboardData.setData("Text", postClipboardInput.val());
        } else {
            // Create a temporary element off screen.
            var tmpElem = $('<div>');
            tmpElem.css({
                position: "absolute",
                left:     "-1000px",
                top:      "-1000px",
            });
            // Add the input value to the temp element.
            tmpElem.text(postClipboardInput.val());
            $("body").append(tmpElem);
            // Select temp element.
            range.selectNodeContents(tmpElem.get(0));
            selection = window.getSelection ();
            selection.removeAllRanges ();
            selection.addRange (range);
            // Lets copy.
            try {
                success = document.execCommand ("copy", false, null);
            }
            catch (e) {
                copyToClipboardFF(postClipboardInput.val());
            }
            if (success) {
                //alert ("The text is on the clipboard, try to paste it!");
                // remove temp element.
                tmpElem.remove();
            }
        }
    }
});
//End scripts for copy post URL

//Scripts for corousel item number display
function postCarouselItem() {
    jQuery(".holder-media-photo").each(function() {
        var totalCarouselItems = jQuery(this).find(".carousel").find('.carousel-item').length;
        var currentCarouselIndex = jQuery(this).find(".carousel").find('div.active').index() + 1;
        jQuery(this).find('.num-carousel-items').html(''+currentCarouselIndex+'/'+totalCarouselItems+'');

        jQuery(this).find(".carousel").on('slid.bs.carousel', function() {
            currentCarouselIndex = jQuery(this).find('div.active').index() + 1;
            jQuery(this).find('.num-carousel-items').html(''+currentCarouselIndex+'/'+totalCarouselItems+'');
        });
    });
}
//End scripts for corousel item number display

//Script for all each function for ajax after success
postCarouselItem();

$(document).ajaxSuccess(function() {
    postCarouselItem();
});
//End script for all each function for ajax after success

//Scripts for inner view display
$("body").on("click", ".inner-view-display", function(event) {
    event.preventDefault();
    postId = $(event.target).closest('.view-post-display').attr("tack").substring(8);

     $.ajax({
        url:  '/inner-view-display/' + postId,
        method: 'GET',
        success : function(data){
            //alert(data);
            $('#modalViewDisplay').find('.modal-body').html(data);
            $('#modalViewDisplay').modal('show');
            //console.log(data);
        }
    });
});
//End scripts for inner view display