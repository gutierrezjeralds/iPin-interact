@foreach($post->video_file as $mediaVideoFile)
	<div class="holder-media-video-file">
		<div class="relative" style="position: relative;">
			<div class="btn-play-video absolute" style="position: absolute;">
				<i class="fa fa-play-circle fa-4x white rounded-circle px-1" aria-hidden="true"></i>
			</div>
		    <video class="wow fadeIn w-100 h-50 black" >
		    	<source src="{{ route('media.video.file', ['user_id' => $post -> user_id, 'filename' => $mediaVideoFile -> video_file]) }}" type='video/mp4'>
		    	Your browser does not support HTML5 video.
	    	</video>
		</div>
	</div>
@endforeach