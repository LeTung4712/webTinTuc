<!-- Main News Slider Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">
                    @foreach($latestNews as $news)
                    <div class="position-relative overflow-hidden" style="height: 435px;">
                        <img class="img-fluid h-100" src="upload/news/{{ $news->image }}" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-1">
                                <a class="text-white" href="{{ route('newstype',['unsigned_namecate'=>$news->newsType->category->unsigned_name,'unsigned_name'=>$news->newsType->unsigned_name]) }}">
                                    {{ $news->newsType->name }}</a>
                                <span class="px-2 text-white">/</span>
                                <a class="text-white" href="">{{ $news->created_at->toFormattedDateString(); }}</a>
                            </div>
                            <a class="h2 m-0 text-white font-weight-bold" href="{{ route('newsdetail',['unsigned_title'=>changeTitle($news->title),'created_at'=>$news->created_at,'id'=>$news->id]) }}">
                                {{ $news->title }}</a>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            <!--Slide bar category-->
            @include('user.page.component.slide-cate')
            <!--Slide bar category-->
        </div>
    </div>
</div>
<!-- Main News Slider End -->