<!-- Top News Slider Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="owl-carousel owl-carousel-2 carousel-item-3 position-relative">
            @foreach($data['trending'] as $news)
            <div class="d-flex">
                <img src="upload/news/{{ $news->image }}" style="width: 100px; height: 100px; object-fit: cover;">
                <div class="d-flex align-items-center bg-light px-3" style="text-overflow:clip ,height: 80px;">
                    <a class="text-secondary font-weight-semi-bold" 
                        href="{{ route('newsdetail',['unsigned_title'=>changeTitle($news->title),'created_at'=>$news->created_at,'id'=>$news->id]) }}">
                        {{ $news->title }}
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Top News Slider End -->
