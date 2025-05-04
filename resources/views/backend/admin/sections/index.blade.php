@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h3>Pengaturan Urutan & Status Section</h3>
        {{-- <ul id="sortable" class="list-group"> --}}
        <ul id="sortable" class="list-group">

            @foreach ($sections as $section)
                {{-- <li class="list-group-item d-flex justify-content-between align-items-center" data-id="{{ $section->id }}"> --}}
                <li class="list-group-item d-flex justify-content-between align-items-center" style="cursor: move;"
                    data-id="{{ $section->id }}">

                    <span>{{ ucfirst($section->section_name) }}</span>
                    <div>
                        <input type="checkbox" class="toggle-active" data-id="{{ $section->id }}"
                            {{ $section->is_active ? 'checked' : '' }}>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script>
        $('#sortable').sortable({
            update: function() {
                var order = $(this).children().map(function() {
                    return $(this).data('id');
                }).get();

                console.log("New Order: ", order);

                $.post("{{ route('sections.updateOrder') }}", {
                    _token: "{{ csrf_token() }}",
                    order: order
                }).done(function(response) {
                    console.log('Order updated successfully', response);
                    toastr.success('Urutan section berhasil diperbarui!');
                }).fail(function(err) {
                    console.error('Failed to update order', err);
                    toastr.error('Gagal memperbarui urutan section.');
                });
            }
        });

        $('.toggle-active').on('change', function() {
            var id = $(this).data('id');
            $.post("/admin/sections/toggle/" + id, {
                _token: "{{ csrf_token() }}"
            }).done(function() {
                toastr.success('Status section berhasil diperbarui!');
            }).fail(function() {
                toastr.error('Gagal memperbarui status section.');
            });
        });
    </script>
@endpush
