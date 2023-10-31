<x-app-layout>
    <x-card>
        <x-slot name='actions'>
            <a href="javascript:void(0);" class="btn btn-success btn-sm" onclick="showCreateModal()"><i
                    class="fa fa-plus-circle"></i>&nbsp;{{ __('Add Doc Type') }}</a>
        </x-slot>

        <div>
            <x-data-table :dataTable="$dataTable" />
        </div>
    </x-card>
    @push('modal')
    <x-modal id="create-modal" :title="__('Add New Document Type')">

        <form action="javascript:void(0);" class="needs-validation" id="create-creativity-level-form">
            <div class="modal-body">
                <div class=" form-group mb-3 mx-0 pb-3 row">
                    <label for="name" class="col-lg-3 col-form-label ps-0 ">
                        {{ __('Name') }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-9 p-0">
                        <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('Name') }} "
                            autocomplete required>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <button class="btn btn-success" type="submit" id="create_submit">{{ __('Add') }}</button>
            </div>
        </form>

    </x-modal>
    <x-modal id="edit-modal" :title="__('Update Document Type')">
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
                <div class="form-group mb-3 mx-0 pb-3 row">
                    <label for="is_active" class="col-lg-3 col-form-label ps-0 ">
                        {{ __('Status') }}
                        <span class="text-danger">*</span>
                    </label>

                    <div class="col-lg-9 p-0 ">

                       <div class="form-switch form-check mt-2">
                            <input class="form-check-input" type="checkbox" role="switch" name="is_active" id="update_is_active" value="1">
                        </div>
                    </div>
                </div>
            </div>
            <div class=" modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <button class="btn btn-success" type="submit" id="create_submit">{{ __('Update') }}</button>
            </div>
        </form>
    </x-modal>
    <x-modal id="delete-modal" :title="__('Delete Document Type')">
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
    <script src="{{ module_asset('js/doc_type/index.js') }}"></script>
    @endpush
</x-app-layout>
