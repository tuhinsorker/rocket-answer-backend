<x-app-layout>

    <x-card>

        {{-- <x-slot name='actions'>
            <h2 class="accordion-header d-flex justify-content-end" id="flush-headingOne">
                <button type="button" class="btn btn-success" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne"> <i class="fas fa-filter"></i> Filter</button>
                &nbsp;
            </h2>
        </x-slot> --}}

        <x-filter-layout show="true">


            <div class="col-md-2">
                <x-select2 name="customer_id" >
                <option value="">--{{ __('Select Customer') }}--</option>
                @foreach (Modules\Customer\Entities\Customers::get() as $customer)
                    <option value="{{ $customer->id }}">
                        {{ $customer->name }}
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

        <div class="table-div d-none">
            <x-data-table footer_callback="true" :dataTable="$dataTable" />
        </div>
    </x-card>


    @push('js')

    <script>
        let title = "{{ config('theme.title') }}";

        $('.search-btn').click(function(){

            if($('.accordion-item select[name="customer_id"]').find("option:selected").val()){

                let data = $('.accordion-item select[name="customer_id"]').find("option:selected").text().trim();
                $(' .card-header').find("h6").text(`${title} ( ${data})`);
                $('.table-div').removeClass('d-none');
                $('.table').css('width', '100%');
            }else{
                $(' .card-header').find("h6").text(`${title}`);
                $('.accordion-item select[name="customer_id"]').find('select').val('').trigger('change');
            }

        });

        $('.reset-btn').click(function(){
            // let data = $('.accordion-item select[name="customer_id"]').find("option:selected").text().trim();
            $(' .card-header').find("h6").text(`${title}`);
            setTimeout(() => {
                $('#flush-collapseOne').collapse('show');
                $('.table-div').addClass('d-none');
            }, 1000);

        });
    </script>

    @endpush


</x-app-layout>

