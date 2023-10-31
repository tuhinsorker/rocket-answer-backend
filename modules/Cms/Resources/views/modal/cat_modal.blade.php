    
    <div class="modal fade  mymodal" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
        <div class="modal-dialog modal-xl">

            <form action="{{route('cms.categories.store')}}" method="POST" enctype="multipart/form-data" class="ajaxForm needs-validation" id="ajaxForm" novalidate="" data="showCallBackData" accept-charset="UTF-8">
      
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

                            <div class="col-md-6">
                                <label for="category_name" class="col-form-label fw-bold justify-content-start d-flex">Category Name <i class="text-danger">*</i></label>
                                <input type="text"  name="category_name" id="category_name" class="form-control" placeholder="Category Name"  required>
                            </div>

                            <div class="col-md-6">
                                <label for="category_slug" class="col-form-label fw-bold justify-content-start d-flex">Cetagory Slug<i class="text-danger">*</i></label>
                                <input type="text"  name="category_slug" id="category_slug" class="form-control" placeholder="Cetagory Slug" required>
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

