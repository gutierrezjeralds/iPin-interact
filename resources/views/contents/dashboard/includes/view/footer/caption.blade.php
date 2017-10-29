<div class="holder-caption">
    <div class="caption-parent mb-2 {{ $post -> caption_bg != null ? 'caption-parent-style' : '' }}" id="editPost-20010311{{$post->id}}" style="background: {{ $post -> caption_bg != null ? $post -> caption_bg : '' }}">
     	<div class="caption-child {{ $post -> caption_bg != null ? 'caption-child-style' : '' }}">
            <div class="post-caption {{ $post -> caption_bg != null ? 'caption-style' : '' }}">{!! $post->caption !!}</div>
            <div class="edit-caption fadeIn" style="display: none;">
                <div class="caption edit-caption-here p-1 mb-2" id="edit-caption-here" contenteditable="true" placeholder="Pin your taughts..."></div>
                {!! Form::button('Cancel', ['class'=>'btn btn-outline-success px-2 py-2', 'id'=>'editPostCancel']) !!}
                {!! Form::button('<i class="fa fa-thumb-tack"></i>Pin Changes', ['type'=>'submit', 'class'=>'btn btn-success pull-right px-1 py-2', 'id'=>'editPostSave']) !!}
                <div class="mt-3 mb-3"></div>
            </div>
        </div>
    </div>
</div>