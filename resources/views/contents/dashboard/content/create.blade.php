<div class="wrapper-create col-lg-4 col-md-12 mb-r">
    <div class="card-wrapper">
        <div class="card-rotating effect__click">
            <div class="face front">
                <div class="card-up">
                    <img src="http://instack.com/sharedacover/1/150908413203152205181608152015150908413259f2cbe41f120.png" alt="Team member card image">
                </div>
                <div class="avatar">
                    <img src="{{Auth::user()->avatar}}" class="rounded-circle img-responsive" alt="First sample avatar image">
                </div>
                <div class="card-body">
                    <h4 class="mt-1">{{Auth::user()->fullname}}</h4>
                    <h6 class="">
                    	<i class="fa fa-pencil fa-fw"></i> Write a post |
						<i class="fa fa-upload fa-fw"></i> Upload media
                    </h6>
                    <hr class="hr-dark mb-3 mt-3">
                    <div class="btn-create text-center">
	                    <button class="btn btn-cus-submit btn-for-post rounded py-0 px-0 mx-1" id="btnWritePost" type="button" data-toggle="tooltip" data-placement="bottom" title="Write a post">
	                    	<i class="fa fa-pencil-square fa-fw fa-3x py-1 px-1 mt-0"></i>
	                	</button>
	                    <button class="btn btn-cus-submit btn-for-post rounded py-0 px-0 mx-1" id="btnUploadPhoto" type="button" data-toggle="tooltip" data-placement="bottom" title="Upload photo">
	                    	<i class="fa fa-camera-retro fa-fw fa-3x py-1 px-1 mt-0"></i>
	                	</button>
	                    <button class="btn btn-cus-submit btn-for-post rounded py-0 px-0 mx-1" id="btnUploadPhoto" type="button" data-toggle="tooltip" data-placement="bottom" title="Upload photo">
	                    	<i class="fa fa-headphones fa-fw fa-3x py-1 px-1 mt-0"></i>
	                	</button>
	                    <button class="btn btn-cus-submit btn-for-post rounded py-0 px-0 mx-1" id="btnUploadPhoto" type="button" data-toggle="tooltip" data-placement="bottom" title="Upload photo">
	                    	<i class="fa fa-video-camera fa-fw fa-3x py-1 px-1 mt-0"></i>
	                	</button>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>