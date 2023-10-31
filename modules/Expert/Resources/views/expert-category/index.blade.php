<x-app-layout>
    <x-card>
        <x-slot name='actions'>
            <a href="javascript:void(0);" class="btn btn-success btn-sm" onclick="showCreateModal()"><i
                    class="fa fa-plus-circle"></i>&nbsp;{{ __('Add Expert Category') }}</a>
        </x-slot>

        <div>
            <x-data-table :dataTable="$dataTable" />
        </div>
    </x-card>
    @push('modal')
    <x-modal id="create-modal" :title="__('Add New Expert Category')">

        <form action="javascript:void(0);" class="needs-validation" id="create-creativity-level-form" enctype="multipart/form-data">
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
                <div class="form-group row">
                    <label for="key" class="col-lg-3 col-form-label ps-0 ">
                        {{ __('Icon Image') }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-9 p-0">
                        <input type="file" class="form-control" name="icon_path" required onchange="get_img_url(this, '#icon_path_img');" >
                        <img id="icon_path_img" src="" width="120px" class="mt-1">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="update_key" class="col-lg-3 col-form-label ps-0 ">
                        {{ __('Image') }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-9 p-0">
                        <input type="file" class="form-control" name="image_path"  onchange="get_img_url(this, '#update_image');" >
                        <img id="update_image" src="" width="120px" class="mt-1">
                    </div>
                </div>

                <div class="form-group mb-3 mx-0 pb-3 row">
                    <label for="is_active" class="col-lg-3 col-form-label ps-0 ">
                        {{ __('Status') }}
                        <span class="text-danger">*</span>
                    </label>

                    <div class="col-lg-9 p-0 ">

                       <div class="form-switch form-check mt-2">
                            <input class="form-check-input" type="checkbox" role="switch" name="is_active" id="is_active" value="1">
                        </div>
                    </div>
                </div>

                <fieldset>

                    <legend>Payment Information</legend>
                    
                        <div class=" form-group mb-3 mx-0 pb-3 row">
                            <label for="name" class="col-lg-3 col-form-label ps-0 ">
                                {{ __('Initial Payment') }}
                            </label>
                            <div class="col-lg-9 p-0">
                                <input type="number" class="form-control" name="payment_amount" placeholder="{{ __('Initial Payment') }} "
                                    autocomplete >
                                    <span>In amount</span>
                            </div>
                        </div>
        
                        <div class=" form-group mb-3 mx-0 pb-3 row">
                            <label for="name" class="col-lg-3 col-form-label ps-0 ">
                                {{ __('Payment Rate') }}
                            </label>
                            <div class="col-lg-9 p-0">
                                <input type="number" class="form-control" name="second_pay_amount"  placeholder="{{ __('Second Payment Rate') }} "
                                    autocomplete >
                                    <span>In amount</span>
                                    {{-- <span>In  percentage</span> --}}
                            </div>
                        </div>
        
                        <div class=" form-group mb-3 mx-0 pb-3 row">
                            <label for="name" class="col-lg-3 col-form-label ps-0 ">
                                {{ __('Payment Rating Range') }}
                            </label>
                            <div class="col-lg-9 p-0 ">
                                <select class="form-control " name="rating_range" required>
                                    <option selected disabled>--{{ __('Payment Rating Range') }}--</option>
                                    <option value="5">5-5</option>
                                    <option value="4.5">5-4.5</option>
                                    <option value="4">5-4</option>
                                    <option value="3.5">5-3.5</option>
                                    <option value="3">5-3</option>
                                    <option value="2.5">5-2.5</option>
                                    <option value="2">5-2</option>
                                    <option value="1.5">5-1.5</option>
                                    <option value="1">5-1</option>
                                </select>
                                @error('gender')
                                <p class="text-danger pt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                </fieldset>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <button class="btn btn-success" type="submit" id="create_submit">{{ __('Add') }}</button>
            </div>
        </form>

    </x-modal>



    <x-modal id="edit-modal" :title="__('Update Expert Category')">
        <form action="javascript:void(0);" class="needs-validation" id="update-form" enctype="multipart/form-data">
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

                <div class="form-group row">
                    <label for="update_key" class="col-lg-3 col-form-label ps-0 ">
                        {{ __('Icon Image') }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-9 p-0">
                        <input type="file" class="form-control" name="icon_path"  onchange="get_img_url(this, '#update_icon_path_img');" >
                        <img id="update_icon_path_img" src="" width="120px" class="mt-1">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="update_key" class="col-lg-3 col-form-label ps-0 ">
                        {{ __('Image') }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-9 p-0">
                        <input type="file" class="form-control" name="image_path"  onchange="get_img_url(this, '#update_image');" >
                        <img id="update_image" src="" width="120px" class="mt-1">
                    </div>
                </div>

                <div class="form-group mb-3 mx-0 pb-3 row">
                    <label for="update_is_active" class="col-lg-3 col-form-label ps-0 ">
                        {{ __('Status') }}
                    </label>

                    <div class="col-lg-9 p-0 ">

                       <div class="form-switch form-check mt-2">
                            <input class="form-check-input" id="update_is_active" type="checkbox" role="switch" name="is_active" value="1">
                        </div>
                    </div>
                </div>


                <fieldset>
                    <legend>Payment Information</legend>
                        <div class=" form-group mb-3 mx-0 pb-3 row">
                            <label for="name" class="col-lg-3 col-form-label ps-0 ">
                                {{ __('Initial Payment') }}
                            </label>
                            <div class="col-lg-9 p-0">
                                <input type="number" class="form-control" name="payment_amount" id="payment_amount" placeholder="{{ __('Initial Payment') }} "
                                    autocomplete >
                                    <span>In amount</span>
                            </div>
                        </div>
        
                        <div class=" form-group mb-3 mx-0 pb-3 row">
                            <label for="name" class="col-lg-3 col-form-label ps-0 ">
                                {{ __('Payment Rate') }}
                            </label>
                            <div class="col-lg-9 p-0">
                                <input type="number" class="form-control" name="second_pay_amount" id="second_pay_amount" placeholder="{{ __('Second Payment Rate') }} "
                                    autocomplete >
                                    <span>In amount</span>
                            </div>
                        </div>

                        <div class=" form-group mb-3 mx-0 pb-3 row">
                            <label for="name" class="col-lg-3 col-form-label ps-0 ">
                                {{ __('Payment Rating Range') }}
                            </label>
                            <div class="col-lg-9 p-0 ">
                                <select class="form-control " name="rating_range" id="rating_range" required>
                                    <option selected disabled>--{{ __('Payment Rating Range') }}--</option>
                                    <option value="5">5-5</option>
                                    <option value="4.5">5-4.5</option>
                                    <option value="4">5-4</option>
                                    <option value="3.5">5-3.5</option>
                                    <option value="3">5-3</option>
                                    <option value="2.5">5-2.5</option>
                                    <option value="2">5-2</option>
                                    <option value="1.5">5-1.5</option>
                                    <option value="1">5-1</option>
                                </select>
                                @error('gender')
                                <p class="text-danger pt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
        
                </fieldset>
            </div>

            <div class=" modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <button class="btn btn-success" type="submit" id="create_submit">{{ __('Update') }}</button>
            </div>
        </form>
    </x-modal>

    
    <x-modal id="delete-modal" :title="__('Delete Expert Category')">
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
    @endpush


    <div id="page-axios-data" data-table-id="#expert-table"
        data-create="{{ route(config('theme.rprefix').'.store') }}"
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
    @endpush
</x-app-layout>
