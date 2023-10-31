<x-app-layout>

    <x-card>

        

        <x-slot name='actions'>
            <a href="javascript:void(0)" class="btn btn-success btn-sm addShowModal" ><i class="fa fa-plus-circle"></i> Add New </a>
            @include('subcription::pricing.__modal')
        </x-slot>


        <div class="table-responsive">
        <table id="pricingList" class="text-center table display table-bordered table-striped table-hover bg-white m-0 card-table">
            <thead>

                <tr>
                    <th>SL.</th>
                    <th>Category Name</th>
                    <th>Trial Price</th>
                    <th>Trial Day</th>
                    <th>Recurring Price</th>
                    <th>Recurring day</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($pricings as $key => $val)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $val->category->name }}</td>
                        <td>${{ $val->trial_price??'---' }}</td>
                        <td>{{ $val->trial_day??'---' }}</td>
                        <td>${{ $val->recurring_price }}</td>
                        <td>{{ $val->recurring_day??'---'}}</td>
                        <td>{{ $val->status?'Active':'Inactive'}}</td>

                        <td>
                            <a href="javascript:void(0)" class="text-white btn btn-sm btn-success " id="editAction" data-edit-route="{{route('pricing.edit',$val->id)}}" data-update-route="{{route('pricing.update',$val->id)}}"><i class="fa fa-edit"></i></a>
                            <a href="javascript:void(0)" class="text-white btn btn-sm btn-danger " id="deleteAction" data-delete-route="{{route('pricing.destroy',$val->id)}}" ><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
               @endforeach
            </tbody>
        </table>
        </div>
    </x-card>



    

    @push('lib-scripts')

    <script>
    
        var showCallBackData = function() {
            $('#id').val('');
            $('.ajaxForm')[0].reset();
            $('#myModal').modal('hide');
            // location.reload();
            $("#pricingList").load(" #pricingList > *");
        }
    
    
                
        $(document).ready(function() {
                "use strict";
          
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        
                
                $('.addShowModal').on('click', function() {
    
                    $('#category_id').val('').trigger('change');
                    $('#description').val('');
                    $('#trial_price').val('');
                    $('#recurring_price').val('');
                    $('#recurring_day').val('');
                    $('#trial_day').val('');
                    $('#id').val('');
                    $('#acmethods').val('');
    
                    $('.modal-title').text('Add New');
                    $('.actionBtn').text('Add');
                    $('.ajaxForm').removeClass('was-validated');
                    $('#myModal').modal('show');
                    $('#ajaxForm').attr('action',"{{route('pricing.store')}}");
                });
        
        
                
                $('#pricingList').on('click', '#editAction', function(e) {
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
                            $("#ajaxForm").attr("method", 'PUT');

                            $('#category_id').val(res.category_id).trigger('change');
                            $('#description').val(res.description);
                            $('#trial_price').val(res.trial_price);
                            $('#recurring_price').val(res.recurring_price);
                            $('#recurring_day').val(res.recurring_day);
                            $('#trial_day').val(res.trial_day);

                            $('#id').val(res.id);
    
    
    
                            $("#ajaxForm").attr("action", action_url);
                            $('.modal-title').text('Update Information');
                            $('.actionBtn').text('Update');
                            $('#myModal').modal('show');
    
                        },
                        error: function(request, status, error) {
                        }
                    });
                });
    
    
                
    
                $('#pricingList').on('click', '#deleteAction', function(e) {
                    e.preventDefault();
    
                    $('#ajaxForm').removeClass('was-validated');
    
                    var submit_url = $(this).attr('data-delete-route');
    
                    var check = confirm('Are you sure');
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
                                $("#pricingList").load(" #pricingList > *");
                            },
                            error: function() {
                            }
                        });
                    }
                });
          
            });
    
    </script>
    
    @endpush


</x-app-layout>
