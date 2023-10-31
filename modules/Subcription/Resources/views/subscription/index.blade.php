<x-app-layout>

    <x-card>

        <x-slot name='actions'>
            <a href="javascript:void(0)" class="btn btn-success btn-sm" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                 <i class="fas fa-filter"></i>&nbsp; {{ __('Filter') }}
            </a>
        </x-slot>

        <x-filter-layout>

            <div class="col-md-3">
                <x-select2 name="customer_id" id="" >
                    <option value="">--{{ __('Select Customer') }}--</option>
                    @foreach (\Modules\Customer\Entities\Customers::get() as $customer)
                    <option value="{{ $customer->id }}">
                        {{ $customer->name }}
                    </option>
                    @endforeach
                </x-select2>
            </div>

            {{-- <div class="col-md-3">
                <input type="text" class="form-control" name="invoice_id" id="invoice_id" placeholder="Invoice No">
            </div> --}}

            <div class="col-md-3">
                <input type="text" class="my_daterange form-control" placeholder="Date Range" name="my_daterange" id="my_daterange" >
            </div>

        </x-filter-layout>

        <x-data-table :dataTable="$dataTable"/>
    </x-card>

</x-app-layout>
