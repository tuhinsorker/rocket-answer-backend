<x-app-layout>
    <x-card>
        <x-slot name='actions'>
            <a href="javascript:void(0)" class="btn btn-success btn-sm addEducation"><i
                    class="fa fa-plus-circle"></i>&nbsp;{{ __('Add Team Member') }}</a>
        </x-slot>

        <div>
            <x-data-table :dataTable="$dataTable" />
        </div>
    </x-card>


    @include('cms::team_member.__team_member_form')

    @push('lib-styles')
    <link href="{{ admin_asset('vendor/select2/dist/css/select2.css') }}" rel="stylesheet" type="text/css" />
    @endpush
    @push('lib-scripts')
    <script src="{{ admin_asset('vendor/select2/dist/js/select2.js') }}"></script>
    @endpush

    @push('js')




    <script>

        var showCallBackDataTeamMember = function() {
            $('#id').val('');
            $('.ajaxForm')[0].reset();
            $('#team-member-modal').modal('hide');
            location.reload();
            // $("#team-member-table").load(" #team-member-table > *");
        }



        $(document).ready(function() {

                "use strict";

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                $('.addEducation').on('click', function() {

                    $('.team_member_form').find('input[type="text"]').not('#id').val('');


                    $('.team_member_form').attr('action',"{{route('cms.team-member.store')}}");

                    $('.modal-title').text('Add New Team Member');
                    $('.actionBtn').text('Add Team Member');


                    $('.team_member_form').removeClass('was-validated');
                    $('#team-member-modal').modal('show');

                });




                $('#team-member-table').on('click', '#editEducation', function(e) {
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

                            $('#id').val(res.id);
                            $('#name').val(res.name);
                            $('#designation').val(res.designation);
                            if(res.is_active=='0'){
                            $('#in_active').prop('checked',true);
                            }
                            if(res.is_active=='1'){
                                $('#active').prop('checked',true);
                            }
                            $('#fb').val(res.fb);
                            $('#twitter').val(res.twitter);
                            $('#linkedin').val(res.linkedin);

                            $(".team_member_form").attr("action", action_url);

                            $('.modal-title').text('Update Information');
                            $('.actionBtn').text('Update');
                            $('#team-member-modal').modal('show');

                        },

                        error: function(request, status, error) {
                        }
                    });
                });


                $('#team-member-table').on('click', '#deleteEducation', function(e) {

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
                                location.reload();
                                // $("#team-member-table").load(" #team-member-table > *");
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
