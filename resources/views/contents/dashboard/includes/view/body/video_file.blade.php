<div class="holder-media-video-file">
	@foreach($post->video_file as $mediaVideoFile)
	    <video class="wow fadeIn w-100" controls class="">
	    	<source src="{{ route('media.video.file', ['user_id' => $post -> user_id, 'filename' => $mediaVideoFile -> video_file]) }}" type='video/mp4'>
    	</video>
    @endforeach
</div>