<!-- Latest News -->
<div class="row">
    <div class="col-12">
        <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
            <h3 class="m-0">TIN MỚI NHẤT</h3>
            <!--<a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>-->
        </div>
    </div>
    <!--cột trái-->
    <div class="col-lg-6">
        <!--cột trái trên-->
        <div class="position-relative mb-3">
            <img class="img-fluid w-100 " src="upload/news/{{$latestNews[0]->image}}" style="height: 200px; object-fit: cover;">
            <div class="overlay position-relative bg-light" style="height: 330px;">
                <div class=" mt-2" style="font-size: 14px;">
                    <a href="{{ route('newstype',['unsigned_namecate'=>$latestNews[0]->newsType->category->unsigned_name,'unsigned_name'=>$latestNews[0]->newsType->unsigned_name]) }}">
                        {{ $latestNews[0]->newsType->name }}</a>
                    <span class="px-1">/</span>
                    <span>{{ $latestNews[0]->created_at->toFormattedDateString(); }}</span>
                </div>
                <a class="h4" href="{{ route('newsdetail',['unsigned_title'=>changeTitle($latestNews[0]->title),'created_at'=>$latestNews[0]->created_at,'id'=>$latestNews[0]->id]) }}">
                    {{ $latestNews[0]->title }}</a>
                <p class="m-0">{!! $latestNews[0]->description !!}</p>
            </div>
        </div>
        <!--cột trái dưới-->
        <div class="d-flex mb-3">
            <img src="upload/news/{{$latestNews[3]->image}}" style="width: 100px; height: 100px; object-fit: cover;">
            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                <div class="mb-1" style="font-size: 13px;">
                    <a href="{{ route('newstype',['unsigned_namecate'=>$latestNews[3]->newsType->category->unsigned_name,'unsigned_name'=>$latestNews[3]->newsType->unsigned_name]) }}">
                        {{ $latestNews[3]->newsType->name }}</a>
                    <span class="px-1">/</span>
                    <span>{{ $latestNews[3]->created_at->toFormattedDateString(); }}</span>
                </div>
                <a class="h6 m-0" href="{{ route('newsdetail',['unsigned_title'=>changeTitle($latestNews[3]->title),'created_at'=>$latestNews[3]->created_at,'id'=>$latestNews[3]->id]) }}">
                    {{ $latestNews[3]->title }}</a>
            </div>
        </div>
        <div class="d-flex mb-3">
            <img src="upload/news/{{$latestNews[2]->image}}" style="width: 100px; height: 100px; object-fit: cover;">
            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                <div class="mb-1" style="font-size: 13px;">
                    <a href="{{ route('newstype',['unsigned_namecate'=>$latestNews[2]->newsType->category->unsigned_name,'unsigned_name'=>$latestNews[2]->newsType->unsigned_name]) }}">
                        {{ $latestNews[2]->newsType->name }}</a>
                    <span class="px-1">/</span>
                    <span>{{ $latestNews[2]->created_at->toFormattedDateString(); }}</span>
                </div>
                <a class="h6 m-0" href="{{ route('newsdetail',['unsigned_title'=>changeTitle($latestNews[2]->title),'created_at'=>$latestNews[2]->created_at,'id'=>$latestNews[2]->id]) }}">
                    {{ $latestNews[2]->title }}</a>
            </div>
        </div>
    </div>

    <!--cột phải-->
    <div class="col-lg-6">
        <!--cột phải trên-->
        <div class="position-relative mb-3">
            <img class="img-fluid w-100" src="upload/news/{{$latestNews[1]->image}}" style="height: 200px; object-fit: cover;">
            <div class="overlay position-relative bg-light" style="height: 330px;">
                <div class="mt-2" style="font-size: 14px;">
                    <a href="{{ route('newstype',['unsigned_namecate'=>$latestNews[1]->newsType->category->unsigned_name,'unsigned_name'=>$latestNews[1]->newsType->unsigned_name]) }}">
                        {{ $latestNews[1]->newsType->name }}</a>
                    <span class="px-1">/</span>
                    <span>{{ $latestNews[1]->created_at->toFormattedDateString(); }}</span>
                </div>
                <a class="h4" href="{{ route('newsdetail',['unsigned_title'=>changeTitle($latestNews[1]->title),'created_at'=>$latestNews[1]->created_at,'id'=>$latestNews[1]->id]) }}">
                    {{ $latestNews[1]->title }}</a>
                <p class="m-0">{!! $latestNews[1]->description !!}</p>
            </div>
        </div>
        <!--cột phải dưới-->
        <div class="d-flex mb-3">
            <img src="upload/news/{{$latestNews[4]->image}}" style="width: 100px; height: 100px; object-fit: cover;">
            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                <div class="mb-1" style="font-size: 13px;">
                    <a href="{{ route('newstype',['unsigned_namecate'=>$latestNews[4]->newsType->category->unsigned_name,'unsigned_name'=>$latestNews[4]->newsType->unsigned_name]) }}">
                        {{ $latestNews[4]->newsType->name }}</a>
                    <span class="px-1">/</span>
                    <span>{{ $latestNews[4]->created_at->toFormattedDateString(); }}</span>
                </div>
                <a class="h6 m-0" href="{{ route('newsdetail',['unsigned_title'=>changeTitle($latestNews[4]->title),'created_at'=>$latestNews[4]->created_at,'id'=>$latestNews[4]->id]) }}">
                    {{ $latestNews[4]->title }}</a>
            </div>
        </div>
        <div class="d-flex mb-3">
            <img src="upload/news/{{$latestNews[5]->image}}" style="width: 100px; height: 100px; object-fit: cover;">
            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                <div class="mb-1" style="font-size: 13px;">
                    <a href="{{ route('newstype',['unsigned_namecate'=>$latestNews[5]->newsType->category->unsigned_name,'unsigned_name'=>$latestNews[5]->newsType->unsigned_name]) }}">
                        {{ $latestNews[5]->newsType->name }}</a>
                    <span class="px-1">/</span>
                    <span>{{ $latestNews[5]->created_at->toFormattedDateString(); }}</span>
                </div>
                <a class="h6 m-0" href="{{ route('newsdetail',['unsigned_title'=>changeTitle($latestNews[5]->title),'created_at'=>$latestNews[5]->created_at,'id'=>$latestNews[5]->id]) }}">
                    {{ $latestNews[5]->title }}</a>
            </div>
        </div>
    </div>
</div>
<!-- End Latest News -->