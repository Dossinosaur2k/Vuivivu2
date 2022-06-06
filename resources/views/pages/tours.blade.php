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

    @if (isset($data))
        <section class="ftco-section ftco-degree-bg" style="padding:10em 6em 6em 6em !important">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 sidebar ftco-animate">
                        <div class="sidebar-wrap bg-light ftco-animate">
                            <h3 class="heading mb-4">Tìm tour</h3>
                            <form action="{{ route('search-tours') }}" method="GET">
                                <div class="fields">
                                    <div class="form-group">
                                        <input type="text" name="key" class="form-control"
                                            value="{{ Request::input('key') ? Request::input('key') : '' }}"
                                            placeholder="Nơi bạn muốn tới">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="price" class="form-control"  id="tour-price"
                                            value="{{ Request::input('price') ? Request::input('price') : '' }}"
                                            placeholder="Khoảng giá">
                                    </div>
                                    <div class="form-group">
                                        <div class="select-wrap one-third">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="filter" id="filter" class="form-control"
                                                placeholder="Sắp xếp theo">
                                                <option value="">Không sắp xếp </option>
                                                <option value="asc" {{ Request::input('filter') == 'asc' ? 'selected' : '' }}>
                                                    Giá tăng dần</option>
                                                <option value="desc" {{ Request::input('filter') == 'desc' ? 'selected' : '' }}>
                                                    Giá giảm dần</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                      <input type="text" id="checkin_date" class="form-control" placeholder="Date from">
                    </div>
                    <div class="form-group">
                      <input type="text" id="checkin_date" class="form-control" placeholder="Date to">
                    </div> --}}
                                    {{-- <div class="form-group">
                        <div class="range-slider">
                            <span>
                                          <input type="number" value="25000" min="0" max="120000"/>	-
                                          <input type="number" value="50000" min="0" max="120000"/>
                            </span>
                                        <input value="1000" min="0" max="120000" step="500" type="range"/>
                                        <input value="50000" min="0" max="120000" step="500" type="range"/>
                          </div>
                    </div> --}}
                                    <div class="form-group">
                                        <input type="submit" value="Search" class="btn btn-primary py-3 px-5">
                                    </div>
                                </div>
                            </form>
                        </div>

                        @if (isset($data['website']))
                            <div class="sidebar-wrap bg-light ftco-animate">
                                <ul class="list-group">
                                    @foreach ($data['website'] as $key => $value)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <a
                                                href="{{ route('search-tours', ['key' => Request::input('key'), 'price' => Request::input('price'), 'filter' => Request::input('filter'), 'website' => $key]) }}">
                                            {{ $key }}
                                            </a>
                                            <span class="badge badge-primary badge-pill">{{ $value }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-9">
                        <h4> Có {{ $data['total'] }} kết quả tìm kiếm "{{ Request::input('key') }}"</h4>
                        <div class="row">
                            @if (!empty($data))
                                @foreach ($data['tours'] as $tour)
                                    <div class="col-md-4 ftco-animate">
                                        <div class="destination">
                                            <a target="_blank" href="{{ $tour->Tour_link }}"
                                                class="img img-2 d-flex justify-content-center align-items-center"
                                                style="background-image: url({{ $tour->Tour_img }});">
                                                <div class="icon d-flex justify-content-center align-items-center">
                                                    <span class="icon-search2"></span>
                                                </div>
                                            </a>
                                            <div class="text p-3">
                                                <div class="d-flex flex-column">
                                                    <div class="one" style="width:100% important!">
                                                        <h3><a class="tour_name"
                                                                target="_blank"
                                                                href="{{ $tour->Tour_link }}"
                                                                
                                                                >{{ $tour->Tour_name }}</a>
                                                        </h3>

                                                    </div>

                                                </div>
                                                <div class="two" style="width:auto; text-align:left">
                                                    <span class="price">{{ currency_format($tour->Tour_price) }} </span>
                                                </div>
                                                <p class="days"><span>{{ $tour->Tour_duration }}</span></p>
                                                <hr>
                                                <div class="web-logo d-flex flex-row justify-content-between">
                                                    <span> Nơi bán : </span>
                                                    <div style=" ">

                                                        <a target="_blank" href="{{ $tour->Tour_link }}  ">

                                                            <img class="img-thumbnail" style="background-color: orange; width:100px; height:50px"
                                                                src="{{ $tour->Web_logo }}" alt="zz">

                                                        </a>
                                                    </div>
                                                </div>
                                                <hr>
                                                <p class="bottom-area d-flex flex-row">
                                                    <span> KH: {{ $tour->Tour_start_day }}</span>
                                                    <span class="ml-auto"><a href="#">Xem Ngay</a></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                        </div>
                        {{-- <div class="row mt-5">
                <div class="col text-center">
                  <div class="block-27">
                    <ul>
                      <li><a href="#">&lt;</a></li>
                      <li class="active"><span>1</span></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                      <li><a href="#">&gt;</a></li>
                    </ul>
                  </div>
                </div>
              </div> --}}
                        {{ $data['tours']->links() }}
    @endif


    </div> <!-- .col-md-8 -->
    </div>
    </div>
    </section> <!-- .section -->

    @endif

@endsection
