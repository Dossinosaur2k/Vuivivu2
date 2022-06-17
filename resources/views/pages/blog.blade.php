@extends('pages.layouts.app')

@section('content')

    {{-- <div class="hero-wrap js-fullheight" style="background-image: url({{ asset('assets/pages/images/phongnha2.jpg') }});">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
          <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">TRANG CHỦ</a></span> <span>Tour</span></p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">PHONG NHA - KẺ BÀNG</h1>
        </div>
      </div>
    </div>
  </div> --}}

  <div class="hero-wrap js-fullheight" style="background-image: url({{ asset('assets/pages/images/phongnha2.jpg') }});">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
          <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">TRANG CHỦ</a></span> <span>Bản tin</span></p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Bản Tin &amp; Sự Kiện</h1>
        </div>
      </div>
    </div>
  </div>


  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row d-flex">
          @foreach ($posts as $post)
              
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="{{ route('show-blog-post',$post->slug) }}" class="block-20" style="background-image: url('{{ Storage::disk('s3')->url($post->image_path) }}');">
              </a>
              <div class="text p-4 d-block">
                  <span class="tag">{{ $post->Category->name }}</span>
                <h3 class="heading mt-3"><a href="#">{{ $post->name }}</a></h3>
                <div class="meta mb-3">
                  <div><a href="#">{{ $post->created_at }}</a></div>
                  <div><a href="#"></a></div>
                  {{-- <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div> --}}
                </div>
              </div>
            </div>
          </div>
          @endforeach
       
      </div>
     {{ $posts->links('vendor.pagination.custom-paginate') }}
    </div>
  </section>


@endsection
