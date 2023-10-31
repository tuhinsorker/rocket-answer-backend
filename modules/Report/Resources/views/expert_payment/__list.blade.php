
<x-app-layout>
    <x-card>
        <x-slot name='actions'>
            {{-- <a href="javascript:void(0)" class="btn btn-success btn-sm addShowModal" ><i class="fa fa-plus-circle"></i> Add New </a> --}}
            {{-- @include('cms::testimonials.__testimonial') --}}
        </x-slot>

        
                        
        <div class="card-body">
            <div class="table-responsive">
                <table id="" class="table display table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th >Sl.</th>
                            <th >{{__('Name')}}</th>
                            <th >{{__('Designation')}}</th>
                            <th >{{__('Head Title')}}</th>
                            <th >{{__('Description')}}</th>
                            <th width="100">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>


    </x-card>


    

@push('lib-scripts')

{{-- <script src="{{ admin_asset('js/ajax_form_submission.js') }}"></script> --}}

@endpush

</x-app-layout>






