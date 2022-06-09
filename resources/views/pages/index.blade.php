@extends('pages.layouts.app')

@section('content')


<!-- END nav -->

<div class="hero-wrap js-fullheight" style="background-image: url({{ asset('assets/pages/images/phongnha4k.jpg') }});">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
      <div class="col-md-9 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
        <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><strong>Khám phá <br></strong> kỳ quan thiên nhiên  </h1>
        <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Tìm chuyến đi tuyệt vời của bạn</p>
        <div class="block-17 my-4">
          <form action="{{ route('search-tours') }}" method="GET" class="d-block d-flex">
            <div class="fields d-block d-flex">
              <div class="textfield-search one-third">
                  <input type="text" name="key" class="form-control" placeholder="Ex: food, service, hotel">
              </div>
              
            </div>
            <input type="submit" class="search-submit btn btn-primary" value="Tìm kiếm">  
          </form>
        </div>
        <p>Hoặc xem qua gợi ý của chúng tôi</p>
        <p class="browse d-md-flex">
            <span class="d-flex justify-content-md-center align-items-md-center"><a href="{{ route('search-tours',['key'=>'Hà nội']) }}"><i class="flaticon-fork"></i>Hà Nội</a></span>
            <span class="d-flex justify-content-md-center align-items-md-center"><a href="{{ route('search-tours',['key'=>'Phong Nha']) }}"><i class="flaticon-hotel"></i>Phong Nha</a></span> 
            <span class="d-flex justify-content-md-center align-items-md-center"><a href="{{ route('search-tours',['key'=>'Đà Nẵng']) }}"><i class="flaticon-meeting-point"></i>Đà Nẵng</a></span> 
            <span class="d-flex justify-content-md-center align-items-md-	center"><a href="{{ route('search-tours',['key'=>'Phú Quốc']) }}"><i class="flaticon-shopping-bag"></i>Phú Quốc</a></span>
        </p>
      </div>
    </div>
  </div>
</div>

<!-- <section class="ftco-section services-section bg-light">
  <div class="container">
    <div class="row d-flex">
      <div class="col-md-3 d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services d-block text-center">
          <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-guarantee"></span></div></div>
          <div class="media-body p-2 mt-2">
            <h3 class="heading mb-3">Best Price Guarantee</h3>
            <p>A small river named Duden flows by their place and supplies.</p>
          </div>
        </div>      
      </div>
      <div class="col-md-3 d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services d-block text-center">
          <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-like"></span></div></div>
          <div class="media-body p-2 mt-2">
            <h3 class="heading mb-3">Travellers Love Us</h3>
            <p>A small river named Duden flows by their place and supplies.</p>
          </div>
        </div>    
      </div>
      <div class="col-md-3 d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services d-block text-center">
          <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-detective"></span></div></div>
          <div class="media-body p-2 mt-2">
            <h3 class="heading mb-3">Best Travel Agent</h3>
            <p>A small river named Duden flows by their place and supplies.</p>
          </div>
        </div>      
      </div>
      <div class="col-md-3 d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services d-block text-center">
          <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-support"></span></div></div>
          <div class="media-body p-2 mt-2">
            <h3 class="heading mb-3">Our Dedicated Support</h3>
            <p>A small river named Duden flows by their place and supplies.</p>
          </div>
        </div>      
      </div>
    </div>
  </div>
</section> -->

