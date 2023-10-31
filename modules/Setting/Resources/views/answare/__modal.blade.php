    
    <div class="modal fade  mymodal" id="myModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    
        <div class="modal-dialog modal-md">

            <form action="{{route('predefinedanswer.store')}}" method="POST" enctype="multipart/form-data" class="ajaxForm needs-validation" id="ajaxForm" novalidate="" data="showCallBackData" accept-charset="UTF-8">
      
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
                                <label for="answer_one" class="col-form-label fw-bold justify-content-start d-flex">Answer One<i class="text-danger">*</i></label>
                                <input type="text"  name="answer_one" id="answer_one" class="form-control" placeholder="Answer One"  required>
                            </div>

                            <div class="col-md-12">
                                <label for="answer_two" class="col-form-label fw-bold justify-content-start d-flex">Answer Two<i class="text-danger">*</i></label>
                                <input type="text"  name="answer_two" id="answer_two" class="form-control" placeholder="Answer Two"  required>
                            </div>
                            <div class="col-md-12">
                                <label for="answer_three" class="col-form-label fw-bold justify-content-start d-flex">Answer Three<i class="text-danger">*</i></label>
                                <input type="text"  name="answer_three" id="answer_three" class="form-control" placeholder="Answer Three"  required>
                            </div>
                            <div class="col-md-12">
                                <label for="answer_four" class="col-form-label fw-bold justify-content-start d-flex">Answer Four<i class="text-danger">*</i></label>
                                <input type="text"  name="answer_four" id="answer_four" class="form-control" placeholder="Answer Four"  required>
                            </div>
                            <div class="col-md-12">
                                <label for="answer_five" class="col-form-label fw-bold justify-content-start d-flex">Answer Five<i class="text-danger">*</i></label>
                                <input type="text"  name="answer_five" id="answer_five" class="form-control" placeholder="Answer Five"  required>
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

