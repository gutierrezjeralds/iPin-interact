//Scripts for btn create post
$('.btn-for-post').on('click', function() {
    
});

$('#btnUploadPhoto').on('click', function() {
    
});

$('#btnUploadAudio').on('click', function() {
    
});

$('#btnUploadVideo').on('click', function() {
    $('#uploadMediaVideo').modal('show');
});
//End scripts for btn create post

//Scripts for upload media photo
var uploadPhoto = $("#file-uploader-photo").uploadFile({
    url: "/post-upload-media-photo",
    fileName: "photo",
    inputFileName: 'photoFile[]',
    acceptFiles: "image/*",
    onSelect: function (files) {
        for(var i = 0; i < files.length; i++) {
            var fileExtension = '.' + files[i].name.split('.').pop();
            files[i].name = "1609141608152015" + new Date().getTime() + Math.random().toString(36).substring(7) + fileExtension;
        }
    },
    onSubmit: function (files) {
    	if ($('.list-upload-file').length > 3) {
            $('.list-upload-file').addClass('list-inline-item-post-style-limit');
            $("html,body").animate({ scrollTop: 0 }, "slow");
        }
    	$('#uploadMediaPhoto').modal('show');
    },
    onSuccess: function (files, data) {
    	if(files != ""){
            $('.hidden-config-file-uploader-photo').val("1");
    		$('#photoPreview').find('.list-upload-file').append("<div class='btn-file-upload-delete ajax-file-upload-red float-right'><i class='fa fa-trash fa-1x white-text'></i></div>")
            $('.btn-upload-media-photo').removeAttr("disabled");
            $('.ajax-file-upload-progress').css("display","none");
            $('#modalConfirm').find('.heading').text('Are you sure you want to discard?');
        }
    },
});
//End scripts for upload media photo

//Scripts for upload media video file
$("#postVideoFile").on('change', function (){
    var total_file = document.getElementById("postVideoFile").files.length;
    for(var i = 0; i < total_file; i++) {
        $(".hidden-config-file-uploader-video-file").val("1");
        $('.video-url-link').val("").blur();

        $('#videoFilePreview').find('.video-file-upload-preview').prepend("<video controls style='width: 100%'><source src='"+URL.createObjectURL(event.target.files[i])+"' type='video/mp4'></video>");

        $('.btn-upload-media-video-link').removeAttr("disabled");
        $('#modalConfirm').find('.heading').text('Are you sure you want to discard?');
        $('#uploadMediaVideo').modal('hide');
        $('#uploadMediaVideoFile').modal('show');
    }
});
//End scripts for upload media file

//Scripts for upload media video links
$('.video-url-link').keyup(function(){
    var url = $('.video-url-link').val();
    if (url != undefined || url != '') {        
        var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
        var match = url.match(regExp);
        if (match && match[2].length) {
            // Do anything for being valid
            // if need to change the url to embed url then use below line
            $(".hidden-config-file-uploader-video-link").val("1");
            $('.video-url-link').val("").blur();
            $('input[name="video_link"]').val('https://www.youtube.com/embed/' + match[2]);

            $('#videoObjectLink').attr('src', 'https://www.youtube.com/embed/' + match[2]);

            $('.btn-upload-media-video-link').removeAttr("disabled");
            $('#modalConfirm').find('.heading').text('Are you sure you want to discard?');
            $('#uploadMediaVideo').modal('hide');
            $('#uploadMediaVideoLink').modal('show');
        } else {
            // Do anything for not being valid
        }
    }
});
//End scripts for upload media video links

//Scripts for form submit
$('form').on('submit', function() {
    $('.btn-pin-post').attr("disabled", "disabled");

    var textareaPost = $(this).find('textarea');
    var captionPost  = $(this).find('.caption').html();
    textareaPost.val(captionPost);
});
//End scripts for form submit

//Scripts for close create
$("body").on("click", ".btn-create-close", function(event){
    event.preventDefault();
    $('#modalConfirm').find('#btnModalConfirmYes').addClass('btn-create-modal-confirm-yes');
    $('#modalConfirm').modal('show');
});

$("body").on("click", ".btn-create-modal-confirm-yes", function(event){
    event.preventDefault();

    var inputFilePhoto = $('#uploadMediaPhoto').find(".hidden-config-file-uploader-photo").val();
    if ( inputFilePhoto != 0 ) {
        $('#btnUploadPhoto').attr("onclick", "event.preventDefault(); document.getElementById('ajax-upload-id-photo[]').click();");
        $(".hidden-config-file-uploader-photo").val("0");
        $('.list-upload-file').remove();

        commonBtnCreateCloseFunction();

        $('#uploadMediaPhoto').modal('hide');
    }
    
    var inputFileVideoFile = $('#uploadMediaVideoLink').find(".hidden-config-file-uploader-video-file").val();
    if ( inputFileVideoLink != 0 ) {
        $(".hidden-config-file-uploader-video-file").val("0");

        commonBtnCreateCloseFunction();

        $('#uploadMediaVideoFile').modal('hide');
        $('#uploadMediaVideo').modal('show');
    }
    
    var inputFileVideoLink = $('#uploadMediaVideoLink').find(".hidden-config-file-uploader-video-link").val();
    if ( inputFileVideoLink != 0 ) {
        $(".hidden-config-file-uploader-video-link").val("0");

        commonBtnCreateCloseFunction();

        $('#uploadMediaVideoLink').modal('hide');
        $('#uploadMediaVideo').modal('show');
    }
});

function commonBtnCreateCloseFunction(){
    $('.caption').empty();
    $('#caption').val('');

    $('.btn-pin-post').attr("disabled", "disabled");

    $('#modalConfirm').modal('hide');
}
//End scripts for close create