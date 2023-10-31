    
    <div class="modal fade  mymodal" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
        <div class="modal-dialog modal-md">

            <form action="{{route('cms.how-it-work-store')}}" method="POST" enctype="multipart/form-data" class="ajaxForm needs-validation" id="ajaxForm" novalidate="" data="showCallBackData" accept-charset="UTF-8">
      
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
                                <label for="image" class="col-form-label fw-bold justify-content-start d-flex">Image<i class="text-danger">*</i></label>
                                <input type="file"  name="image" id="image" class="form-control" placeholder="Head Title" >
                            </div>

                            <div class="col-md-12">
                                <label for="name" class="col-form-label fw-bold justify-content-start d-flex">Name <i class="text-danger">*</i></label>
                                <input type="text"  name="name" id="name" class="form-control" placeholder="name"  required>
                            </div>


                            <div class="col-md-12">
                                <label for="header" class="col-form-label fw-bold justify-content-start d-flex">Head Title <i class="text-danger">*</i></label>
                                <input type="text"  name="header" id="header" class="form-control" placeholder="Head Title"  required>
                            </div>

                            <div class="col-md-12">
                                <label for="description" class="col-form-label fw-bold justify-content-start d-flex">Description<i class="text-danger">*</i></label>
                                <textarea class="form-control" rows="5" name="description" id="description"></textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="btn_text" class="col-form-label fw-bold justify-content-start d-flex">Btn Text <i class="text-danger">*</i></label>
                                <input type="text"  name="btn_text" id="btn_text" class="form-control" placeholder="Btn Text"  required>
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

