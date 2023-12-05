<!--  News same category Start -->
<div class="pb-3">
    <div class="bg-light py-2 px-4 mb-3">
        <h4 class="m-0">TIN CÙNG CHUYÊN MỤC</h4>
    </div>
    @foreach($newssametype as $news)
    <div class="d-flex mb-3">
        <img src="upload/news/{{ $news->image }}" style="width: 100px; height: 100px; object-fit: cover;">
        <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
            <div class="mb-1" style="font-size: 13px;">
                <a href="">{{ $news->newsType->name }}</a>
                <span class="px-1">/</span>
                <span>{{ $news->created_at->toFormattedDateString(); }}</span>
            </div>
            <a class="h6 m-0" href="page/{{ $news->id }}/{{ $news->title }}">{{ $news->title }}</a>
        </div>
    </div>
    @endforeach
    
</div>
<!--  News End -->