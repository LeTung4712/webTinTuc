<!-- Popular News Start -->
<div class="pb-3">
    <div class="bg-light py-2 px-4 mb-3">
        <h3 class="m-0">Thịnh hành</h3>
    </div>
    @foreach($data['trending'] as $news)
    <div class="d-flex mb-3">
        <img src="upload/news/{{ $news->image }}" style="width: 100px; height: 100px; object-fit: cover;">
        <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
            <div class="mb-1" style="font-size: 13px;">
                <a href="{{ route('newstype',['unsigned_namecate'=>$news->newsType->category->unsigned_name,'unsigned_name'=>$news->newsType->unsigned_name]) }}">
                    {{ $news->newsType->name }}
                </a>
                <span class="px-1">/</span>
                <span>{{ $news->created_at->toFormattedDateString(); }}</span>
            </div>
            <a class="h6 m-0" href="{{ route('newsdetail',['unsigned_title'=>changeTitle($news->title),'created_at'=>$news->created_at,'id'=>$news->id]) }}">
                {{ $news->title }}
            </a>
        </div>
    </div>
    @endforeach
    
</div>
<!-- Popular News End -->