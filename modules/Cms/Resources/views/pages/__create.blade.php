
<x-app-layout>
    <x-card>

        <x-slot name='actions'>
            <a href="{{route('cms.pages.index')}}" class="btn btn-success btn-sm"><i class="fa fa-list"></i>&nbsp;{{ __('Page List') }}</a>
        </x-slot>

                                
        <div class="card-body">

            <form action="{{route('cms.pages.store')}}" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">

                @csrf
                

                        <div class="row">

                            <div class="col-md-4 cust_border pb-3 mb-3">
                                <label for="title" class="col-form-label fw-bold justify-content-start d-flex">Title <i class="text-danger">*</i></label>
                                <input type="title"  name="title" id="title" class="form-control" placeholder="Title"  required>
                            </div>


                           <div class="col-md-4 cust_border pb-3 mb-3">
                                <label for="category_id" class="col-form-label fw-bold justify-content-start d-flex">Category<i class="text-danger">*</i></label>
                                
                                <select class="form-select  search_test" id="category_id" name="category_id" required>
                                    <option value="">Select Cetagory</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                           <div class="col-md-4 cust_border pb-3 mb-3">
                                <label for="post_image" class="col-form-label fw-bold justify-content-start d-flex">Image <i class="text-danger">*</i></label>
                                <input type="file"  name="post_image" id="post_image" class="form-control" placeholder="Post image"  >
                            </div>

                            <div class="col-md-12 border pb-3 mb-3">
                                <label for="content" class="col-form-label fw-bold justify-content-start d-flex">Content<i class="text-danger">*</i></label>
                                <textarea name="content" class="form-control" id="editor1" cols="30" rows="10" required></textarea>
                            </div>

                            <div class="col-md-6 border pb-3 mb-3">
                                <label for="meta_title" class="col-form-label fw-bold justify-content-start d-flex">Meta Title</label>
                                <textarea name="meta_title" id="meta_title" class="form-control" id="" cols="30" rows="1" ></textarea>
                            </div>
                            
                            <div class="col-md-6 border pb-3 mb-3">
                                <label for="meta_description" class="col-form-label fw-bold justify-content-start d-flex">Meta Description</label>
                                <textarea name="meta_description" id="meta_description" class="form-control"  ></textarea>
                            </div>

                        </div>


                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> --}}
                        <button type="submit" class="btn btn-success "> Add New</button>
                    </div>


            </form>
        </div>
       
    </x-card>


    

</x-app-layout>






@stack('lib-scripts')

<script src="{{admin_asset('vendor/ckeditor/ckeditor.js')}}"></script>

<script>

    var showCallBackData = function() {
        $('#id').val('');
        $('.ajaxForm')[0].reset();
        $('#myModal').modal('hide');
        location.reload();
    }

</script>


<script>
    $(document).ready(function () {
      "use strict"; 
        CKEDITOR.replace('editor1', {});
    });
</script>

<script>
    CKEDITOR.replace( 'editor1', {
        filebrowserBrowseUrl: '{{admin_asset('vendor/ckfinder/ckfinder.html')}}',
        filebrowserImageBrowseUrl: '{{admin_asset('ckfinder/ckfinder.html?Type=Images')}}',
        filebrowserUploadUrl: '{{admin_asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files')}}',
        filebrowserImageUploadUrl: '{{admin_asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images')}}',
        filebrowserWindowWidth : '1000',
        filebrowserWindowHeight : '700'
    });
  </script>

@stack('js')



