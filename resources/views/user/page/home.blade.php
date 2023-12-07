@extends('user.layout.index')
@section('content')

@include('user.page.component.top-news')
@include('user.page.component.main-news')
@include('user.page.component.featured-news')


<!-- News With Sidebar Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- weekly-highlight-news Start -->
                @include('user.page.component.weekly-highlight-news')
                <!-- weekly-highlight-news End -->

                <!-- Ads Start -->
                <div class="mb-3 pb-3">
                    <a href=""><img class="img-fluid w-100" src="asset/img/ads-700x70.jpg" alt=""></a>
                </div>
                <!-- Ads End -->

                <!-- Latest News Start -->
                @include('user.page.component.latest-news')
                <!-- Latest News End -->
            </div>
            
            <div class="col-lg-4 pt-3 pt-lg-0">
                <!-- Trending News Start -->
                @include('user.page.component.trending-news')
                <!-- Trending News End -->

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