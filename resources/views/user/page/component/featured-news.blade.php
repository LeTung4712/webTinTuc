<!-- Featured News Slider Start -->
<div class="container-fluid py-3" style="background-color:#222;">
    <div class="container">
        <div  class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3" >
            <h3 class="m-0" >ĐỪNG BỎ LỠ</h3>
        </div>
        <div class="owl-carousel owl-carousel-2 carousel-item-4 position-relative">
            @foreach($featuredNews as $news)
            <div class="position-relative overflow-hidden" style="height: 300px;">
                <img class="img-fluid w-100 h-100" src="upload/news/{{ $news->image }}" style="object-fit: cover;">
                <div class="overlay">
                    <div class="mb-1" style="font-size: 13px;">
                        <a class="text-white" href="{{ route('newstype',['unsigned_namecate'=>$news->newsType->category->unsigned_name,'unsigned_name'=>$news->newsType->unsigned_name]) }}">
                            {{ $news->newsType->name }}</a>
                        <span class="px-1 text-white">/</span>
                        <a class="text-white" >{{ $news->created_at->toFormattedDateString(); }}</a>
                    </div>
                    <a class="h4 m-0 text-white" href="{{ route('newsdetail',['unsigned_title'=>changeTitle($news->title),'created_at'=>$news->created_at,'id'=>$news->id]) }}">
                        <!-- chỉ lấy 10 từ đầu tiên của title -->
                        {{ substr($news->title,0,55) }}...
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</div>
<!-- Featured News Slider End -->