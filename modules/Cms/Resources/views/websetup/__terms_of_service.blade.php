


<x-app-layout>
    <x-card>
        
        <div class="card-body">
            @php
            $websetup = json_decode($CmsSetting?->details);
            @endphp

            <form action="{{route('cms.terms-of-service-update')}}"  method="POST" enctype="multipart/form-data" class="ajaxForm needs-validation" id="ajaxForm" novalidate="" data="showCallBackData" accept-charset="UTF-8">
                @csrf
                <input type="hidden" name="id" value="{{$CmsSetting?->id}}">
                <div class="row">
                    <div class="card-body col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="col-form-label text-end fw-bold">Content: <span class="text-danger"> *</span></label>
                                <textarea name="termsofservice" id="termsofservice" class="form-control">{{@$websetup->termsofservice}}</textarea>
                            </div> 
                        </div>
                    </div>
                </div>

                <div class="card-footer form-footer">
                    <button type="submit" class="btn btn-primary btn-sm ">Update</button>
                </div>

            </form>
        </div>


    </x-card>


    @push('js')

    
<script src="{{admin_asset('vendor/ckeditor/ckeditor.js')}}"></script>

    <script>
        var showCallBackData = function() {
            $('#id').val('');
            $('.ajaxForm')[0].reset();
            $('#myModal').modal('hide');
            location.reload();
        }
    
        $(document).ready(function () {
          "use strict"; 
            CKEDITOR.replace('termsofservice', {});
        });
    
    </script>
    
    
    <script>
        CKEDITOR.replace( 'editor1', {
            filebrowserBrowseUrl: '{{ asset('public/backend') }}/assets/plugins/ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl: '{{ asset('public/backend') }}/assets/plugins/ckfinder/ckfinder.html?Type=Images',
            filebrowserUploadUrl: '{{ asset('public/backend') }}/assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: '{{ asset('public/backend') }}/assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserWindowWidth : '1000',
            filebrowserWindowHeight : '700'
        });
      </script>
    
    @endpush

</x-app-layout>


