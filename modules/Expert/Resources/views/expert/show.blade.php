<x-app-layout>

    <div class="row">

        <div class="row mb-3">
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="card overflow-hidden bg-1">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="text-white">
                      <h6 class="mb-2 fw-bold">Balance</h6>
                      <h4 class="mb-2 fw-bold">${{ $info->expert_balances }}</h4>
                    </div>
                    <div class="col-3 align-items-center d-flex">
                      <div class="counter-icon box-shadow-primary bg-white brround ms-auto"><i class="typcn typcn-user-outline"></i></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="card overflow-hidden bg-2">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="text-white">
                      <h6 class="mb-2 fw-bold">Total Conversation</h6>
                      <h4 class="mb-2 fw-bold">{{ $info->total_conversation }}</h4>
                    </div>
                    <div class="col-3 align-items-center d-flex">
                      <div class="counter-icon box-shadow-primary bg-white brround ms-auto"><i class="typcn typcn-group-outline"></i></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="card overflow-hidden bg-3">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="text-white">
                      <h6 class="mb-2 fw-bold">Total Earning Amount</h6>
                      <h4 class="mb-2 fw-bold">${{ $info->total_earnings }}</h4>
                    </div>
                    <div class="col-3 align-items-center d-flex">
                      <div class="counter-icon box-shadow-primary bg-white brround ms-auto"><i class="typcn typcn-calculator"></i></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
              <div class="card overflow-hidden bg-4">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="text-white">
                      <h6 class="mb-2 fw-bold">Total Withdraw Amount</h6>
                      <h4 class="mb-2 fw-bold">${{ $info->total_withdraw }}</h4>
                    </div>
                    <div class="col-3 align-items-center d-flex">
                        <div class="counter-icon box-shadow-primary bg-white brround ms-auto"><i class="typcn typcn-calculator"></i></div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


        <div class="col-md-3">
            <x-card>

                <x-slot name='actions'>
                    <a href="javascript:void(0);"  class="btn btn-success btn-sm editExpert" data-edit-route="{{route('expert.edit',$expert->id)}}" data-update-route="{{route('expert.update',$expert->id)}}" ><i class="far fa-edit"></i></a>
                </x-slot>
        
                <div class="text-center">
                    <div class="mt-3 mb-4">
                        <img class="rounded shadow-4-strong" style="max-width: 100%" alt="avatar2" src="{{ $expert->profile_img ?? nanopkg_asset('image/blank.png') }}"    />
                    </div>
                </div>

                <div class="table-responsive">


                    <table id="expertinfos" class="table dataTable table-striped table-bordered table-hover no-footer">

                        <tr>
                            <th>{{ __('Code') }}</th>
                            <td>{{ $expert->code }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Status') }}</th>
                            <td>
                                @php
                                    if($expert->status == 1) {
                                        $status = '<span class="badge bg-success">Active</span>';
                                    } else if($expert->status == 0) {
                                        $status = '<span class="badge bg-danger">Inactive</span>';
                                    } else if($expert->status == 2) {
                                        $status = '<span class="badge bg-warning">Suspend</span>';
                                    }
                                @endphp 
                                {!!$status!!}
                            </td>
                        </tr>
                        <tr>
                            <th>{{ __('First Name') }}</th>
                            <td>{{ $expert->first_name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Last Name') }}</th>
                            <td>{{ $expert->last_name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Full Name') }}</th>
                            <td>{{ $expert->full_name }}</td>

                        </tr>
                        <tr>
                            <th>{{ __('Display Name') }}</th>
                            <td>{{ $expert->display_name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Email') }}</th>
                            <td>{{ $expert->email }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Phone') }}</th>
                            <td>{{ $expert->phone }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Category') }}</th>
                            <td>{{ $expert->category?->name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Sub Category') }}</th>
                            <td>{{ $expert->subCategory?->name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Rank No') }}</th>
                            <td>{{ $expert->rank_no }}</td>
                        </tr>

                        <tr>
                            <th>{{ __('Date of Birth') }}</th>
                            <td>{{ $expert->dob }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Country') }}</th>
                            <td>{{ $expert->country?->name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Security Alert') }}</th>
                            <td>{{ $expert->security_alert }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Expert in Bio') }}</th>
                            <td>{{ $expert->expert_in_bio }}</td>
                        </tr>
                        

                    </table>
                </div>

            </x-card>
        </div>

        {{-- Education list --}}

        <div class="col-md-9">
            <div class="row">

                <div class="col-md-6">

                    <div class="tile">
                        <div class="card mb-4">

                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="fs-17 fw-semi-bold mb-0">{{ __('Educations') }}</h6>
                                    </div>
                                    <a href="javascript:void(0);" class="btn btn-success btn-sm addEducation"  ><i class="far fa-plus-square"></i></a>
                                    

                                </div>
                            </div>


                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="educationList" class="table dataTable table-striped table-bordered table-hover no-footer">
                                        <thead>

                                            <tr>
                                                <th>{{ __('Degree') }}</th>
                                                <th>{{ __('Institute') }}</th>
                                                <th>{{ __('Passing Year') }}</th>
                                                <th>{{ __('Action') }}</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($expert->educations as $item )
                                                <tr>
                                                    <td>{{ $item->degree }}</td>
                                                    <td>{{ $item->institute_name }}</td>
                                                    <td>{{ $item->pass_year }}</td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="btn btn-primary btn-sm " id="editEducation" data-update-route="{{route('expert-education.update',$item->id)}}" data-edit-route="{{route('expert-education.edit',$item->id)}}"  ><i class="far fa-edit"></i></a>
                                                        <a href="javascript:void(0);" class="btn btn-danger btn-sm " id="deleteEducation" data-delete-route="{{route('expert-education.destroy',$item->id)}}" ><i class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center">{{ __('No data found') }}</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="tile">
                        <div class="card mb-4">

                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="fs-17 fw-semi-bold mb-0">{{ __('Documents') }}</h6>
                                    </div>
                                    <a href="javascript:void(0);" class="btn btn-success btn-sm addDocument" ><i class="far fa-plus-square"></i></a>

                                </div>
                            </div>


                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="documentList" class="table dataTable table-striped table-bordered table-hover no-footer">
                                        
                                        <thead>
                                            <tr>
                                                <th>{{ __('Doc. Type') }}</th>
                                                <th>{{ __('Doc. Number') }}</th>
                                                <th>{{ __('Doc. Valid Date') }}</th>
                                                <th>{{ __('Doc.') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @forelse ($expert->documents as $item )
                                                <tr>
                                                    <td>{{ $item->doc_type_id }}</td>
                                                    <td>{{ $item->doc_number }}</td>
                                                    <td>{{ $item->doc_valid_date }}</td>
                                                    <td> <a href="#" class="doc-download" data-url="{{ $item->path }}"> Download</a> </td>

                                                    <td>
                                                        <a href="javascript:void(0);" class="btn btn-primary btn-sm " id="editDoc" data-update-route="{{route('expert-document.update',$item->id)}}" data-edit-route="{{route('expert-document.edit',$item->id)}}"  ><i class="far fa-edit"></i></a>
                                                        <a href="javascript:void(0);" class="btn btn-danger btn-sm " id="deleteDoc" data-delete-route="{{route('expert-document.destroy',$item->id)}}" ><i class="fas fa-trash"></i></a>
                                                    </td>
                                                    
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center">{{ __('No data found') }}</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="tile">
                        <div class="card mb-4">

                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="fs-17 fw-semi-bold mb-0">{{ __('Jobs') }}</h6>
                                    </div>
                                    <a href="javascript:void(0);" class="btn btn-success btn-sm addJob" ><i class="far fa-plus-square"></i></a>

                                </div>
                            </div>


                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="jobList" class="table dataTable table-striped table-bordered table-hover no-footer">
                                        <thead>

                                            <tr>
                                                <th>{{ __('Company Name') }}</th>
                                                <th>{{ __('Designatoin') }}</th>
                                                <th>{{ __('Start Date') }}</th>
                                                <th>{{ __('End Date') }}</th>
                                                <th>{{ __('Employer Name') }}</th>
                                                <th>{{ __('Employer Number') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($expert->jobs as $item )
                                                <tr>
                                                    <td>{{ $item->company_name }}</td>
                                                    <td>{{ $item->designation }}</td>
                                                    <td>{{ $item->start_date }}</td>
                                                    <td>{{ $item->end_date }}</td>
                                                    <td>{{ $item->employer_name }}</td>
                                                    <td>{{ $item->employer_number }}</td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="btn btn-primary btn-sm" id="editJob" data-update-route="{{route('expert-job.update',$item->id)}}" data-edit-route="{{route('expert-job.edit',$item->id)}}"  ><i class="far fa-edit"></i></a>
                                                        <a href="javascript:void(0);" class="btn btn-danger btn-sm" id="deleteJob" data-delete-route="{{route('expert-job.destroy',$item->id)}}" ><i class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center">{{ __('No data found') }}</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('expert::expert.__education_form')
    @include('expert::expert.__job_form')
    @include('expert::expert.__document_form')
    @include('expert::expert.__expert')




    @push('lib-styles')
    <link href="{{ admin_asset('vendor/select2/dist/css/select2.css') }}" rel="stylesheet" type="text/css" />
    @endpush
    @push('lib-scripts')
    <script src="{{ admin_asset('vendor/select2/dist/js/select2.js') }}"></script>
    @endpush
    @push('js')
    <script src="{{ module_asset('js/expert/index.js') }}"></script>
    @endpush

    @push('js')


<script>

    var showCallBackDataEducation = function() {
        $('#id').val('');
        $('.ajaxForm')[0].reset();
        $('#myEducation').modal('hide');
        // location.reload();
        $("#educationList").load(" #educationList > *");
    }


            
    $(document).ready(function() {

            "use strict";
      
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            

            $('.addEducation').on('click', function() {

                $('#degree').val('');
                $('#institute_name').val('');
                $('#pass_year').val('');
                $("#acmethodsEducation").val('');

                $('.educationForm').attr('action',"{{route('expert-education.store')}}");

                $('.modal-title').text('Add New Education');

                $('.actionBtn').text('Add Education');

                $('.educationForm').removeClass('was-validated');
                $('#myEducation').modal('show');
                


            });
    
            
            $('#educationList').on('click', '#editEducation', function(e) {
                e.preventDefault();
                var submit_url = $(this).attr('data-edit-route');
                var action_url = $(this).attr('data-update-route');
                $.ajax({
                    type: 'GET',
                    url: submit_url,
                    data: {"_token": "{{ csrf_token() }}"},
                    dataType: 'JSON',
                    success: function(res) {

                        $("#acmethodsEducation").val('PUT');

                        $('#education_id').val(res.id);
                        $('#degree').val(res.degree);
                        $('#institute_name').val(res.institute_name);
                        $('#pass_year').val(res.pass_year);
                        
                        $(".educationForm").attr("action", action_url);

                        $('.modal-title').text('Update Information');
                        $('.actionBtn').text('Update');
                        $('#myEducation').modal('show');

                    },

                    error: function(request, status, error) {
                    }
                });
            });
            

            $('#educationList').on('click', '#deleteEducation', function(e) {

                e.preventDefault();
                $('#ajaxForm').removeClass('was-validated');
                var submit_url = $(this).attr('data-delete-route');
                var check = confirm('{{deleteMsg()}}');

                if (check == true) {
                    $.ajax({
                        type: 'DELETE',
                        url: submit_url,
                        data: {"_token": "{{ csrf_token() }}"},
                        dataType: 'json',
                        success: function(response) {
                            if(response.success==true) {
                                toastr.success(response.message, response.title);
                            }else if(response.success=='exist'){
                                toastr.warning(response.message, response.title);
                            }else{
                                toastr.error(response.message, response.title);
                            }
                            // location.reload();
                            $("#educationList").load(" #educationList > *");
                        },
                        error: function() {
                        }
                    });
                }
            });
      
        });

</script>




<script>

    var showCallBackDataJob = function() {
        $('#id').val('');
        $('.ajaxForm')[0].reset();
        $('#myJob').modal('hide');
        $("#jobList").load(" #jobList > *");
        // location.reload();
    }


            
    $(document).ready(function() {

            "use strict";
      
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            

            $('.addJob').on('click', function() {

                $('#company_name').val('');
                $('#designation').val('');
                $('#start_date').val('');
                $('#end_date').val('');
                $('#employer_name').val('');
                $('#employer_number').val('');
                $('#job_id').val('');
                $('#acmethodsJob').val('');


                $('.modal-title').text('Add New Job');
                $('.actionBtn').text('Add Job');
                $('.ajaxForm').removeClass('was-validated');
                $('#myJob').modal('show');

            });
    
            
            $('#jobList').on('click', '#editJob', function(e) {
                e.preventDefault();
                var submit_url = $(this).attr('data-edit-route');
                var action_url = $(this).attr('data-update-route');
                $.ajax({
                    type: 'GET',
                    url: submit_url,
                    data: {"_token": "{{ csrf_token() }}"},
                    dataType: 'JSON',
                    success: function(res) {

                        $('#company_name').val(res.company_name);
                        $('#designation').val(res.designation);
                        $('#start_date').val(res.start_date);
                        $('#end_date').val(res.end_date);
                        $('#employer_name').val(res.employer_name);
                        $('#employer_number').val(res.employer_number);
                        $('#job_id').val(res.id);
                        $('#acmethodsJob').val('PUT');
                        
                        
                        $(".jobForm").attr("action", action_url);

                        $('.modal-title').text('Update Information');
                        $('.actionBtn').text('Update');
                        $('#myJob').modal('show');

                    },
                    error: function(request, status, error) {
                    }
                });
            });
            

            $('#jobList').on('click', '#deleteJob', function(e) {
                e.preventDefault();

                $('#ajaxForm').removeClass('was-validated');
                var submit_url = $(this).attr('data-delete-route');
                var check = confirm('{{deleteMsg()}}');

                if (check == true) {
                    $.ajax({
                        type: 'DELETE',
                        url: submit_url,
                        data: {"_token": "{{ csrf_token() }}"},
                        dataType: 'json',
                        success: function(response) {
                            if(response.success==true) {
                                toastr.success(response.message, response.title);
                            }else if(response.success=='exist'){
                                toastr.warning(response.message, response.title);
                            }else{
                                toastr.error(response.message, response.title);
                            }
                            // location.reload();

                            $("#jobList").load(" #jobList > *");
                        },
                        error: function() {
                        }
                    });
                }
            });
      
        });

</script>



<script>

    var showCallBackDataDocument = function() {
        $('#id').val('');
        $('.ajaxForm')[0].reset();
        $('#myDocument').modal('hide');
        // location.reload();
        $("#documentList").load(" #documentList > *");
    }


            
    $(document).ready(function() {

            "use strict";
      
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            

            $('.addDocument').on('click', function() {

                $('#doc_type_id').val('');
                $('#doc_number').val('');
                $('#doc_valid_date').val('');

                $('#acmethodsDocument').val('');
                $('#document_id').val('');

                $(".doc_form").attr("action", "{{route('expert-document.store')}}");
                $('.modal-title').text('Add New Document');
                // $('.actionBtn').text('Add Document');
                $('#generate_submit').text('Add Document');

                $('.ajaxForm').removeClass('was-validated');
                $('#myDocument').modal('show');

            });

  
              
  
            



            
            $('#documentList').on('click', '#editDoc', function(e) {
                e.preventDefault();
                var submit_url = $(this).attr('data-edit-route');
                var action_url = $(this).attr('data-update-route');
           
                $.ajax({
                    type: 'GET',
                    url: submit_url,
                    data: {"_token": "{{ csrf_token() }}"},
                    dataType: 'JSON',
                    success: function(res) {

                        $("#acmethodsDocument").val('PUT');

                        $('#document_id').val(res.id);
                        $('#doc_type_id').val(res.doc_type_id).trigger('change');
                        $('#doc_number').val(res.doc_number);
                        $('#doc_valid_date').val(res.doc_valid_date);
                        
                        $(".doc_form").attr("action", action_url);

                        $('.modal-title').text('Update Information');

                        $('#generate_submit').text('Update');

                        // $('.actionBtn').text('Update');
                        $('#myDocument').modal('show');

                    },
                    error: function(request, status, error) {
                    }
                });
            });
            

            $('#documentList').on('click', '#deleteDoc', function(e) {
                e.preventDefault();


                $('#ajaxForm').removeClass('was-validated');
                var submit_url = $(this).attr('data-delete-route');
                var check = confirm('{{deleteMsg()}}');

                if (check == true) {

                    $.ajax({
                        type: 'DELETE',
                        url: submit_url,
                        data: {"_token": "{{ csrf_token() }}"},
                        dataType: 'json',
                        success: function(response) {
                            if(response.success==true) {
                                toastr.success(response.message, response.title);
                            }else if(response.success=='exist'){
                                toastr.warning(response.message, response.title);
                            }else{
                                toastr.error(response.message, response.title);
                            }
                            // location.reload();
                            $("#documentList").load(" #documentList > *");
                        },
                        error: function() {
                        }
                    });
                }
            });
        });


</script>


<script>

    var showCallBackDataExpert = function() {
        $('#id').val('');
        $('.ajaxForm')[0].reset();
        $('#myExpert').modal('hide');
        // $("#expertinfos").load(" #expertinfos > *");
        location.reload();
    }
            
    $(document).ready(function() {

            "use strict";
      
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            

            
            $('.editExpert').on('click', function(e) {
               

                e.preventDefault();
                var submit_url = $(this).attr('data-edit-route');
                var action_url = $(this).attr('data-update-route');
                
               
                $.ajax({
                    type: 'GET',
                    url: submit_url,
                    data: {"_token": "{{ csrf_token() }}"},
                    dataType: 'JSON',
                    success: function(res) {

                        $("#acmethodsExpert").val('PUT');

                        $('#expert_id').val(res.id);

                        $('#gender').val(res.gender).trigger('change');
                        $('#country_id').val(res.country_id).trigger('change');
                        $('#category_id').val(res.category_id).trigger('change');
                        $('#sub_category_id').val(res.sub_category_id).trigger('change');

                        $('#first_name').val(res.first_name);
                        $('#last_name').val(res.last_name);
                        $('#display_name').val(res.display_name);
                        $('#email').val(res.email);
                        $('#phone').val(res.phone);
                        $('#dob').val(res.dob);
                        $('#expert_in_bio').val(res.expert_in_bio);
                        $('#state').val(res.state);
                        $('#zip_code').val(res.zip_code);
                        $('#image_old').val(res.profile_photo_url);

                        if(res.status=='0'){
                            $('#inactive').prop('checked',true); 
                        }
                        if(res.status=='1'){
                            $('#active').prop('checked',true); 
                        }
                        if(res.status=='2'){
                            $('#suspend').prop('checked',true); 
                        }
                        $('.userpass').addClass('d-none');
                        
                        $(".expertForm").attr("action", action_url);

                        $('.modal-title').text('Update Information');
                        $('.actionBtn').text('Update');
                        $('#myExpert').modal('show');

                    },
                    error: function(request, status, error) {
                    }
                });
            });
      
    });



    
    function getSubcategory(){

        // $.ajax({
        //     type: 'GET',
        //     url: submit_url,
        //     data: {"_token": "{{ csrf_token() }}","id":cat},
        //     success: function(res) {

        //         $("#sub_category_id").val(res);


        //     },
        //     error: function(request, status, error) {
        //     }
        // });

    }


</script>

@endpush

</x-app-layout>

