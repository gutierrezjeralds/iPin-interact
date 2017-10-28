<ul id="slide-out" class="side-nav fixed sn-bg-1 custom-scrollbar text-center">
    <li>
        <div class="logo-wrapper waves-light">
            <!-- <a href="#"><img src="https://mdbootstrap.com/img/logo/mdb-transparent.png" class="img-fluid flex-center"></a> -->
            <a href="/"><h1 class="h1-responsive font-bold black-text mt-3">{{ config('app.name') }}</h1></a>
        </div>
    </li>
    <li>
        @include('contents.dashboard.includes.create')
    </li>
    <div class="sidenav-bg mask-strong"></div>
</ul>
