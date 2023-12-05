@extends('user.layout.index')
@section('content')
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="container">
        <nav class="breadcrumb bg-transparent m-0 p-0">
            <a class="breadcrumb-item" href="">Trang chủ</a>
            <a class="breadcrumb-item" href="">{{ $newstype->category->name }}</a>
            <span class="breadcrumb-item active">{{ $newstype->name }}</span>
        </nav>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- News With Sidebar Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">{{ $newstype->name }}</h3>
                        </div>
                    </div>
                    <!-- News Start -->
                    @foreach($news as $news)
                    <div class="col-lg-6">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100" src="upload/news/{{ $news->image }}" style="object-fit: cover;" style='height:280px;'>
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 14px;">
                                    <a href="{{ $news->newsType->category->unsigned_name }}/{{ $newstype->unsigned_name }}">{{ $newstype->name }}</a>
                                    <span class="px-1">/</span>
                                    <span>{{ $news->created_at->toFormattedDateString(); }}</span>
                                </div>
                                <a class="h4" href="page/{{ $news->id }}/{{ $news->title }}">{{ $news->title }}</a>
                                <p class="m-0">{!! $news->description !!}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- News End -->
                </div>
                <!-- Ads Start -->
                <div class="mb-3">
                    <a href=""><img class="img-fluid w-100" src="asset/img/ads-700x70.jpg" alt=""></a>
                </div>
                <!-- Ads End -->

                <div class="row">
                    
                    <div class="col-lg-6">
                        <div class="d-flex mb-3">
                            <img src="asset/img/news-100x100-5.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h6 m-0" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pagination Start -->
                
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="Page navigation">
                          <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                              <a class="page-link" href="#" aria-label="Previous">
                                <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Next">
                                <span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                    </div>
                </div>
                <!-- Pagination End -->
            </div>

            <div class="col-lg-4 pt-3 pt-lg-0">
                <!-- Popular News Start -->
                @include('user.page.component.trending-news')
                <!-- Popular News End -->
                
                <!-- Social Follow Start -->
                @include('user.page.component.social')
                <!-- Social Follow End -->

                <!-- Newsletter Start -->
                <div class="pb-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Newsletter</h3>
                    </div>
                    <div class="bg-light text-center p-4 mb-3">
                        <p>Aliqu justo et labore at eirmod justo sea erat diam dolor diam vero kasd</p>
                        <div class="input-group" style="width: 100%;">
                            <input type="text" class="form-control form-control-lg" placeholder="Your Email">
                            <div class="input-group-append">
                                <button class="btn btn-primary">Sign Up</button>
                            </div>
                        </div>
                        <small>Sit eirmod nonumy kasd eirmod</small>
                    </div>
                </div>
                <!-- Newsletter End -->

                <!-- Ads Start -->
                <div class="mb-3 pb-3">
                    <a href=""><img class="img-fluid" src="asset/img/news-500x280-4.jpg" alt=""></a>
                </div>
                <!-- Ads End -->

                <!-- Tags Start -->
                @include('user.page.component.tags')
                <!-- Tags End -->
            </div>

        </div>
    </div>
</div>
</div>
<!-- News With Sidebar End -->
@endsection