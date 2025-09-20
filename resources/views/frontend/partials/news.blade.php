<section id="news" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Berita Terbaru</h2>
        <div class="row">
            @php
                $berita = \App\Models\News::latest()->take(3)->get();
            @endphp

            @forelse($berita as $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow">
                        @if ($item->image)
                            <div class="aspect-ratio-16x9">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">{{ Str::limit(strip_tags($item->content), 100, '...') }}</p>
                            <a href="{{ route('backend.admin.news.show', $item->id) }}"
                                class="btn btn-primary btn-sm">Baca Selengkapnya</a>
                        </div>
                        <div class="card-footer text-muted">
                            {{ $item->created_at->translatedFormat('d M Y') }}
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Belum ada berita terbaru.</p>
            @endforelse
        </div>
    </div>
</section>

<style>
    .aspect-ratio-16x9 {
        position: relative;
        width: 100%;
        padding-top: 56.25%;
        /* 16:9 aspect ratio */
        overflow: hidden;
        border-top-left-radius: .25rem;
        border-top-right-radius: .25rem;
    }

    .aspect-ratio-16x9 img {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        object-fit: cover;
        object-position: center;
    }
</style>
