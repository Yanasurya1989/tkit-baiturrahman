@php
    use App\Models\NavbarItem;

    $navbarItems = NavbarItem::whereNull('parent_id')->where('is_active', true)->orderBy('order')->get();
@endphp

<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
    {{-- <a href="{{ url('/') }}" class="navbar-brand">
        <h1 class="m-0 text-primary"><i class="fa fa-book-reader me-3"></i>Kider</h1>
    </a> --}}
    @php
        $logoData = \App\Models\Logo::latest()->first();
    @endphp

    <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center">
        @if ($logoData)
            <img src="{{ asset('storage/' . $logoData->path) }}" alt="Logo" style="height: 40px;">
            @if ($logoData->institution_name)
                <span class="ms-2 fw-bold">{{ $logoData->institution_name }}</span>
            @endif
        @else
            <h1 class="m-0 text-primary"><i class="fa fa-book-reader me-3"></i>Kider</h1>
        @endif
    </a>

    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto">
            @foreach ($navbarItems as $item)
                @if ($item->type === 'dropdown' && $item->children->count())
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle"
                            data-bs-toggle="dropdown">{{ $item->title }}</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            @foreach ($item->children as $child)
                                <a href="{{ url($child->url) }}" class="dropdown-item">{{ $child->title }}</a>
                            @endforeach
                        </div>
                    </div>
                @else
                    <a href="{{ url($item->url) }}" class="nav-item nav-link">{{ $item->title }}</a>
                @endif
            @endforeach
        </div>
        <a href="#" class="btn btn-primary rounded-pill px-3 d-none d-lg-block">Join Us<i
                class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>
