//Scripts for btn create post
$('.btn-for-post').on('click', function() {
    
});

$('#btnUploadPhoto').on('click', function() {
    
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
});

function commonBtnCreateCloseFunction(){
    $('.caption').empty();
    $('#caption').val('');

    $('.btn-pin-post').attr("disabled", "disabled");

    $('#modalConfirm').modal('hide');
}
//End scripts for close create