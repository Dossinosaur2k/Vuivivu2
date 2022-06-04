<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light {{ (Request::is('tours/*') || Request::is('blog/post/*'))  ? 'ftco-navbar-light2' : '' }}"
    id="ftco-navbar">
    <div class="container d-flex ">
        <a class="navbar-brand" href="/">Vuivivu </a>
        @if(Request::is('tours/index'))
        <div class="search-box ml-lg-5">
            <form action="{{ route('search-tours') }}" method="get" class="search-form" autoComplete="off">
            <input type="text" placeholder="Tìm kiếm" name="key" id="key"  >
            <button type="submit" class="d-none"></button>
            </form>
            {{-- <div class="">
                <h3> Lịch sử tìm kiếm</h3>
                <ul>
                    <li>
                        <a href=""></a>
                    </li>  
                    <li>
                        <a href=""></a>
                    </li>    
                </ul>
            </div> --}}
        </div>
        @endif
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            MENU
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}"><a href="/" class="nav-link">TRANG CHỦ</a>
                </li>
                <!-- <li class="nav-item"><a href="about.html" class="nav-link"></a></li> -->
                <li class="nav-item {{ Request::is('tours/*') ? 'active' : '' }}"><a href="/tours/index"
                        class="nav-link">TOUR</a></li>
                <!-- <li class="nav-item"><a href="hotel.html" class="nav-link">Hotels</a></li> -->
                <li class="nav-item {{ Request::is('blog/*') ? 'active' : '' }}"><a href="/blog/index" class="nav-link">BẢN
                        TIN</a></li>
                <!-- <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
        <li class="nav-item cta"><a href="contact.html" class="nav-link"><span>Add listing</span></a></li> -->
            </ul>
        </div>
    </div>
</nav>
