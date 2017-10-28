<div class="holder-caption">
    <div class="caption-parent mb-2 {{ $post -> caption_bg != null ? 'caption-parent-style' : '' }}" id="editPost-20010311{{$post->id}}" style="background: {{ $post -> caption_bg != null ? $post -> caption_bg : '' }}">
     	<div class="caption-child {{ $post -> caption_bg != null ? 'caption-child-style' : '' }}">
            <div class="post-caption {{ $post -> caption_bg != null ? 'caption-style' : '' }}">{!! $post->caption !!}</div>
        </div>
    </div>
</div>