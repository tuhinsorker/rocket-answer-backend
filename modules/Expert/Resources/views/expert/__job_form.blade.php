    
    <div class="modal fade " id="myJob" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
        <div class="modal-dialog modal-lg">

            <form action="{{route('expert-job.store')}}" method="POST" enctype="multipart/form-data" class="ajaxForm needs-validation jobForm" id="ajaxForm" novalidate="" data="showCallBackDataJob" accept-charset="UTF-8">
      
                @csrf
                <input type="hidden" name="_method" value="" id="acmethodsJob">
                <input type="hidden" name="job_id" id="job_id">
                <input type="hidden" name="expert_id" value="{{ $expert->id }}" id="expert_id">

                <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <div class="row">

                            <div class="col-md-12">
                                <label for="company_name" class="col-form-label fw-bold justify-content-start d-flex">Company Name <i class="text-danger">*</i></label>
                                <input type="text"  name="company_name" id="company_name" class="form-control" placeholder="Company Name"  required>
                            </div>

                            <div class="col-md-12">
                                <label for="designation" class="col-form-label fw-bold justify-content-start d-flex">Designation<i class="text-danger">*</i></label>
                                <input type="text"  name="designation" id="designation" class="form-control" placeholder="Designation" required>
                            </div>

                            <div class="col-md-12">
                                <label for="start_date" class="col-form-label fw-bold justify-content-start d-flex">Start Date <i class="text-danger">*</i></label>
                                <input type="date"  name="start_date" id="start_date" class="form-control"  >
                            </div>

                            <div class="col-md-12">
                                <label for="end_date" class="col-form-label fw-bold justify-content-start d-flex">End Date <i class="text-danger">*</i></label>
                                <input type="date"  name="end_date" id="end_date" class="form-control"  >
                            </div>

                            <div class="col-md-12">
                                <label for="employer_name" class="col-form-label fw-bold justify-content-start d-flex">Employer Name <i class="text-danger">*</i></label>
                                <input type="text"  name="employer_name" id="employer_name" class="form-control" placeholder="Employer Name"  required>
                            </div>

                            <div class="col-md-12">
                                <label for="employer_number" class="col-form-label fw-bold justify-content-start d-flex">Employer Number<i class="text-danger">*</i></label>
                                <input type="text"  name="employer_number" id="employer_number" class="form-control" placeholder="Employer Number" required>
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