<!-- <section class="ftco-section ftco-destination">
    <div class="container">
        <div class="row justify-content-start mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate">
          <span class="subheading">Danh mục </span>
        <h2 class="mb-4"><strong>Danh mục</strong> nổi bật</h2>
      </div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="destination-slider owl-carousel ftco-animate">
                    <div class="item">
                        <div class="destination">
                            <a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(images/destination-1.jpg);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search2"></span>
                                </div>
                            </a>
                            <div class="text p-3">
                                <h3><a href="#">Paris, Italy</a></h3>
                                <span class="listing">15 Listing</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="destination">
                            <a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(images/destination-2.jpg);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search2"></span>
                                </div>
                            </a>
                            <div class="text p-3">
                                <h3><a href="#">San Francisco, USA</a></h3>
                                <span class="listing">20 Listing</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="destination">
                            <a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(images/destination-3.jpg);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search2"></span>
                                </div>
                            </a>
                            <div class="text p-3">
                                <h3><a href="#">Lodon, UK</a></h3>
                                <span class="listing">10 Listing</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="destination">
                            <a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(images/destination-4.jpg);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search2"></span>
                                </div>
                            </a>
                            <div class="text p-3">
                                <h3><a href="#">Lion, Singapore</a></h3>
                                <span class="listing">3 Listing</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="destination">
                            <a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(images/destination-5.jpg);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search2"></span>
                                </div>
                            </a>
                            <div class="text p-3">
                                <h3><a href="#">Australia</a></h3>
                                <span class="listing">3 Listing</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="destination">
                            <a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(images/destination-6.jpg);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search2"></span>
                                </div>
                            </a>
                            <div class="text p-3">
                                <h3><a href="#">Paris, Italy</a></h3>
                                <span class="listing">3 Listing</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- <section class="ftco-section bg-light">
    <div class="container">
            <div class="row justify-content-start mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate">
          <span class="subheading">Tour</span>
        <h2 class="mb-4"><strong>Tour</strong> nổi bật </h2>
      </div>
    </div>    		
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm col-md-6 col-lg ftco-animate">
                <div class="destination">
                    <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/destination-1.jpg);">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-search2"></span>
                        </div>
                    </a>
                    <div class="text p-3">
                        <div class="d-flex">
                            <div class="one">
                                <h3><a href="#">Paris, Italy</a></h3>
                                <p class="rate">
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star-o"></i>
                                    <span>8 Rating</span>
                                </p>
                            </div>
                            <div class="two">
                                <span class="price">$200</span>
                            </div>
                        </div>
                        <p>Far far away, behind the word mountains, far from the countries</p>
                        <p class="days"><span>2 days 3 nights</span></p>
                        <hr>
                        <p class="bottom-area d-flex">
                            <span><i class="icon-map-o"></i> San Franciso, CA</span> 
                            <span class="ml-auto"><a href="#">Discover</a></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm col-md-6 col-lg ftco-animate">
                <div class="destination">
                    <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/destination-2.jpg);">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-search2"></span>
                        </div>
                    </a>
                    <div class="text p-3">
                        <div class="d-flex">
                            <div class="one">
                                <h3><a href="#">Paris, Italy</a></h3>
                                <p class="rate">
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star-o"></i>
                                    <span>8 Rating</span>
                                </p>
                            </div>
                            <div class="two">
                                <span class="price">$200</span>
                            </div>
                        </div>
                        <p>Far far away, behind the word mountains, far from the countries</p>
                        <p class="days"><span>2 days 3 nights</span></p>
                        <hr>
                        <p class="bottom-area d-flex">
                            <span><i class="icon-map-o"></i> San Franciso, CA</span> 
                            <span class="ml-auto"><a href="#">Discover</a></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm col-md-6 col-lg ftco-animate">
                <div class="destination">
                    <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/destination-3.jpg);">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-search2"></span>
                        </div>
                    </a>
                    <div class="text p-3">
                        <div class="d-flex">
                            <div class="one">
                                <h3><a href="#">Paris, Italy</a></h3>
                                <p class="rate">
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star-o"></i>
                                    <span>8 Rating</span>
                                </p>
                            </div>
                            <div class="two">
                                <span class="price">$200</span>
                            </div>
                        </div>
                        <p>Far far away, behind the word mountains, far from the countries</p>
                        <p class="days"><span>2 days 3 nights</span></p>
                        <hr>
                        <p class="bottom-area d-flex">
                            <span><i class="icon-map-o"></i> San Franciso, CA</span> 
                            <span class="ml-auto"><a href="#">Discover</a></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm col-md-6 col-lg ftco-animate">
                <div class="destination">
                    <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/destination-4.jpg);">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-search2"></span>
                        </div>
                    </a>
                    <div class="text p-3">
                        <div class="d-flex">
                            <div class="one">
                                <h3><a href="#">Paris, Italy</a></h3>
                                <p class="rate">
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star-o"></i>
                                    <span>8 Rating</span>
                                </p>
                            </div>
                            <div class="two">
                                <span class="price">$200</span>
                            </div>
                        </div>
                        <p>Far far away, behind the word mountains, far from the countries</p>
                        <p class="days"><span>2 days 3 nights</span></p>
                        <hr>
                        <p class="bottom-area d-flex">
                            <span><i class="icon-map-o"></i> San Franciso, CA</span> 
                            <span class="ml-auto"><a href="#">Discover</a></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm col-md-6 col-lg ftco-animate">
                <div class="destination">
                    <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/destination-5.jpg);">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-search2"></span>
                        </div>
                    </a>
                    <div class="text p-3">
                        <div class="d-flex">
                            <div class="one">
                                <h3><a href="#">Paris, Italy</a></h3>
                                <p class="rate">
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star-o"></i>
                                    <span>8 Rating</span>
                                </p>
                            </div>
                            <div class="two">
                                <span class="price">$200</span>
                            </div>
                        </div>
                        <p>Far far away, behind the word mountains, far from the countries</p>
                        <p class="days"><span>2 days 3 nights</span></p>
                        <hr>
                        <p class="bottom-area d-flex">
                            <span><i class="icon-map-o"></i> San Franciso, CA</span> 
                            <span class="ml-auto"><a href="#">Discover</a></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section> -->

