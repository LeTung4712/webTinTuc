<!-- Breaking News Start -->
<div class="row mb-3">
    <div class="col-12">
        <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
            <h3 class="m-0" style="background-color:#ff5e34; color:#ffffff">TIÊU ĐIỂM TUẦN</h3>
            <!--<a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>-->
        </div>
    </div>
    <!--cột trái-->
    <div class="col-lg-6">
        <!--cột trái trên-->
        <div class="position-relative mb-3">
            <img class="img-fluid w-100 " src="upload/news/{{$weekNews[0]->image}}" style="height: 200px; object-fit: cover;">
            <div class="overlay position-relative bg-light" style="height: 330px;">
                <div class=" mt-2" style="font-size: 14px;">
                    <a href="{{ route('newstype',['unsigned_namecate'=>$weekNews[0]->newsType->category->unsigned_name,'unsigned_name'=>$weekNews[0]->newsType->unsigned_name]) }}">
                        {{ $weekNews[0]->newsType->name }}</a>
                    <span class="px-1">/</span>
                    <span>{{ $weekNews[0]->created_at->toFormattedDateString(); }}</span>
                </div>
                <a class="h4" href="{{ route('newsdetail',['unsigned_title'=>changeTitle($weekNews[0]->title),'created_at'=>$weekNews[0]->created_at,'id'=>$weekNews[0]->id]) }}">
                    {{ $weekNews[0]->title }}</a>
                <p class="m-0">{!! $weekNews[0]->description !!}</p>
            </div>
        </div>
        <!--cột trái dưới-->
        <div class="d-flex mb-3">
            <img src="upload/news/{{$weekNews[3]->image}}" style="width: 100px; height: 100px; object-fit: cover;">
            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                <div class="mb-1" style="font-size: 13px;">
                    <a href="{{ route('newstype',['unsigned_namecate'=>$weekNews[3]->newsType->category->unsigned_name,'unsigned_name'=>$weekNews[3]->newsType->unsigned_name]) }}">
                        {{ $weekNews[3]->newsType->name }}</a>
                    <span class="px-1">/</span>
                    <span>{{ $weekNews[3]->created_at->toFormattedDateString(); }}</span>
                </div>
                <a class="h6 m-0" href="{{ route('newsdetail',['unsigned_title'=>changeTitle($weekNews[3]->title),'created_at'=>$weekNews[3]->created_at,'id'=>$weekNews[3]->id]) }}">
                    {{ $weekNews[3]->title }}</a>
            </div>
        </div>
        <div class="d-flex mb-3">
            <img src="upload/news/{{$weekNews[2]->image}}" style="width: 100px; height: 100px; object-fit: cover;">
            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                <div class="mb-1" style="font-size: 13px;">
                    <a href="{{ route('newstype',['unsigned_namecate'=>$weekNews[2]->newsType->category->unsigned_name,'unsigned_name'=>$weekNews[2]->newsType->unsigned_name]) }}">
                        {{ $weekNews[2]->newsType->name }}</a>
                    <span class="px-1">/</span>
                    <span>{{ $weekNews[2]->created_at->toFormattedDateString(); }}</span>
                </div>
                <a class="h6 m-0" href="{{ route('newsdetail',['unsigned_title'=>changeTitle($weekNews[2]->title),'created_at'=>$weekNews[2]->created_at,'id'=>$weekNews[2]->id]) }}">
                    {{ $weekNews[2]->title }}</a>
            </div>
        </div>
    </div>

    <!--cột phải-->
    <div class="col-lg-6">
        <!--cột phải trên-->
        <div class="position-relative mb-3">
            <img class="img-fluid w-100" src="upload/news/{{$weekNews[1]->image}}" style="height: 200px; object-fit: cover;">
            <div class="overlay position-relative bg-light" style="height: 330px;">
                <div class="mt-2" style="font-size: 14px;">
                    <a href="{{ route('newstype',['unsigned_namecate'=>$weekNews[1]->newsType->category->unsigned_name,'unsigned_name'=>$weekNews[1]->newsType->unsigned_name]) }}">
                        {{ $weekNews[1]->newsType->name }}</a>
                    <span class="px-1">/</span>
                    <span>{{ $weekNews[1]->created_at->toFormattedDateString(); }}</span>
                </div>
                <a class="h4" href="{{ route('newsdetail',['unsigned_title'=>changeTitle($weekNews[1]->title),'created_at'=>$weekNews[1]->created_at,'id'=>$weekNews[1]->id]) }}">
                    {{ $weekNews[1]->title }}</a>
                <p class="m-0">{!! $weekNews[1]->description !!}</p>
            </div>
        </div>
        <!--cột phải dưới-->
        <div class="d-flex mb-3">
            <img src="upload/news/{{$weekNews[4]->image}}" style="width: 100px; height: 100px; object-fit: cover;">
            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                <div class="mb-1" style="font-size: 13px;">
                    <a href="{{ route('newstype',['unsigned_namecate'=>$weekNews[4]->newsType->category->unsigned_name,'unsigned_name'=>$weekNews[4]->newsType->unsigned_name]) }}">
                        {{ $weekNews[4]->newsType->name }}</a>
                    <span class="px-1">/</span>
                    <span>{{ $weekNews[4]->created_at->toFormattedDateString(); }}</span>
                </div>
                <a class="h6 m-0" href="{{ route('newsdetail',['unsigned_title'=>changeTitle($weekNews[4]->title),'created_at'=>$weekNews[4]->created_at,'id'=>$weekNews[4]->id]) }}">
                    {{ $weekNews[4]->title }}</a>
            </div>
        </div>
        <div class="d-flex mb-3">
            <img src="upload/news/{{$weekNews[5]->image}}" style="width: 100px; height: 100px; object-fit: cover;">
            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                <div class="mb-1" style="font-size: 13px;">
                    <a href="{{ route('newstype',['unsigned_namecate'=>$weekNews[5]->newsType->category->unsigned_name,'unsigned_name'=>$weekNews[5]->newsType->unsigned_name]) }}">
                        {{ $weekNews[5]->newsType->name }}</a>
                    <span class="px-1">/</span>
                    <span>{{ $weekNews[5]->created_at->toFormattedDateString(); }}</span>
                </div>
                <a class="h6 m-0" href="{{ route('newsdetail',['unsigned_title'=>changeTitle($weekNews[5]->title),'created_at'=>$weekNews[5]->created_at,'id'=>$weekNews[5]->id]) }}">
                    {{ $weekNews[5]->title }}</a>
            </div>
        </div>
    </div>
</div>
<!-- Breaking News End -->