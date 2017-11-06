<script>
    @if(!Auth::guest())
	    var urlName = '{{ Route::currentRouteName() }}';
    @else
        var urlName = 'guest';
	@endif
</script>