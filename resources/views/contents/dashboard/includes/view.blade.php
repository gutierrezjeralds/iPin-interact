@if($posts)
    @foreach($posts as $post)
        <div class="col-lg-3 col-md-6 mb-r view-post-display" tack="20010311{{$post -> id}}">
            <div class="card news-card">
                <div class="card-body holder-header-post">
                    @include('contents.dashboard.includes.view.header.head')
                </div>

                <div class="holder-media-post">
                    @if( $post -> photo_id != 0 )
                        @include('contents.dashboard.includes.view.body.photo')
                    @endif
                </div>

                <div class="card-body">
                    <div class="social-meta">
                        
                        @include('contents.dashboard.includes.view.footer.caption')

                        @include('contents.dashboard.includes.view.footer.interaction')
                        
                    </div>
                    <hr>
                    <div class="md-form">
                        <i class="fa fa-heart-o prefix"></i>
                        <input placeholder="Add Comment..." type="text" id="form5" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
