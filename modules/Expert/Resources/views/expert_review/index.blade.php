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

            <div class="col-md-2">
                <x-select2 name="expert_id" id="" >
                    <option value="">Select Expert</option>
                    @foreach (\Modules\Expert\Entities\Expert::get() as $expert)
                        <option value="{{ $expert->id }}">{{ $expert->full_name.' ('.$expert->code.')' }}</option>
                    @endforeach
                </x-select2>
            </div>

            <div class="col-md-2">
                <x-select2 name="customer_id" id="" >
                    <option value="">--{{ __('Select Customer') }}--</option>
                    @foreach (\Modules\Customer\Entities\Customers::get() as $customer)
                    <option value="{{ $customer->id }}">
                        {{ $customer->name }}
                    </option>
                    @endforeach
                </x-select2>
            </div>

            <div class="col-md-2">
                <input type="text" class="form-control" name="code" placeholder="Conversation Code">
            </div>

            <div class="col-md-2">
                <input type="text" class="form-control my_daterange" name="my_daterange" id="my_daterange" placeholder="Date Range">
            </div>

        </x-filter-layout>

        <div>
            <x-data-table :dataTable="$dataTable" />
        </div>
    </x-card>
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
