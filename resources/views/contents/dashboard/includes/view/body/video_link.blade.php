<div class="holder-media-video-link">
	@foreach($post->video_link as $mediaVideoLink)
	    <div class="embed-responsive embed-responsive-1by1">
	        <iframe class="embed-responsive-item wow fadeIn" src="{{$mediaVideoLink -> video_link}}" frameborder="0" allowfullscreen></iframe>
	    </div>
    @endforeach
</div>