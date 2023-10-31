<x-app-layout>

    <x-card>
        <x-slot name='actions'>
            <a href="javascript:void(0)" class="btn btn-success btn-sm" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                <i class="fas fa-filter"></i>&nbsp; {{ __('Filter') }}
           </a>
            {{-- <a href="javascript:void(0);" class="btn btn-success btn-sm" onclick="showCreateModal()"><i
                    class="fa fa-plus-circle"></i>&nbsp;{{ __('Add Expert') }}</a> --}}
        </x-slot>

        <x-filter-layout>

            <div class="col-md-3">
                <x-select2 name="expert_id" id="" >
                    <option value="">Select Expert</option>
                    @foreach ($experts as $expert)
                        <option value="{{ $expert->id }}">{{ $expert->full_name }}</option>
                    @endforeach
                </x-select2>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control my_daterange" name="my_daterange" id="my_daterange" placeholder="date range">
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="card_number" id="	card_number" placeholder="Card Number">
            </div>

        </x-filter-layout>

        <div>
            <x-data-table :dataTable="$dataTable" />
        </div>
    </x-card>


    <div class="modal fade" id="withdraw-request-modal" data-bs-keyboard="false" tabindex="-1" data-bs-backdrop="static"
    aria-hidden="true">
    </div>


    @push('modal')
    <x-modal id="create-modal" :title="__('')">

        <form action="javascript:void(0);" class="needs-validation" id="create-creativity-level-form">
            <div class="modal-body">
                <div class=" form-group mb-3 mx-0 pb-3 row">
                    <label for="name" class="col-lg-3 col-form-label ps-0 ">
                        {{ __('Display Name') }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-9 p-0">
                        <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('Name') }} "
                            autocomplete required>
                    </div>
                </div>
                <div class=" form-group mb-3 mx-0 pb-3 row">
                    <label for="key" class="col-lg-3 col-form-label ps-0 ">
                        {{ __('Level') }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-9 p-0">
                        <input type="number" class="form-control" name="key" id="key" step="0.01" max="2.0"
                            placeholder="{{ __('Creativity Level') }}" autocomplete required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <button class="btn btn-success" type="submit" id="create_submit">{{ __('Add') }}</button>
            </div>
        </form>

    </x-modal>


    <x-modal id="edit-modal" :title="__('Update Open-ai Creativity Level')">

        <form action="javascript:void(0);" class="needs-validation" id="update-form">
            <input type="hidden" name="id" id="update_id">
            <div class="modal-body">

                <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                    <label for="update_name" class="col-lg-3 col-form-label ps-0 label_name">
                        {{ __('Name') }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-9 p-0">
                        <input type="text" class="form-control" name="name" id="update_name"
                            placeholder="{{ __('Name') }}" autocomplete required>
                    </div>
                </div>
                <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                    <label for="update_key" class="col-lg-3 col-form-label ps-0 ">
                        {{ __('Level') }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-9 p-0">
                        <input type="number" class="form-control" name="key" id="update_key" step="0.01" max="2.0"
                            placeholder="{{ __('Creativity Level') }}" autocomplete required>
                    </div>
                </div>
            </div>
            <div class=" modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <button class="btn btn-success" type="submit" id="create_submit">{{ __('Update') }}</button>
            </div>
        </form>
    </x-modal>


    <x-modal id="delete-modal" :title="__('Delete Open-ai Creativity Level')">
        <form action="javascript:void(0);" class="needs-validation" id="delete-modal-form">
            <input type="hidden" name="id" id="update_delete_id">
            <div class="modal-body">
                <p>{{ __('You won\'t be able to revert this!') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <button class="btn btn-primary" type="submit" id="create_submit">{{ __('Delete') }}</button>
            </div>
        </form>
    </x-modal>




    <x-modal id="reason-modal" :title="__('Rejection Reason')">
        {{-- <form action="{{route('expert-withdraw-request.status-update')}}" method="POST" enctype="multipart/form-data" class="ajaxForm needs-validation" id="ajaxForm" novalidate="" data="showCallBackData" accept-charset="UTF-8"> --}}

        <form action="javascript:void(0);" class="needs-validation" id="reject-reason">
            <div class="modal-body">
                <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                    <input type="hidden" value="" name="id" id="status-id">
                    <input type="hidden" value="2" name="status">
                    <label for="update_key" class="col-lg-3 col-form-label ps-0 ">
                        {{ __('Rejection reason') }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-9 p-0">
                        <textarea name="reject_note" id="r-reason" class="form-control"  rows="3"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>


        </form>
    </x-modal>

    @endpush


    <div id="page-axios-data" data-table-id="#expert-table"
        data-create="{{ route(config('theme.rprefix').'.store') }}"
        data-update-status="{{ route(config('theme.rprefix').'.status-update') }}"
        data-edit="{{ route(config('theme.rprefix').'.edit') }}"
        data-update="{{ route(config('theme.rprefix').'.update') }}"></div>

    @push('lib-styles')
    <link href="{{ admin_asset('vendor/select2/dist/css/select2.css') }}" rel="stylesheet" type="text/css" />
    @endpush
    @push('lib-scripts')
    <script src="{{ admin_asset('vendor/select2/dist/js/select2.js') }}"></script>
    @endpush
    @push('js')

    <script src="{{ module_asset('js/expert/index.js') }}"></script>
    <script>





            function status_update(url, e) {

                let status = $(e).data('status');

                let txt = $(e).parent().siblings(".dropdown-toggle").text();
                // console.log('txt',txt.trim());
                if(txt.trim() == 'Rejected'){
                    console.log('Already Rejected');
                    toastr.error('Already Rejected', "Error");
                    return false;
                }

                if(txt.trim() == 'Approved'){
                    console.log('Already Approved');
                    toastr.error('Already Approved', "Error");
                    return false;
                }

                if(status == 2){
                    $('#status-id').val($(e).data('id'));
                    $('#reason-modal').modal('show');
                }else{


                axios
                    .post(url, {
                        status: status,
                        id: $(e).data('id')
                    })
                    .then(({data:t}) => {

                        console.log(t.data.is_approve);

                        

                       
                        if(t.data.is_approve == 1){
                            let btn = $("#status_button_"+t.data.id);
                            console.log('Approved btn',btn);
                            btn.removeClass()

                            btn.addClass('btn btn-success');
                            btn.text('Approved');
                            toastr.success(t.data.message, "Success");
                        }


                        else if(t.data.is_approve == 2){
                            let btn = $("#status_button_"+t.data.id);
                            console.log('reject btn',btn);
                            btn.removeClass()

                            btn.addClass('btn btn-danger');
                            btn.text('Rejected');
                            toastr.success(t.data.message, "Success");
                        }


                        else{
                            let btn = $("#status_button_"+t.data.id);
                            console.log('Pending btn',btn);
                            btn.removeClass()

                            btn.addClass('btn btn-warning');
                            btn.text('Pending');
                            toastr.success("Customer Status Successfully Updated.");
                        }
                    })
                    .catch((err) => {
                        // $("#status_id_" + s).val(a);
                        // if (err.response.data.message) {
                        //     toastr.error(err.response.data.message, "Error");
                        // } else {
                        //     toastr.error("Failed to Update User Status");
                        // }
                    });

                }
            }

        </script>
    @endpush
</x-app-layout>
