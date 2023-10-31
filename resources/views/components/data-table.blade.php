@props([
    'footer_callback' => false,
    'dataTable'       => []
])

<div class="table-responsive">
    {{$dataTable->table([], $footer_callback)}}
</div>

@push('lib-styles')
<link rel="stylesheet" href="{{ nanopkg_asset('vendor/yajra-laravel-datatables/assets/datatables.css') }}">
@endpush
@push('css')
<link rel="stylesheet" href="{{ nanopkg_asset('css/data-table.min.css') }}">
<style>

</style>
@endpush
@push('lib-scripts')
<script src="{{ nanopkg_asset('vendor/yajra-laravel-datatables/assets/datatables.js') }}"></script>
@endpush

@push('js')
{{$dataTable->scripts()}}
@endpush
