<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partials.head')
</head>

<body>
    <div class="container-xxl bg-white p-0">

        @include('frontend.partials.spiner')
        @include('frontend.partials.navbar')

        {{-- Section dinamis dari database --}}
        @php
            $sections = \App\Models\SectionSetting::where('is_active', true)->orderBy('order')->pluck('section_name');
        @endphp

        @foreach ($sections as $section)
            @includeIf('frontend.partials.' . $section)
        @endforeach

        @include('frontend.partials.footer')

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top">
            <i class="bi bi-arrow-up"></i>
        </a>
    </div>

    @include('frontend.partials.scripts')
</body>

</html>
