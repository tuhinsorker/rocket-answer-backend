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
                <option value="">--{{ __('Select Expert') }}--</option>
                @foreach (Modules\Expert\Entities\Expert::get() as $customer)
                    <option value="{{ $customer->user_id }}">
                        {{ $customer->full_name }}
                    </option>
                    @endforeach
                </x-select2>
            </div>

            <div class="col-md-2">
                <x-select2 name="expert_category_id" id="" >
                <option value="">--{{ __('Select Expert Category') }}--</option>
                @foreach (Modules\Expert\Entities\ExpertCategory::get() as $customer)
                    <option value="{{ $customer->id }}">
                        {{ $customer->name }}
                    </option>
                    @endforeach
                </x-select2>
            </div>


            <div class="col-md-2">
                <x-select2 name="customer_id" id="" >
                    <option value="">--{{ __('Select Customer') }}--</option>
                    @foreach ($customers as $customer)
                    <option value="{{ $customer->user_id }}">
                        {{ $customer->name }}
                    </option>
                    @endforeach
                </x-select2>
            </div>

            <div class="col-md-2">
                <input type="text" class="my_daterange form-control" placeholder="Date Range" name="my_daterange" id="my_daterange" >
            </div>


        </x-filter-layout>

        <div>
            <x-data-table :dataTable="$dataTable" />
        </div>
    </x-card>

    <x-modal id="show-rating-modal" :title="__('Give Rating')">
        <form action="{{ route('admin.customer.rating-added-by-admin') }}" class="needs-validation"  id="ajaxForm" novalidate="" data="showCallBackDataExpert">
            @csrf
            <input type="hidden" name="conversation_id" id="conversation_id">
            <div class="modal-body">

                <div class="cust_border form-group mb-3 mx-0 pb-3 row">
                    <label  class="col-lg-3 col-form-label ps-0 label_name">
                        {{ __('Rating') }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-9 p-0">
                        <x-select2 name="rating" id="" >
                            {{-- 1 to 5 with half options --}}
                            <option value="1">1</option>
                            <option value="1.5">1.5</option>
                            <option value="2">2</option>
                            <option value="2.5">2.5</option>
                            <option value="3">3</option>
                            <option value="3.5">3.5</option>
                            <option value="4">4</option>
                            <option value="4.5">4.5</option>
                            <option value="5">5</option>


                        </x-select2>
                    </div>
                </div>

            </div>
            <div class=" modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <button class="btn btn-success" type="submit" id="create_submit">{{ __('Submit') }}</button>
            </div>
        </form>
    </x-modal>




@push('js')

    <script>




        var showCallBackDataExpert = function() {
            $('#id').val('');
            $('#ajaxForm')[0].reset();
            $('#show-rating-modal').modal('hide');
            location.reload();
            // $("#customer-conversation").load(" #customer-conversation > *");
        }


        function showRatingModal(conversaton_id){
            console.log('conversations ',conversaton_id);
            $('#show-rating-modal #conversation_id').val(conversaton_id);
            $('#show-rating-modal').modal('show');
        }

        $(document).ready(function(){
            $('#rating-added-by-admin-form').submit(function(form){
                console.log('form submission',form);
            });
        });



    </script>

@endpush

</x-app-layout>