<!-- <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_1.jpg);">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
        <h2 class="mb-4">Some fun facts</h2>
        <span class="subheading">More than 100,000 websites hosted</span>
      </div>
    </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
              <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="100000">0</strong>
                    <span>Happy Customers</span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="40000">0</strong>
                    <span>Destination Places</span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="87000">0</strong>
                    <span>Hotels</span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="56400">0</strong>
                    <span>Restaurant</span>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    </div>
</section> -->


<!-- <section class="ftco-section">
    <div class="container">
            <div class="row justify-content-start mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate">
          <span class="subheading">Special Offers</span>
        <h2 class="mb-4"><strong>Popular</strong> Hotels &amp; Rooms</h2>
      </div>
    </div>    		
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm col-md-6 col-lg ftco-animate">
                <div class="destination">
                    <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/hotel-1.jpg);">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-search2"></span>
                        </div>
                    </a>
                    <div class="text p-3">
                        <div class="d-flex">
                            <div class="one">
                                <h3><a href="#">Hotel, Italy</a></h3>
                                <p class="rate">
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star-o"></i>
                                    <span>8 Rating</span>
                                </p>
                            </div>
                            <div class="two">
                                <span class="price per-price">$40<br><small>/night</small></span>
                            </div>
                        </div>
                        <p>Far far away, behind the word mountains, far from the countries</p>
                        <hr>
                        <p class="bottom-area d-flex">
                            <span><i class="icon-map-o"></i> Miami, Fl</span> 
                            <span class="ml-auto"><a href="#">Book Now</a></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm col-md-6 col-lg ftco-animate">
                <div class="destination">
                    <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/hotel-2.jpg);">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-search2"></span>
                        </div>
                    </a>
                    <div class="text p-3">
                        <div class="d-flex">
                            <div class="one">
                                <h3><a href="#">Hotel, Italy</a></h3>
                                <p class="rate">
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star-o"></i>
                                    <span>8 Rating</span>
                                </p>
                            </div>
                            <div class="two">
                                <span class="price per-price">$40<br><small>/night</small></span>
                            </div>
                        </div>
                        <p>Far far away, behind the word mountains, far from the countries</p>
                        <hr>
                        <p class="bottom-area d-flex">
                            <span><i class="icon-map-o"></i> Miami, Fl</span> 
                            <span class="ml-auto"><a href="#">Book Now</a></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm col-md-6 col-lg ftco-animate">
                <div class="destination">
                    <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/hotel-3.jpg);">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-search2"></span>
                        </div>
                    </a>
                    <div class="text p-3">
                        <div class="d-flex">
                            <div class="one">
                                <h3><a href="#">Hotel, Italy</a></h3>
                                <p class="rate">
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star-o"></i>
                                    <span>8 Rating</span>
                                </p>
                            </div>
                            <div class="two">
                                <span class="price per-price">$40<br><small>/night</small></span>
                            </div>
                        </div>
                        <p>Far far away, behind the word mountains, far from the countries</p>
                        <hr>
                        <p class="bottom-area d-flex">
                            <span><i class="icon-map-o"></i> Miami, Fl</span> 
                            <span class="ml-auto"><a href="#">Book Now</a></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm col-md-6 col-lg ftco-animate">
                <div class="destination">
                    <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/hotel-4.jpg);">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-search2"></span>
                        </div>
                    </a>
                    <div class="text p-3">
                        <div class="d-flex">
                            <div class="one">
                                <h3><a href="#">Hotel, Italy</a></h3>
                                <p class="rate">
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star-o"></i>
                                    <span>8 Rating</span>
                                </p>
                            </div>
                            <div class="two">
                                <span class="price per-price">$40<br><small>/night</small></span>
                            </div>
                        </div>
                        <p>Far far away, behind the word mountains, far from the countries</p>
                        <hr>
                        <p class="bottom-area d-flex">
                            <span><i class="icon-map-o"></i> Miami, Fl</span> 
                            <span class="ml-auto"><a href="#">Book Now</a></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm col-md-6 col-lg ftco-animate">
                <div class="destination">
                    <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/hotel-5.jpg);">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-search2"></span>
                        </div>
                    </a>
                    <div class="text p-3">
                        <div class="d-flex">
                            <div class="one">
                                <h3><a href="#">Hotel, Italy</a></h3>
                                <p class="rate">
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star-o"></i>
                                    <span>8 Rating</span>
                                </p>
                            </div>
                            <div class="two">
                                <span class="price per-price">$40<br><small>/night</small></span>
                            </div>
                        </div>
                        <p>Far far away, behind the word mountains, far from the countries</p>
                        <hr>
                        <p class="bottom-area d-flex">
                            <span><i class="icon-map-o"></i> Miami, Fl</span> 
                            <span class="ml-auto"><a href="#">Book Now</a></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- <section class="ftco-section testimony-section bg-light">
  <div class="container">
    <div class="row justify-content-start">
      <div class="col-md-5 heading-section ftco-animate">
          <span class="subheading">Best Directory Website</span>
        <h2 class="mb-4 pb-3"><strong>Why</strong> Choose Us?</h2>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life.</p>
        <p><a href="#" class="btn btn-primary btn-outline-primary mt-4 px-4 py-3">Read more</a></p>
      </div>
                <div class="col-md-1"></div>
      <div class="col-md-6 heading-section ftco-animate">
          <span class="subheading">Testimony</span>
        <h2 class="mb-4 pb-3"><strong>Our</strong> Guests Says</h2>
          <div class="row ftco-animate">
              <div class="col-md-12">
                <div class="carousel-testimony owl-carousel">
                  <div class="item">
                    <div class="testimony-wrap d-flex">
                      <div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">
                        <span class="quote d-flex align-items-center justify-content-center">
                          <i class="icon-quote-left"></i>
                        </span>
                      </div>
                      <div class="text ml-md-4">
                        <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                        <p class="name">Dennis Green</p>
                        <span class="position">Guest from italy</span>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="testimony-wrap d-flex">
                      <div class="user-img mb-5" style="background-image: url(images/person_2.jpg)">
                        <span class="quote d-flex align-items-center justify-content-center">
                          <i class="icon-quote-left"></i>
                        </span>
                      </div>
                      <div class="text ml-md-4">
                        <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                        <p class="name">Dennis Green</p>
                        <span class="position">Guest from London</span>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="testimony-wrap d-flex">
                      <div class="user-img mb-5" style="background-image: url(images/person_3.jpg)">
                        <span class="quote d-flex align-items-center justify-content-center">
                          <i class="icon-quote-left"></i>
                        </span>
                      </div>
                      <div class="text ml-md-4">
                        <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                        <p class="name">Dennis Green</p>
                        <span class="position">Guest from Philippines</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      </div>
    </div>
  </div>
