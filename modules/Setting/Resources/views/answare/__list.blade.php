<x-app-layout>

    <x-card>

        

        <x-slot name='actions'>
            <a href="javascript:void(0)" class="btn btn-success btn-sm addShowModal" ><i class="fa fa-plus-circle"></i> Add New </a>
            @include('setting::answare.__modal')
        </x-slot>


        <div class="table-responsive">
        <table id="pricingList" class="text-center table display table-bordered table-striped table-hover bg-white m-0 card-table">
            <thead>

                <tr>
                    <th>SL.</th>
                    <th>Category Name</th>
                    <th>Answer One</th>
                    <th>Answer Two</th>
                    <th>Answer Three</th>
                    <th>Answer Four</th>
                    <th>Answer Five</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($predefined_answers as $key => $val)
                    <tr>
                        <td>#{{ $key + 1 }}</td>
                        <td>{{ $val?->category?->name }}</td>
                        <td>{{ $val->answer_one }}</td>
                        <td>{{ $val->answer_two }}</td>
                        <td>{{ $val->answer_three }}</td>
                        <td>{{ $val->answer_four }}</td>
                        <td>{{ $val->answer_five }}</td>
                        <td>{{ $val->status?'Active':'Inactive'}}</td>

                        <td>
                            <a href="javascript:void(0)" class="text-white btn btn-sm btn-success " id="editAction" data-edit-route="{{route('predefinedanswer.edit',$val->id)}}" data-update-route="{{route('predefinedanswer.update',$val->id)}}"><i class="fa fa-edit"></i></a>
                            <a href="javascript:void(0)" class="text-white btn btn-sm btn-danger " id="deleteAction" data-delete-route="{{route('predefinedanswer.destroy',$val->id)}}" ><i class="fa fa-trash"></i></a>
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
                    $('#phrase').val('');
                    $('#id').val('');
                    $('#acmethods').val('');
    
                    $('.modal-title').text('Add New');
                    $('.actionBtn').text('Add');
                    $('.ajaxForm').removeClass('was-validated');
                    $('#myModal').modal('show');
                    $('#ajaxForm').attr('action',"{{route('predefinedanswer.store')}}");
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
    
                            var per = JSON.parse(res.phrase);
                            // console.log(per.answer_one);
                            
                            $("#acmethods").val('PUT');
                            $("#ajaxForm").attr("method", 'PUT');

                            $('#category_id').val(res.category_id).trigger('change');

                            $('#answer_one').val(res.answer_one);
                            $('#answer_two').val(res.answer_two);
                            $('#answer_three').val(res.answer_three);
                            $('#answer_four').val(res.answer_four);
                            $('#answer_five').val(res.answer_five);
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
