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
    	$('#uploadMediaPhoto').modal();
    },
    onSuccess: function (files, data) {
    	if(files != ""){
    		$('#photoPreview').find('.list-upload-file').append("<div class='btn-file-upload-delete ajax-file-upload-red float-right'><i class='fa fa-trash fa-1x white-text'></i></div>")
            $('.btn-upload-media-photo').removeAttr("disabled");
            $('.ajax-file-upload-progress').css("display","none");
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