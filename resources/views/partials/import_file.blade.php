
<!--
required    ----------------
$cls        = Import Class Name
$demo_file  = Demo file name located at public/demo_files filder for downloading demo
-->
 <!--  This file need demo_file as variable data for download demo csv and data-url as import route -->
 <a href="javascript:void(0)" class="import btn btn-primary btn-sm" data-url="{{ route('import.table_list',$cls) }}"> {{ __('Import') }} </a>
  <div class="modal fade import_file_modal" id="importModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <input type="hidden" name="_method" value="" id="acmethod">
            <input type="hidden" name="id" value="" id="id">

                <div class="modal-body text-start">
                    <h6 class="mb-3"><b>Note :</b> Please upload CSV or Excel file according to demo File. If not seen yet please download the demo file. <br>
                        <b>File extension Supported : .csv | .xlsx </b>
                     </h6>
                    <input id="fileupload" type="file" name="fileupload" class="mb-3"/>
                    <div class="error-message"></div>
                    <div class="btn-toolbar mt-3" role="toolbar" aria-label="Toolbar with button groups">
                        <button class="download_demo btn btn-primary btn-sm" style="margin-right: 1em" onclick=""> <span class="fa fa-download"></span> Download Demo </button>
                        <button class="btn btn-primary" id="upload-button" onclick="uploadFile()"> <span class="fa fa-upload"></span> Upload </button>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>

    </div>
</div>



@push('js')
    <script>

        // ajax csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

    $(".import").click(function(e){
        e.preventDefault();
        $('.error-message .alert' ).remove();
        $('.import_file_modal').modal('show');
    });

    function downloadURI(uri, name)
            {
                var link = document.createElement("a");
                link.download = name;
                link.href = uri;
                link.click();
            }

    // Importing data from csv or excel
     function uploadFile() {
        var formData = new FormData();
        formData.append("import_file", fileupload.files[0]);
        var url = $('.import').attr('data-url');
        console.log('Url is : ',url);
        console.log("form Data ", fileupload.files[0]);


        $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        // show loader
        $('.page-loader-wrapper').css({"display": "block","background-color":"#e3d6d663"});

        $.ajax({
            url: url,
            data: formData,
            processData: false,
            contentType:false,
            cache:false,
            type: 'POST',
            success: function ( data ) {
                $('.import_file_modal').modal('hide');
                $('.page-loader-wrapper').css({"display": "none"});
                $('.error-message .alert' ).remove();
                toastr.warning("Successfully Imported");
                setTimeout(() => {
                    location.reload();
                }, 2000);


            },
            error: function (data, status, res) {
                $('.page-loader-wrapper').css({"display": "none"});

                var errors = data.responseJSON;
                 errorsHtml = '<div class="alert alert-danger"><ul>';
                if(errors.errors != undefined && typeof errors.errors != 'string'){
                    $.each( errors.errors, function( key, value ) {
                         errorsHtml += '<li>'+ value + '</li>'; //showing only the first error.
                    });
                }else{
                    if(errors.error != ''){
                        errorsHtml += '<li> Please check the demo file column structure </li>';
                        errorsHtml += '<li>'+ errors.errors + '</li>';
                    }
                    else if(errors.message != ''){
                        errorsHtml += '<li>'+ errors.message + '</li>';
                    }else{
                        errorsHtml += '<li>'+ errors.exception + '</li>'; //showing only the first error.
                    }
                }
                 errorsHtml += '</ul></div>';
                 $('.error-message' ).html( errorsHtml );

            }
        });
    }


    // Download Demo files
    $('.download_demo').click(function(e){
        var link = "{{ route('download.demo_file',[ 'file_name' => $demo_file] )}}"  ;
        $('.page-loader-wrapper').css({"display": "block","background-color":"#e3d6d663"});
        $.get(link, function(data,status) {
            downloadURI(link,'hafijur');
            $('.page-loader-wrapper').css({"display": "none"});
            // console.log('Working success ',data);
            }).fail(function(error) {
                $('.page-loader-wrapper').css({"display": "none"});
                console.log("Error ",error);
                alert( "Something went wrong! Try again" );
            });

    });

    </script>
@endpush


