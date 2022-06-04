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
    <section class="ftco-section ftco-degree-bg">
        <div class="container-fuild">
            <div class="row d-flex justify-content-between mx-2">
                <div class="col-lg-3 ">
                    <div class="list-group ">
                        @foreach ($posts as $post)
                            
                        <a href="{{ route('show-blog-post',$post->slug) }}" class="list-group-item list-group-item-action flex-column align-items-start ">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $post->name }}</h5>
                                <small>{{ Carbon::parse($post->created_at)->diff(Carbon::now())->days < 1 ? 'Today': Carbon::parse($post->created_at)->diffForHumans(Carbon::now()).'days ago'}} </small>
                            </div>
                            <p class="mb-1">{{ $post->title }}</p>
                            <small>{{ $post->Category->name }}</small>
                        </a>
                        @endforeach
                     
                    </div>
                </div>
                <div class="col-lg-9 order-sm-first order-lg-last">
                    <div style="margin-left:20px">
                        <ul class="list-group list-ads d-flex flex-row ">
                            <li class="list-group-item"> <a href="">Trả chậm 0% lãi suất cùng Sacombank </a> </li>
                            <li class="list-group-item"> <a href="">Nước Việt tôi yêu - Giảm 10% cùng thẻ tín dụng VIB</a>
                            </li>
                            <li class="list-group-item"> <a href="">chương trình ưu đãi VNPAY </a> </li>
                            <li class="list-group-item"> <a href="">Chương trình hoàn tiền MSB </a> </li>
                        </ul>
                    </div>
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          @foreach ($banners as $index => $banner)
                          <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}" class="{{ $index==0?'active':'' }}"></li>
                          @endforeach
                            {{-- <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li> --}}
                        </ol>
                        <div class="carousel-inner">
                            @if (isset($banners))
                                @foreach ($banners as  $index => $banner)
                                    <div class="carousel-item {{ $index==0?'active':'' }} ">
                                        <a target="_blank" href="{{ $banner->url }}" class="open-in-newtab">
                                        <img class="d-block img-fluid"
                                            src="{{ Storage::disk('s3')->url($banner->image_path) }}" alt="{{ $banner->description }}">
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                            {{-- <div class="carousel-item active">
                                <img class="d-block img-fluid" src="{{ asset('assets/pages/images/vietnambooking3.jpg') }}"
                                    alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="{{ asset('assets/pages/images/vietnambooking.jpg') }}"
                                    alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="{{ asset('assets/pages/images/seagame.jpg') }}"
                                    alt="Third slide">
                            </div>
                            <div class="carousel-item">
                              <img class="d-block img-fluid" src="{{ asset('assets/pages/images/vietnambooking2.jpg') }}"
                                  alt="4th slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block img-fluid" src="{{ asset('assets/pages/images/slide.jpg') }}"
                                alt="4th slide">
                        </div> --}}
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div class="d-flex flex-row " style="margin-left:12px">
                        @foreach ($ads as $ad)
                        <div class="ads-wrap">
                            <a target="_blank" href="{{ $ad->url }}">
                                <img src="{{ Storage::disk('s3')->url($ad->image_path) }}"
                                    class="card-img-top" alt="{{ $ad->name }}">
                            </a>
                        </div>
                        @endforeach
                       
                    </div>
                </div>

            </div> <!-- .col-md-8 -->
        </div>
    </section> <!-- .section -->
@endsection
