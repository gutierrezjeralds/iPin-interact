<div class="modal animated fadeIn holder-upload-media scrollbar-dusty-grass" id="uploadMediaVideo" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="uploadMediaVideoLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-success modal-md" role="document">
        <div class="modal-content">
            
                <div class="modal-header">
                    <p class="heading lead"><i class="fa fa-upload fa-fw white-text"></i> Upload media video</p>

                    <button type="button" data-dismiss="modal" class="close" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>

                <div class="modal-body px-0">
                    <div class="text-center holder-upload-media-video" onclick="event.preventDefault(); document.getElementById('postVideoFile').click();">
                        <i class="fa fa-video-camera fa-fw fa-3x py-1 px-1 mt-0 green-light-text"></i>
                        <h4 class="green-text h4-responsive">Upload video</h4>
                    </div>
                    <hr class="px-0 mx-0 hr-dashed-default">
                    <div class="text-center px-5">
                        <i class="fa fa-code fa-fw fa-3x py-1 px-1 mt-0 green-light-text"></i>
                            <div class="md-form">
                                <input type="text" class="video-url-link" class="form-control" required>
                                <label for="form2">Video Url (https://)</label>
                            </div>
                        <h4 class="green-text h4-responsive px-0">Add video from web</h4>
                        <!-- <h4 class="green-text h4-responsive px-0">Add video via YouTube</h4> -->
                    </div>
                </div>

                <div class="modal-footer justify-content-center">
                    {!! Form::button('Close', ['class'=>'btn btn-outline-secondary-modal', 'data-dismiss'=>'modal']) !!}
                    {!! Form::button('<i class="fa fa-thumb-tack fa-fw ml-1"></i>Pin it now', ['type'=>'submit', 'class'=>'btn btn-primary-modal btn-pin-post btn-upload-media-video', 'disabled']) !!}
                </div>

        </div>
    </div>
</div>

<div class="modal animated fadeIn holder-upload-media scrollbar-dusty-grass" id="uploadMediaVideoFile" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="uploadMediaVideoFileLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-success modal-md" role="document">
        <div class="modal-content">
            {!! Form::open(['method'=>'POST', 'action'=>'PostController@postMediaVideoFile', 'files'=>true]) !!}
                <div class="modal-header">
                    <p class="heading lead"><i class="fa fa-upload fa-fw white-text"></i> Upload media video</p>

                    <button type="button" class="close btn-create-close" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>

                <div class="modal-body px-0">
                    <div class="media px-3">
                        <img class="d-flex mr-3" src="{{auth()->user()->avatar}}" alt="Avatar image">
                        <div class="media-body">
                            <div class="md-form mb-0">
                                <div class="caption-parent">
                                    <div class="caption-child">
                                        {!! Form::textarea('caption', null, ['class'=>'form-control', 'id' => 'caption', 'rows' => '3', 'placeholder' => 'Pin your moments...' , 'style'=>"display:none"]) !!}
                                        <div class="caption caption-write-here px-2" contenteditable="true" placeholder="Pin your moments..."></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="media mt-4 holder-upload-media-video-link justify-content-center">
                        <div class="media-body">
                            <div class="md-form mb-0" id="videoFilePreview">
                                {!! Form::file('video_file', ['class'=>'form-control upload-file-input', 'id'=>'postVideoFile', 'style'=>'display:none', 'accept'=>'video/*']) !!}
                                <div class="video-file-upload-preview"></div>
                                <input type="hidden" value="0" class="hidden-config-file-uploader-video-file">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-center">
                    {!! Form::button('Cancel', ['class'=>'btn btn-outline-secondary-modal btn-create-close']) !!}
                    {!! Form::button('<i class="fa fa-thumb-tack fa-fw ml-1"></i>Pin it now', ['type'=>'submit', 'class'=>'btn btn-primary-modal btn-pin-post btn-upload-media-video-link', 'disabled']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<div class="modal animated fadeIn holder-upload-media scrollbar-dusty-grass" id="uploadMediaVideoLink" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="uploadMediaVideoLinkLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-success modal-md" role="document">
        <div class="modal-content">
            {!! Form::open(['method'=>'POST', 'action'=>'PostController@postMediaVideoLink']) !!}
                <div class="modal-header">
                    <p class="heading lead"><i class="fa fa-upload fa-fw white-text"></i> Upload media video</p>

                    <button type="button" class="close btn-create-close" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>

                <div class="modal-body px-0">
                    <div class="media px-3">
                        <img class="d-flex mr-3" src="{{auth()->user()->avatar}}" alt="Avatar image">
                        <div class="media-body">
                            <div class="md-form mb-0">
                                <div class="caption-parent">
                                    <div class="caption-child">
                                        {!! Form::textarea('caption', null, ['class'=>'form-control', 'id' => 'caption', 'rows' => '3', 'placeholder' => 'Pin your moments...' , 'style'=>"display:none"]) !!}
                                        <div class="caption caption-write-here px-2" contenteditable="true" placeholder="Pin your moments..."></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="media mt-4 holder-upload-media-video-link justify-content-center">
                        <div class="media-body">
                            <div class="md-form mb-0" id="videoLinkPreview">
                                <div class="embed-responsive embed-responsive-1by1">
                                    <iframe class="embed-responsive-item" id="videoObjectLink" src="" frameborder="0" allowfullscreen></iframe>
                                </div>
                                <input type="hidden" name="video_link">
                                <input type="hidden" value="0" class="hidden-config-file-uploader-video-link">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-center">
                    {!! Form::button('Cancel', ['class'=>'btn btn-outline-secondary-modal btn-create-close']) !!}
                    {!! Form::button('<i class="fa fa-thumb-tack fa-fw ml-1"></i>Pin it now', ['type'=>'submit', 'class'=>'btn btn-primary-modal btn-pin-post btn-upload-media-video-link', 'disabled']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
