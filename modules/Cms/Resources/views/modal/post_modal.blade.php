    
    <div class="modal fade mymodal" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
        <div class="modal-dialog modal-xl">

            <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data" class="ajaxForm needs-validation" id="ajaxForm" novalidate="" data="showCallBackData" accept-charset="UTF-8">
      
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
                                <label for="title" class="col-form-label fw-bold justify-content-start d-flex">Title <i class="text-danger">*</i></label>
                                <input type="text"  name="title" id="title" class="form-control" placeholder="Title"  required>
                            </div>


                            <div class="col-md-6">
                                <label for="category_id" class="col-form-label fw-bold justify-content-start d-flex">Category<i class="text-danger">*</i></label>
                                <select type="text" class="form-select basicsingle " id="category_id" name="category_id" required>
                                    <option value="">Select Cetagory</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="post_image" class="col-form-label fw-bold justify-content-start d-flex">Image <i class="text-danger">*</i></label>
                                <input type="file"  name="post_image" id="post_image" class="form-control" placeholder="Post image"  >
                            </div>

                            <div class="col-md-6">
                                <label for="meta_title" class="col-form-label fw-bold justify-content-start d-flex">Meta Title<i class="text-danger">*</i></label>
                                <textarea name="meta_title" id="meta_title" class="form-control" id="" cols="30" rows="1" required></textarea>
                            </div>
                            
                            <div class="col-md-12">
                                <label for="meta_description" class="col-form-label fw-bold justify-content-start d-flex">Meta Description<i class="text-danger">*</i></label>
                                <textarea name="meta_description" id="meta_description" class="form-control" id="" cols="30" rows="1" required></textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="content" class="col-form-label fw-bold justify-content-start d-flex">Content<i class="text-danger">*</i></label>
                                <textarea name="content" class="form-control" id="content" cols="30" rows="10" required></textarea>
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


   