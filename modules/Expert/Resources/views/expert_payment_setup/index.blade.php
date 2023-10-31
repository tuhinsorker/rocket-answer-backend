<x-app-layout>
    <x-card>
        <x-slot name='actions'>
            <a href="javascript:void(0);" class="btn btn-success btn-sm" onclick="showCreateModal()"><i
                    class="fa fa-plus-circle"></i>&nbsp;{{ __('Add New Expert Payment Setup') }}</a>
        </x-slot>

        <div>
            <x-data-table :dataTable="$dataTable" />
        </div>
    </x-card>
    @push('modal')
    <x-modal id="create-modal" :title="__('Add New Expert Payment Setup')">

        <form action="javascript:void(0);" class="needs-validation" id="create-creativity-level-form">
            <div class="modal-body">

                <div class=" form-group mb-3 mx-0 pb-3 row">
                    <label for="expert_category_id" class="col-lg-3 col-form-label ps-0 ">
                        {{ __('Expert') }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-9 p-0">
                        <x-select2 class="form-control" name="expert_id" id="expert_id" required>
                            <option value="">{{ __('Select Expert') }}</option>
                            @foreach (\Modules\Expert\Entities\Expert::get() as $expert)
                            <option value="{{ $expert->id }}">{{ $expert->full_name }}</option>
                            @endforeach
                        </x-select2>
                    </div>
                </div>

                <div class=" form-group mb-3 mx-0 pb-3 row">
                    <label for="name" class="col-lg-3 col-form-label ps-0 ">
                        {{ __('Initial Payment') }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-9 p-0">
                        <input type="number" class="form-control" name="pay_amount"  placeholder="{{ __('Initial Payment') }} "
                            autocomplete required>
                            <span>In amount</span>
                    </div>
                </div>

                <div class=" form-group mb-3 mx-0 pb-3 row">
                    <label for="name" class="col-lg-3 col-form-label ps-0 ">
                        {{ __('Payment Rate') }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-9 p-0">
                        <input type="number" class="form-control" name="second_pay_amount"  placeholder="{{ __('Second Payment Rate') }} "
                            autocomplete required>
                            <span>In amount</span>
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


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <button class="btn btn-success" type="submit" id="create_submit">{{ __('Add') }}</button>
            </div>
        </form>

    </x-modal>


    <x-modal id="edit-modal" :title="__('Update Expert Payment Setup')">
        <form action="javascript:void(0);" class="needs-validation" id="update-form">
            <input type="hidden" name="id" id="update_id">
            <div class="modal-body">

                <input type="hidden" id="id" name="id">

                <div class=" form-group mb-3 mx-0 pb-3 row">
                    <label for="expert_category_id" class="col-lg-3 col-form-label ps-0 ">
                        {{ __('Expert') }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-9 p-0">
                        <x-select2 class="form-control" name="expert_id" id="update_expert_id" required disabled>
                            <option value="">{{ __('Select Expert') }}</option>
                            @foreach (\Modules\Expert\Entities\Expert::get() as $expert)
                            <option value="{{ $expert->id }}">{{ $expert->full_name }}</option>
                            @endforeach
                        </x-select2>
                    </div>
                </div>

                <div class=" form-group mb-3 mx-0 pb-3 row">
                    
                    <label for="name" class="col-lg-3 col-form-label ps-0 ">
                        {{ __('Payment Amount') }}
                        <span class="text-danger">*</span>
                    </label>

                    <div class="col-lg-9 p-0">
                        <input type="number" class="form-control" name="pay_amount" id="update_pay_amount" placeholder="{{ __('Payment Amount') }} "
                            autocomplete required>
                    </div>
                </div>

                <div class=" form-group mb-3 mx-0 pb-3 row">
                    <label for="name" class="col-lg-3 col-form-label ps-0 ">
                        {{ __('Second Payment Amount') }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-9 p-0">
                        <input type="number" class="form-control" name="second_pay_amount" id="second_pay_amount" placeholder="{{ __('Second Payment Amount') }} "
                            autocomplete required>
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


            </div>
            <div class=" modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <button class="btn btn-success" type="submit" id="create_submit">{{ __('Update') }}</button>
            </div>
        </form>
    </x-modal>
    <x-modal id="delete-modal" :title="__('Delete Expert Payment Setup')">
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

    <!--Page Scripts(used by all page)-->
    @endpush
    @push('js')
    <script src="{{ module_asset('js/expert_payment_setup/index.js') }}"></script>

    

    @endpush




</x-app-layout>
