    
    <div class="modal fade " id="myEducation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
        <div class="modal-dialog modal-md">

            <form action="" method="POST" enctype="multipart/form-data" class="ajaxForm needs-validation educationForm" id="ajaxForm" novalidate="" data="showCallBackDataEducation" accept-charset="UTF-8">
      
                @csrf
                <input type="hidden" name="_method" value="" id="acmethodsEducation">

                <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <input type="hidden" name="education_id" id="education_id">
                        <input type="hidden" name="expert_id" value="{{ $expert->id }}" id="expert_id">

                    
                        <div class="row">
                           
                            <div class="col-md-12">
                                <label for="degree" class="col-form-label fw-bold justify-content-start d-flex">Degree <i class="text-danger">*</i></label>
                                <input type="text"  name="degree" id="degree" class="form-control" placeholder="degree"  required>
                            </div>

                            <div class="col-md-12">
                                <label for="institute_name" class="col-form-label fw-bold justify-content-start d-flex">Institute Name<i class="text-danger">*</i></label>
                                <input type="text"  name="institute_name" id="institute_name" class="form-control" placeholder="Institute name" required>
                            </div>

                            <div class="col-md-12">
                                <label for="pass_year" class="col-form-label fw-bold justify-content-start d-flex">Pass Year <i class="text-danger">*</i></label>
                                <input type="text"  name="pass_year" id="pass_year" class="form-control"  >
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