</section> -->

<!-- <section class="ftco-section">
    <div class="container">
            <div class="row justify-content-start mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate">
          <span class="subheading">Special Offers</span>
        <h2 class="mb-4"><strong>Popular</strong> Restaurants</h2>
      </div>
    </div>    		
        <div class="row">
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="destination">
                    <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/restaurant-1.jpg);">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-search2"></span>
                        </div>
                    </a>
                    <div class="text p-3">
                        <h3><a href="#">Luxury Restaurant</a></h3>
                        <p class="rate">
                            <i class="icon-star"></i>
                            <i class="icon-star"></i>
                            <i class="icon-star"></i>
                            <i class="icon-star"></i>
                            <i class="icon-star-o"></i>
                            <span>8 Rating</span>
                        </p>
                        <p>Far far away, behind the word mountains, far from the countries</p>
                        <hr>
                        <p class="bottom-area d-flex">
                            <span><i class="icon-map-o"></i> San Franciso, CA</span> 
                            <span class="ml-auto"><a href="#">Discover</a></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="destination">
                    <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/restaurant-2.jpg);">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-search2"></span>
                        </div>
                    </a>
                    <div class="text p-3">
                        <h3><a href="#">Luxury Restaurant</a></h3>
                        <p class="rate">
                            <i class="icon-star"></i>
                            <i class="icon-star"></i>
                            <i class="icon-star"></i>
                            <i class="icon-star"></i>
                            <i class="icon-star-o"></i>
                            <span>8 Rating</span>
                        </p>
                        <p>Far far away, behind the word mountains, far from the countries</p>
                        <hr>
                        <p class="bottom-area d-flex">
                            <span><i class="icon-map-o"></i> San Franciso, CA</span> 
                            <span class="ml-auto"><a href="#">Book Now</a></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="destination">
                    <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/restaurant-3.jpg);">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-search2"></span>
                        </div>
                    </a>
                    <div class="text p-3">
                        <h3><a href="#">Luxury Restaurant</a></h3>
                        <p class="rate">
                            <i class="icon-star"></i>
                            <i class="icon-star"></i>
                            <i class="icon-star"></i>
                            <i class="icon-star"></i>
                            <i class="icon-star-o"></i>
                            <span>8 Rating</span>
                        </p>
                        <p>Far far away, behind the word mountains, far from the countries</p>
                        <hr>
                        <p class="bottom-area d-flex">
                            <span><i class="icon-map-o"></i> San Franciso, CA</span> 
                            <span class="ml-auto"><a href="#">Book Now</a></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="destination">
                    <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/restaurant-4.jpg);">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-search2"></span>
                        </div>
                    </a>
                    <div class="text p-3">
                        <h3><a href="#">Luxury Restaurant</a></h3>
                        <p class="rate">
                            <i class="icon-star"></i>
                            <i class="icon-star"></i>
                            <i class="icon-star"></i>
                            <i class="icon-star"></i>
                            <i class="icon-star-o"></i>
                            <span>8 Rating</span>
                        </p>
                        <p>Far far away, behind the word mountains, far from the countries</p>
                        <hr>
                        <p class="bottom-area d-flex">
                            <span><i class="icon-map-o"></i> San Franciso, CA</span> 
                            <span class="ml-auto"><a href="#">Book Now</a></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-start mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate">
        <span class="subheading">Tin tức & sự kiện</span>
        <h2><strong>Tin tức &amp;  sự kiện</strong> nổi bật</h2>
      </div>
    </div>
    <div class="row d-flex">
      @foreach ($posts as $post)
        
      <div class="col-md-3 d-flex ftco-animate">
        <div class="blog-entry align-self-stretch">
          <a href="blog-single.html" class="block-20" style="background-image: url({{ Storage::disk('s3')->url($post->image_path) }});">
          </a>
          <div class="text p-4 d-block">
              <span class="tag">{{ $post->Category->name }}</span>
            <h3 class="heading mt-3"><a href="{{ route('show-blog-post',$post->slug) }}">{{ $post->name }}</a></h3>
            <div class="meta mb-3">
              <div><a href="#">{{ $post->created_at }}</a></div>
              
            </div>
          </div>
        </div>
      </div>
      @endforeach
    
    </div>
   {{ $posts->links('vendor.pagination.custom-paginate') }}
</section>
    
    <section class="ftco-section-parallax">
  <div class="parallax-img d-flex align-items-center">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
          <h2>Subcribe to our Newsletter</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
          <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-8">
              <form action="#" class="subscribe-form">
                <div class="form-group d-flex">
                  <input type="text" class="form-control" placeholder="Enter email address">
                  <input type="submit" value="Subscribe" class="submit px-3">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection