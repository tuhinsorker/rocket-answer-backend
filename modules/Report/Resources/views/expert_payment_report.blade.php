<x-app-layout>

    <x-card>

        <x-slot name='actions'>
            <h2 class="accordion-header d-flex justify-content-end" id="flush-headingOne">
                <button type="button" class="btn btn-success" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne"> <i class="fas fa-filter"></i> Filter</button>
                &nbsp;
            </h2>
        </x-slot>

        <x-filter-layout>


            <div class="col-md-2">
                <x-select2 name="expert_id" >
                <option value="">--{{ __('Select Customer') }}--</option>
                @foreach (Modules\Expert\Entities\Expert::get() as $customer)
                    <option value="{{ $customer->user_id }}">
                        {{ $customer->full_name }}
                    </option>
                    @endforeach
                </x-select2>
            </div>

            {{-- <div class="col-md-2">
                <x-select2 name="status" id="" >
                <option value="">--{{ __('Recurring Status') }}--</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </x-select2>
            </div> --}}


            <div class="col-md-2">
                <input type="text" class="my_daterange form-control" placeholder="Date Range" name="my_daterange" id="my_daterange" >
            </div>


        </x-filter-layout>

        <div>
            <x-data-table :dataTable="$dataTable" />
        </div>
    </x-card>



</x-app-layout>

