    
    <div class="modal fade mymodal" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
        <div class="modal-dialog modal-xl">

            <form action="{{route('statistical-report.store')}}" method="POST" enctype="multipart/form-data" class="ajaxForm needs-validation" id="ajaxForm" novalidate="" data="showCallBackData" accept-charset="UTF-8">
      
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

                            <div class="col-md-4">
                                <label for="research_title" class="col-form-label fw-bold justify-content-start d-flex">Research Title <i class="text-danger">*</i></label>
                                <input type="text" name="research_title" id="research_title" class="form-control"  required>
                            </div>

                           
                            <div class="col-md-4">
                                <label for="total_cost" class="col-form-label fw-bold justify-content-start d-flex">Total cost of research </label>
                                <input type="number" name="total_cost" id="total_cost" class="form-control"  min="0"  >
                            </div>

                            <div class="col-md-4">
                                <label for="spent_cost" class="col-form-label fw-bold justify-content-start d-flex">Current amount spent on research</label>
                                <input type="number"  name="spent_cost" id="spent_cost" class="form-control" min="0" >
                            </div>

                            <div class="col-md-4">
                                <label for="currency" class="col-form-label fw-bold justify-content-start d-flex">Currency</label>
                                <select class="form-select basicsingle " id="currency_id" name="currency_id" >
                                    @foreach($currencies as $key => $item)
                                    <option value="{{ $item->id }}">{{$item->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            

                            <div class="col-md-4">
                                <label for="lead_professor" class="col-form-label fw-bold justify-content-start d-flex">Lead Professor</label>
                                <input type="text"  name="lead_professor" id="lead_professor" class="form-control" >
                            </div>
                             
                            {{-- <div class="col-md-4">
                                <label for="category" class="col-form-label fw-bold justify-content-start d-flex">Category<i class="text-danger">*</i></label>
                                <input type="text"  name="category" id="category" class="form-control"  required>
                            </div> --}}

                            <div class="col-md-4">
                                <label for="academician" class="col-form-label fw-bold justify-content-start d-flex">Academician</label>
                                <input type="text"  name="academician" id="academician" class="form-control"  >
                            </div>

                            <div class="col-md-4">

                                <label for="name" class="col-form-label fw-bold justify-content-start d-flex">Industry </label>
                                
                                <select class="form-select basicsingle " id="industry" name="industry" >
                                    <option value="">Select Industry</option>
                                        @foreach($industries as $industry)
                                            <option value="{{$industry->id}}">{{$industry->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                            
                            <div class="col-md-4">
                                <label for="patent_level" class="col-form-label fw-bold justify-content-start d-flex">Patent level</label>
                                <select class="form-control basicsingle " id="patent_level" name="patent_level" >
                                    <option value="1">Patent</option>
                                    <option value="2">Non-patent</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="project_stage" class="col-form-label fw-bold justify-content-start d-flex">Stage of Project</label>
                                <select class="form-control basicsingle " id="project_stage" name="project_stage" >
                                    <option value="1">Completed</option>
                                    <option value="2">In progress</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="type_of_researcher" class="col-form-label fw-bold justify-content-start d-flex">Type of researcher</label>
                                <select class="form-control basicsingle " id="type_of_researcher" name="type_of_researcher" >
                                    <option value="1">Institution</option>
                                    <option value="2">Individual</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="report_image" class="col-form-label fw-bold justify-content-start d-flex">Report image </label>
                                <input type="file"  name="report_image" id="report_image" class="form-control" placeholder="Report image"  >
                                <span class="text-danger">Please upload file  jpg | jpeg | png</span>
                            </div>

                            <div class="col-md-4">
                                <label for="report_doc" class="col-form-label fw-bold justify-content-start d-flex">Report document</label>
                                <input type="file"  name="report_doc" id="report_doc" class="form-control" placeholder="Report document" >
                                <span class="text-danger">Please upload file  pdf | docx | jpg | jpeg | png</span>
                            </div>

                            <div class="col-md-12">
                                <label for="about_report" class="col-form-label fw-bold justify-content-start d-flex">About the report</label>
                                <textarea name="about_report" id="about_report" class="form-control" cols="30" rows="10" ></textarea>
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
