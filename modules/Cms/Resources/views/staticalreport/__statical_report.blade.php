@extends('backend.layouts.app')
@push('css')

@endpush
@section('content')


<!--/.Content Header (Page header)-->
<div class="body-content">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card mb-4">

                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="fs-17 fw-semi-bold mb-0">{{ __('Reports List') }}</h6>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="actions">
                            <a href="javascript:void(0)" class="btn btn-success btn-sm addShowModal" ><i class="fa fa-plus-circle"></i> Add New </a>
                            
                        </div>
                    </div>
                </div>

                        
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="reportList" class="table display table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    {{-- <th >{{__('Image')}}</th> --}}
                                    <th >{{__('Title')}}</th>
                                    <th >{{__('Description')}}</th>
                                    <th >{{__('price')}}</th>
                                    <th>Spent cost</th>
                                    <th>Currency</th>
                                    <th>Academician</th>
                                    <th>Lead professor</th>
                                    <th>Patent level</th>
                                    <th>Project stage</th>
                                    <th>Type of research</th>
                                    <th >{{__('Industry')}}</th>
                                    <th >{{__('Status')}}</th>
                                    <th width='100'>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                        
            </div>
        </div>
    </div>
</div>

@include('cms::modal.report_modal')

@endsection
@push('js')

<script>

        var showCallBackData = function() {

            $('#id').val('');
            $('.ajaxForm')[0].reset();
            $('#myModal').modal('hide');
            location.reload();

        }
            
        $(document).ready(function() {
            "use strict";
      
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            
            $('.addShowModal').on('click', function() {

                $('#research_title').val('');
                $('#total_cost').val('');
                $('#id').val('');
                $('#about_report').val('');
                $('.modal-title').text('Add New Report');

                $('#spent_cost').val('');
                $('#currency_id').val('');
                $('#category').val('');
                $('#academician').val('');
                $('#lead_professor').val('');
                $('#patent_level').val('');
                $('#project_stage').val('');


                $('.actionBtn').text('Add');
                $('.ajaxForm').removeClass('was-validated');
                $('#myModal').modal('show');
                $('#ajaxForm').attr('action',"{{route('statistical-report.store')}}");
            });
    
            
            $('#reportList').on('click', '#editAction', function(e) {
                e.preventDefault();
                var submit_url = $(this).attr('data-edit-route');
                var action_url = $(this).attr('data-update-route');
                $.ajax({
                    type: 'GET',
                    url: submit_url,
                    data: {"_token": "{{ csrf_token() }}"},
                    dataType: 'JSON',
                    success: function(res) {

                        $("#acmethods").val('PUT');
                        $('#id').val(res.id);
                        $('#research_title').val(res.research_title);
                        $('#total_cost').val(res.total_cost);
                        $("#industry").val( res.industry_id ).trigger("change");
                        $('#about_report').val(res.about_report);

                        $('#spent_cost').val(res.spent_cost);
                        $('#currency_id').val(res.currency_id);
                        $('#category').val(res.category).trigger('change');
                        $('#type_of_researcher').val(res.type_of_researcher).trigger('change');

                        $('#academician').val(res.academician);
                        $('#lead_professor').val(res.lead_professor);
                        $('#patent_level').val(res.patent_level);
                        $('#project_stage').val(res.project_stage);



                        $("#ajaxForm").attr("action", action_url);
                        $('.modal-title').text('Update Information');
                        $('.actionBtn').text('Update');
                        $('#myModal').modal('show');

                    },
                    error: function(request, status, error) {
                    }
                });
            });

            $('#reportList').on('click', '#deleteAction', function(e) {
                e.preventDefault();

                $('#ajaxForm').removeClass('was-validated');

                var submit_url = $(this).attr('data-delete-route');

                var check = confirm('{{deleteMsg()}}');
                if (check == true) {
                    $.ajax({
                        type: 'GET',
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
                            location.reload();
                            //$("#reportList").load(" #reportList > *");
                        },
                        error: function() {
                        }
                    });
                }
            });


            $('#reportList').on('click', '#approveAction', function(e) {
                e.preventDefault();

                $('#ajaxForm').removeClass('was-validated');

                var submit_url = $(this).attr('data-approve-route');

                var check = confirm('Are you sure approve this');
                if (check == true) {
                    $.ajax({
                        type: 'GET',
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
                            $('#reportList').DataTable().ajax.reload();
                            // location.reload();
                            //$("#reportList").load(" #reportList > *");
                        },
                        error: function() {
                        }
                    });
                }
            });


            var reportList = $('#reportList').DataTable({
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'All'],
                ],
                processing: true,
                serverSide: true,
                ajax: {
                    url : "{{route('get-report-list')}}",
                    data : function(d) {
                        d._token= "{{ csrf_token() }}";
                    },
                },

                columns: [
                    // { data: 'report_image', name: 'report_image' },
                    { data: 'name', name: 'name' },
                    { data: 'about_report', name: 'about_report' },
                    { data: 'price', name: 'price' },
                    { data: 'spent_cost', name: 'spent_cost' },
                    { data: 'currency', name: 'currency' },
                    // { data: 'category', name: 'category' },
                    { data: 'academician', name: 'academician' },
                    { data: 'lead_professor', name: 'lead_professor' },
                    { data: 'patent_level', name: 'patent_level' },
                    { data: 'project_stage', name: 'project_stage' },
                    { data: 'type_of_research', name: 'type_of_research' },
                    { data: 'industry', name: 'industry' },
                    { data: 'status', name: 'status' },
                    { data: 'action', name: 'action' }
                ]

            });

            $(".go").click(function(){
                reportList.draw();
            });

        });


</script>
@endpush

