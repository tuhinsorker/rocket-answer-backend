<x-app-layout>




    <x-card>
        <x-slot name='actions'>
            <a href="javascript:void(0)" class="btn btn-success btn-sm" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                 <i class="fas fa-filter"></i>&nbsp; {{ __('Filter') }}
            </a>
            <a href="javascript:void(0);" class="btn btn-success btn-sm" onclick="showCreateModal()"><i
                class="fa fa-plus-circle"></i>&nbsp;{{ __('Add Payment Transaction') }}</a>

            @include('partials.import_file',['cls'=>'ImportPaymentTransaction','demo_file'=>'payment-bulk.xlsx','title' => __('Import Payment Transaction')])
        </x-slot>

        <x-filter-layout>

            <div class="col-md-3">
                <x-select2 name="expert_id" id="" >
                    <option value="">Select Expert</option>
                    @foreach ($experts as $expert)
                        <option value="{{ $expert->user_id }}">{{ $expert->full_name }}</option>
                    @endforeach
                </x-select2>
            </div>
            <div class="col-md-3">
                <x-select2 name="transaction_type">
                    <option selected disabled value="">--{{ __('Select Transaction Type') }}--</option>
                    <option value="1">In</option>
                    <option value="2">Out</option>
                </x-select2>

            </div>

            <div class="col-md-3">
                <input type="text" class="form-control" name="my_daterange" id="my_daterange" placeholder="Date Range">
            </div>

        </x-filter-layout>

        <x-data-table :dataTable="$dataTable"/>


    </x-card>




    @push('modal')
    <x-modal id="create-modal" :title="__('Add Payment Transaction')">

        <form action="javascript:void(0);" class="needs-validation" id="create-creativity-level-form">
            <div class="modal-body">

                <div class=" form-group mb-3 mx-0 pb-3 row">
                    <label for="expert_id" class="col-lg-3 col-form-label ps-0 ">
                        {{ __('Expert') }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-9 p-0">
                        <x-select2 class="form-control" name="expert_id" id="expert_id" required>
                            <option value="">{{ __('Select Expert') }}</option>
                            @foreach ($experts as $expert)
                            <option value="{{ $expert->user_id }}">{{ $expert->full_name }}</option>
                            @endforeach
                        </x-select2>
                    </div>
                </div>


                <div class=" form-group mb-3 mx-0 pb-3 row">
                    <label for="name" class="col-lg-3 col-form-label ps-0 ">
                        {{ __('Amount') }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-9 p-0">
                        <input type="text" class="form-control" name="amount" id="amount" placeholder="{{ __('Amount') }} "
                            autocomplete required>
                    </div>
                </div>

                <div class=" form-group mb-3 mx-0 pb-3 row">
                    <label for="name" class="col-lg-3 col-form-label ps-0 ">
                        {{ __('Transaction Date') }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-9 p-0">
                        <input type="date" class="form-control" name="payment_date" id="payment_date" placeholder="{{ __('Payment Date') }} "
                            autocomplete required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="key" class="col-lg-3 col-form-label ps-0 ">
                        {{ __('Attachment') }}
                    </label>
                    <div class="col-lg-9 p-0">
                        <input type="file" class="form-control" name="attachment" required onchange="get_img_url(this, '#icon_path_img');" >
                        <img id="icon_path_img" src="" width="120px" class="mt-1">
                    </div>
                </div>



                <div class=" form-group mb-3 mx-0 pb-3 row">
                    <label for="payment_method_id" class="col-lg-3 col-form-label ps-0 ">
                        {{ __('Transaction Method') }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-9 p-0">
                        <x-select2 class="form-control" name="payment_method_id" id="payment_method_id" required>
                            @foreach ($payment_methods as $item)
                                <option value="{{ $item->id }}">{{$item->name}}</option>
                            @endforeach
                        </x-select2>
                    </div>
                </div>


                <div class=" form-group mb-3 mx-0 pb-3 row">
                    <label for="name" class="col-lg-3 col-form-label ps-0 ">
                        {{ __('Transaction Email') }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-9 p-0">
                        <input type="email" class="form-control" name="email" id="email" placeholder="{{ __('PayPal email') }} "
                            autocomplete="off" required>
                    </div>
                </div>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <button class="btn btn-success" type="submit" id="create_submit">{{ __('Add') }}</button>
            </div>
        </form>

    </x-modal>


    <x-modal id="edit-modal" :title="__('Update Payment Transaction')">
        <form action="javascript:void(0);" class="needs-validation" id="update-form">
            <input type="hidden" name="id" id="update_id">
            <div class="modal-body">
                <input type="hidden" id="update_id">
                <div class=" form-group mb-3 mx-0 pb-3 row">
                    <label for="expert_id" class="col-lg-3 col-form-label ps-0 ">
                        {{ __('Expert') }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-9 p-0">
                        <x-select2 class="form-control" name="expert_id" id="update_expert_id" required>
                            <option value="">{{ __('Select Expert') }}</option>
                            @foreach ($experts as $expert)
                            <option value="{{ $expert->user_id }}">{{ $expert->full_name }}</option>
                            @endforeach
                        </x-select2>
                    </div>
                </div>


                <div class=" form-group mb-3 mx-0 pb-3 row">
                    <label for="name" class="col-lg-3 col-form-label ps-0 ">
                        {{ __('Amount') }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-9 p-0">
                        <input type="text" class="form-control" name="amount" id="update_amount" placeholder="{{ __('Amount') }} "
                            autocomplete required>
                    </div>
                </div>

                <div class=" form-group mb-3 mx-0 pb-3 row">
                    <label for="name" class="col-lg-3 col-form-label ps-0 ">
                        {{ __('Transaction Date') }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-9 p-0">
                        <input type="date" class="form-control" name="payment_date" id="update_payment_date" placeholder="{{ __('Payment Date') }} "
                            autocomplete required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="key" class="col-lg-3 col-form-label ps-0 ">
                        {{ __('Attachment') }}
                    </label>
                    <div class="col-lg-9 p-0">
                        <input type="file" class="form-control" name="attachment" onchange="get_img_url(this, '#icon_path_img');" >
                        <img id="update_icon_path_img" src="" width="120px" class="mt-1">
                    </div>
                </div>



                <div class=" form-group mb-3 mx-0 pb-3 row">
                    <label for="payment_method_id" class="col-lg-3 col-form-label ps-0 ">
                        {{ __('Transaction Method') }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-9 p-0">
                        <x-select2 class="form-control" name="payment_method_id" id="update_payment_method_id" required>
                             @foreach ($payment_methods as $item)
                                <option value="{{ $item->id }}">{{$item->name}}</option>
                            @endforeach
                        </x-select2>
                    </div>
                </div>

                <div class=" form-group mb-3 mx-0 pb-3 row">
                    <label for="name" class="col-lg-3 col-form-label ps-0 ">
                        {{ __('Transaction Email') }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-9 p-0">
                        <input type="email" class="form-control" name="email" id="email" placeholder="{{ __('PayPal email') }} "
                            autocomplete="off" required>
                    </div>
                </div>


            </div>

            <div class=" modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <button class="btn btn-success" type="submit" id="create_submit">{{ __('Update') }}</button>
            </div>
        </form>
    </x-modal>


    <x-modal id="delete-modal" :title="__('Delete Payment Transaction')">
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


        <div class="modal fade" id="withdraw-request-modal" data-bs-keyboard="false" tabindex="-1" data-bs-backdrop="static"
        aria-hidden="true">
        </div>


    @endpush


    <div id="page-axios-data" data-table-id="#expert-table"
        data-create="{{ route(config('theme.rprefix').'.create-payment-transaction') }}"
        data-edit="{{ route(config('theme.rprefix').'.edit') }}"
        data-update="{{ route(config('theme.rprefix').'.update') }}"></div>

    @push('lib-styles')
    <link href="{{ admin_asset('vendor/select2/dist/css/select2.css') }}" rel="stylesheet" type="text/css" />
    @endpush

    @push('lib-scripts')
    <script src="{{ admin_asset('vendor/select2/dist/js/select2.js') }}"></script>
    @endpush

    @push('js')
    <script src="{{ module_asset('js/payment_transaction/index.js') }}"></script>


    <script>



            function status_update(url, e) {

                axios
                    .post(url, {
                        status: $(e).data('status'),
                        id: $(e).data('id')
                    })
                    .then(({data:t}) => {
                        console.log(t.data);

                        if(t.data.is_approve == 1){
                            let btn = $("#status_button_"+t.data.id);
                            console.log('Approved btn',btn);
                            btn.removeClass()

                            btn.addClass('btn btn-success');
                            btn.text('Approved');
                            toastr.success(t.data.message, "Success");
                        }

                        else{
                            let btn = $("#status_button_"+t.data.id);
                            console.log('Pending btn',btn);
                            btn.removeClass()

                            btn.addClass('btn btn-danger');
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

        </script>
    @endpush
</x-app-layout>
