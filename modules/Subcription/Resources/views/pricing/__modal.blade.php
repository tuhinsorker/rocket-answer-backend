    
    <div class="modal fade  mymodal" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
        <div class="modal-dialog modal-md">

            <form action="{{route('pricing.store')}}" method="POST" enctype="multipart/form-data" class="ajaxForm needs-validation" id="ajaxForm" novalidate="" data="showCallBackData" accept-charset="UTF-8">
      
                @csrf
                <input type="hidden" name="_method" value="" id="acmethods">

                <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="row">

                            <div class="col-md-12">
                                <label for="name" class="col-form-label fw-bold justify-content-start d-flex">Category <i class="text-danger">*</i></label>
                                <x-select2 name="category_id" id="category_id" class="form-control">
                                    <option selected disabled value="">--{{ __('Select Category') }}--</option>
                                    @foreach ($categories as $val)
                                    <option value="{{ $val->id }}">
                                        {{ $val->name }}
                                    </option>
                                    @endforeach
                                </x-select2>
                            </div>


                            <div class="col-md-12">
                                <label for="trial_price" class="col-form-label fw-bold justify-content-start d-flex">Trial Price<i class="text-danger">*</i></label>
                                <input type="number"  name="trial_price" id="trial_price" class="form-control" placeholder="Trial Price"  required>
                            </div>

                            <div class="col-md-12">
                                <label for="trial_day" class="col-form-label fw-bold justify-content-start d-flex">Trial day<i class="text-danger">*</i></label>
                                <input type="number"  name="trial_day" id="trial_day" class="form-control" placeholder="Trial Day"  required>
                            </div>


                            <div class="col-md-12">
                                <label for="recurring_price" class="col-form-label fw-bold justify-content-start d-flex">Recurring Price<i class="text-danger">*</i></label>
                                <input type="number"  name="recurring_price" id="recurring_price" class="form-control" placeholder="Recarring Price"  required>
                            </div>

                            <div class="col-md-12">
                                <label for="day" class="col-form-label fw-bold justify-content-start d-flex">Recurring Day<i class="text-danger">*</i></label>
                                <input type="number"  name="recurring_day" id="recurring_day" class="form-control" placeholder="Recurring Day"  required>
                            </div>

                            <div class="col-md-12">
                                <label for="description" class="col-form-label fw-bold justify-content-start d-flex">Description<i class="text-danger">*</i></label>
                                <textarea class="form-control" rows="5" name="description" id="description"></textarea>
                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success modal_action actionBtn"></button>
                    </div>

                </div>

            </form>
        </div>
    </div>

