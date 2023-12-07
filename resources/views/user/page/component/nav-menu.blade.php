<!-- Navbar Start -->
<div class="container-fluid p-0 mb-3">
    <nav class="navbar navbar-expand-lg bg-light navbar-light py-2 py-lg-0 px-lg-5">
        <a href="" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <a href="{{ route('home') }}" class="nav-item nav-link active">Trang chủ</a>
                
                @foreach($data['category'] as $category)
                        <div class="nav-item dropdown">
                            <a href="{{ route('category',['unsigned_name'=>$category->unsigned_name]) }}" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                {{ $category->name }}
                            </a>
                            @if($category->newsType->count() > 0)
                            <div class="dropdown-menu rounded-0 m-0">
                                @foreach($category->newsType as $newstype)
                                <a href="{{ route('newstype',['unsigned_namecate'=>$category->unsigned_name,'unsigned_name'=>$newstype->unsigned_name]) }}" class="dropdown-item">
                                    {{ $newstype->name }}
                                </a>
                                @endforeach
                            </div>
                            @endif
                        </div>
                @endforeach

                <a href="contact.html" class="nav-item nav-link">LIÊN HỆ</a>
            </div>
            <!-- Search Start -->
            @include('user.page.component.search-box')
            <!-- Search End -->
        </div>
    </nav>
</div>
<!-- Navbar End -->