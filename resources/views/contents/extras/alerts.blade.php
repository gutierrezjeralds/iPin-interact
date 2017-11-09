<script>
	
	@if(Session::has('write_post'))
		var writePost = "{{session('write_post')}}";
		$(document).ready(function(){
    		toastr["success"](writePost);
		});
	@endif

	@if(Session::has('upload_mdeia'))
		var uploadMedia = "{{session('upload_mdeia')}}";
		$(document).ready(function(){
    		toastr["success"](uploadMedia);
		});
	@endif

	@if(Session::has('upload_mdeia_error'))
		var uploadMedia = "{{session('upload_mdeia_error')}}";
		$(document).ready(function(){
    		toastr["error"](uploadMedia);
		});
	@endif

    @if (Session::has('status'))
        var status = "{{session('status')}}";
        $(document).ready(function(){
            toastr["success"](status);
        });
    @endif

</script>