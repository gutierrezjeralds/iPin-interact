<div class="holder-media-photo">
    <div id="media-photo-20010311{{$post->id}}" class="carousel slide carousel-fade pb-2" data-ride="carousel">
        @foreach($post->photo as $mediaPhoto)
            @if($loop->count > 1)
                @if($loop->first)
                    <div class="num-carousel-items text-submit-color"></div>
                @endif
            @endif
        @endforeach
        <ol class="carousel-indicators">
            @foreach($post->photo as $mediaPhoto)
                @if($loop->count > 1)
                    <li data-target="#media-photo-20010311{{$post->id}}" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                @endif
            @endforeach
        </ol>
        <div class="carousel-inner" role="listbox">
            @foreach($post->photo as $mediaPhoto)
                <div class="carousel-item {{ $loop->first ? ' active' : '' }}">
                    <img class="d-block w-100 wow fadeIn" data-wow-delay="0.5s" src="{{ route('media.photo', ['user_id' => $post -> user_id, 'filename' => $mediaPhoto -> photo])}} " alt="Media photo">
                </div>
            @endforeach
        </div>
        @foreach($post->photo as $mediaPhoto)
            @if($loop->count > 1)
                @if($loop->first)
                    <a class="carousel-control-prev" href="#media-photo-20010311{{$post->id}}" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#media-photo-20010311{{$post->id}}" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                @endif
            @endif
        @endforeach
    </div>
</div>