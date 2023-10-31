    
    <div class="modal fade " id="myDocument" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
        <div class="modal-dialog modal-lg">

            <form action="" method="POST" enctype="multipart/form-data" class="ajaxForm needs-validation doc_form" id="ajaxForm" novalidate="" data="showCallBackDataDocument" accept-charset="UTF-8">
      
                @csrf
                <input type="hidden" name="_method" value="" id="acmethodsDocument">
                <input type="hidden" name="document_id" id="document_id">
                <input type="hidden" name="expert_id" value="{{ $expert->id }}" id="expert_id">

                <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                       
                        

                        <div class="row">

                           
                            <div class="col-md-12">
                                <label for="doc_type_id" class="col-form-label fw-bold justify-content-start d-flex">Document Type <i class="text-danger">*</i></label>
                                
                                <x-select2 name="doc_type_id" id="doc_type_id" >
                                    <option selected disabled value="">--{{ __('Select Dco Type') }}--</option>
                                    @foreach (Modules\Expert\Entities\DocType::all() as $doc)
                                    <option value="{{ $doc->id }}">
                                        {{ $doc->name }}
                                    </option>
                                    @endforeach
                                </x-select2>

                            </div>

                            <div class="col-md-12">
                                <label for="doc_number" class="col-form-label fw-bold justify-content-start d-flex">Document Number<i class="text-danger">*</i></label>
                                <input type="text"  name="doc_number" id="doc_number" class="form-control" placeholder="Document Number" required>
                            </div>

                            <div class="col-md-12">
                                <label for="doc_valid_date" class="col-form-label fw-bold justify-content-start d-flex">Document Valid Date <i class="text-danger">*</i></label>
                                <input type="date"  name="doc_valid_date" id="doc_valid_date" class="form-control" required >
                            </div>

                            <div class="col-md-12">
                                <label for="doc_path" class="col-form-label fw-bold justify-content-start d-flex">Document<i class="text-danger">*</i></label>
                                <input type="file"  name="doc_path" id="doc_path" class="form-control"  >
                            </div>

                        </div>

                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success modal_action actionBtn">
                            <span id="generate_submit" class="">
                                <i class="fa-regular fa-circle-question"></i>
                                Submit
                            </span>
                            <span id="generate_loading" class="d-none">
                                <i class="fa fa-spinner fa-spin"></i>
                                Please Wait...
                            </span>
                        </button>
                    </div>



                    {{-- <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success modal_action actionBtn"></button>
                    </div> --}}

                </div>

            </form>
        </div>
    </div>
