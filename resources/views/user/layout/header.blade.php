<!-- Topbar Start -->
<div class="container-fluid">
    <div class="row align-items-center bg-light px-lg-5">
        <div class="col-12 col-md-8">
            <div class="d-flex justify-content-between">
                <div class="bg-primary text-white text-center py-2" style="width: 100px;">MỚI NHẤT</div>
                <div class="owl-carousel owl-carousel-1 tranding-carousel position-relative d-inline-flex align-items-center ml-3" style="width: calc(100% - 100px); padding-left: 90px;">
                    @foreach($data['trending'] as $news)
                    <div class="text-truncate">
                        <a class="text-secondary" href="{{ route('newsdetail',['unsigned_title'=>changeTitle($news->title),'created_at'=>$news->created_at,'id'=>$news->id]) }}">
                            {{ $news->title }}
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4 text-right d-none d-md-block">
            Monday, January 01, 2045
        </div>
    </div>
    <div class="row align-items-center py-2 px-lg-5">
        <div class="col-lg-4">
            <a href="" class="navbar-brand d-none d-lg-block">
                <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
            </a>
        </div>
        <div class="col-lg-8 text-center text-lg-right">
            <img class="img-fluid" src="asset/img/ads-700x70.jpg" alt="">
        </div>
    </div>
</div>
<!-- Topbar End -->


