<div class="wrapper-create item-view {{ Request::route()->getName() == 'profile' ? '' : 'col-lg-3 col-md-6 mb-r' }}">
    <div class="card-wrapper">
        <div class="card-rotating effect__click">
            <div class="face front">
                <div class="card-up">
                    <img src="http://instack.com/sharedacover/1/150908413203152205181608152015150908413259f2cbe41f120.png" class="w-100" alt="Cover photo">
                </div>
                <div class="avatar">
                    <a href="/{{Auth::user()->username}}" class="px-0">
                        <div class="media-left view overlay hm-white-sligh">
                            <img src="{{Auth::user()->avatar}}" class="rounded-circle img-responsive" alt="Avatar photo">
                            <div class="mask waves-effect waves-light"></div>
                        </div>
                    </a>
                </div>
                <div class="card-body px-1">
                    <h4 class="mt-1 black-text text-ellipsis" data-toggle="tooltip" data-placement="bottom" title="{{Auth::user()->fullname}}">{{Auth::user()->fullname}}</h4>
                    <h6 class="black-text">
                    	<i class="fa fa-pencil fa-fw"></i> Write a post |
						<i class="fa fa-upload fa-fw"></i> Upload media
                    </h6>
                    <hr class="hr-dark mb-3 mt-3">
                    <div class="btn-create text-center">
	                    <button class="btn btn-cus-submit btn-for-post rounded py-1 px-1 mx-1" id="btnWritePost" type="button" data-toggle="tooltip" data-placement="bottom" title="Write a post">
	                    	<i class="fa fa-pencil-square fa-fw fa-2x py-1 px-1 mt-0 white-text"></i>
	                	</button>
	                    <button class="btn btn-cus-submit btn-for-post rounded py-1 px-1 mx-1" id="btnUploadPhoto" type="button" data-toggle="tooltip" data-placement="bottom" title="Upload photo" onclick="event.preventDefault(); document.getElementById('ajax-upload-id-photo').click();">
	                    	<i class="fa fa-camera-retro fa-fw fa-2x py-1 px-1 mt-0 white-text"></i>
	                	</button>
	                    <button class="btn btn-cus-submit btn-for-post rounded py-1 px-1 mx-1" id="btnUploadAudio" type="button" data-toggle="tooltip" data-placement="bottom" title="Upload audio">
	                    	<i class="fa fa-headphones fa-fw fa-2x py-1 px-1 mt-0 white-text"></i>
	                	</button>
	                    <button class="btn btn-cus-submit btn-for-post rounded py-1 px-1 mx-1" id="btnUploadVideo" type="button" data-toggle="tooltip" data-placement="bottom" title="Upload video">
	                    	<i class="fa fa-video-camera fa-fw fa-2x py-1 px-1 mt-0 white-text"></i>
	                	</button>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('modal-create')
    <div class="wrapper-modals-create">
        @include('contents.dashboard.includes.create.photo')

        @include('contents.dashboard.includes.create.video')
    </div>
@endsection