<x-app-layout>

    <x-card>

        <x-slot name='actions'>
            <h2 class="accordion-header d-flex justify-content-end" id="flush-headingOne">
                <button type="button" class="btn btn-success" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne"> <i class="fas fa-filter"></i> Filter</button>
                &nbsp;
            </h2>
        </x-slot>

        <x-filter-layout>

            <div class="col-md-3">
                <x-select2 name="customer_id" id="" >
                    <option selected disabled>--{{ __('Select Customer') }}--</option>
                    @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">
                        {{ $customer->name }}
                    </option>
                    @endforeach
                </x-select2>
            </div>

            <div class="col-md-3">
                <input type="text" class="my_daterange form-control" placeholder="Date Range" name="my_daterange" id="my_daterange" >
            </div>
    
        </x-filter-layout>

        <div>
            <x-data-table :dataTable="$dataTable" />
        </div>
    </x-card>

</x-app-layout>

