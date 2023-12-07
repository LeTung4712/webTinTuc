<!-- category -->
<div class="col-lg-4">
    <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
        <h3 class="m-0">DANH MỤC</h3>
        <a class="text-secondary font-weight-medium text-decoration-none" href="{{ route('home') }}">View All</a>
    </div>
    @foreach($data['category'] as $category)
    <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
        <img class="img-fluid w-100 h-100" src="upload/category/{{ $category->image }}" style="object-fit: cover;">
        <a href="{{ route('category',['unsigned_name'=>$category->unsigned_name]) }}" class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
            {{ $category->name }}
        </a>
    </div>
    @endforeach
</div>
<!-- category -->