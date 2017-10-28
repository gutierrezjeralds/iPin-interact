 <div class="modal animated fadeInLeft holder-upload-media scrollbar-dusty-grass" id="uploadMediaPhoto" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="uploadMediaPhotoLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-success modal-md" role="document">
        <div class="modal-content">
            {!! Form::open(['method'=>'POST', 'action'=>'PostController@postMediaPhoto', 'files'=>true]) !!}
                <div class="modal-header">
                    <p class="heading lead"><i class="fa fa-upload fa-fw white-text"></i> Upload media photo</p>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>

                <div class="modal-body px-0">
                    <div class="media px-3">
                        <img class="d-flex mr-3" src="{{auth()->user()->avatar}}" alt="Avatar image">
                        <div class="media-body">
                            <div class="form-group mb-0">
                                <div class="caption-parent">
                                    <div class="caption-child">
                                        {!! Form::textarea('caption', null, ['class'=>'form-control', 'id' => 'caption', 'rows' => '3', 'placeholder' => 'Pin your moments...' , 'style'=>"display:none"]) !!}
                                        <div class="caption caption-write-here px-2" contenteditable="true" placeholder="Pin your moments..."></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="px-0 mx-0">
                    <div class="media px-3 holder-upload-media-photo justify-content-center">
                        <div class="media-body">
                            <div class="form-group mb-0" id="photoPreview">
                                <div id="file-uploader-photo" style="display: none;">Add photos</div>
                                <input type="hidden" value="0" class="hidden-config-file-uploader-photo">
                            </div>
                        </div>
                    </div>
                    <hr class="px-0 mx-0">
                    <div class="media px-3 holder-upload-media-photo">
                        <div class="media-body text-center">
                            <button class="btn btn-cus-submit btn-lg btn-block btn-add-post-photo form-control" type="button" onclick="event.preventDefault(); document.getElementById('ajax-upload-id-photo[]').click();">
                                <i class="fa fa-camera-retro fa-fw v-align-middle"></i> Add photo(s)
                            </button>
                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-center">
                    {!! Form::button('Close', ['class'=>'btn btn-outline-secondary-modal', 'data-dismiss'=>'modal']) !!}
                    {!! Form::button('<i class="fa fa-thumb-tack fa-fw ml-1"></i>Pin it now', ['type'=>'submit', 'class'=>'btn btn-primary-modal btn-pin-post btn-upload-media-photo', 'disabled']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
