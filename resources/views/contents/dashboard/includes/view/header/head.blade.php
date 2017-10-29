<div class="content">
    <div class="right-side-meta pt-0 mt-1">
        <small class="text-muted">
            {{ $post -> created_at -> diffforHumans() }}
        </small>
        <div class="btn-group action-post ml-1">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-ellipsis-v font-icon-color" aria-hidden="true"></i>
            </a>
            <div class="dropdown-menu page-scroll">
                @if (Auth::user() == $post->user)
                    <a class="dropdown-item edit-post" href="#editPost-20010311{{$post->id}}"><i class="fa fa-pencil font-icon-body"></i> Edit</a>
                    <a class="dropdown-item delete-post" href="#"><i class="fa fa-trash font-icon-body"></i> Delete</a>
                    <a class="dropdown-item allow-comment-post" href="#"><i class="fa {{ $post->comment_hide == 0 ? 'fa-ban' : 'fa-check' }} font-icon-body"></i><span> {{ $post->comment_hide == 0 ? 'Disable comment' : 'Enable comment' }}</span></a>
                    <input type="text" name="comment_hide" id="comment-hide" class="comment_hide_field" value="{{$post->comment_hide}}" style="display: none;">
                @endif
                <a class="dropdown-item copyButtonURL" href="#"><i class="fa fa-clone font-icon-body"></i> Copy link address</a>
                <input type="text" id="copyTargetURL-20010311{{$post -> id}}" value="http://ipin.com/{{$post -> username}}/post/{{$post -> id}}" style="display: none;">
            </div>
        </div>
    </div>
    <a href="/{{$post->user->username}}">
        <div class="media-left view overlay hm-white-sligh d-flex">
            <img src="{{$post->user->avatar}}" class="rounded-circle avatar-img z-depth-0 mr-1 h-2rem"/>
            <span class="text-ellipsis mt-1">{{$post->user->username}}</span>
            <div class="mask waves-effect waves-light"></div>
        </div>
    </a>
</div>