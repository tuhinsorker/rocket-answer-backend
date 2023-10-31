
    <div class="modal fade " id="team-member-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-md">

            <form action="" method="POST" enctype="multipart/form-data" class="ajaxForm needs-validation team_member_form" id="ajaxForm" novalidate="" data="showCallBackDataTeamMember" accept-charset="UTF-8">

                @csrf
                <input type="hidden" name="_method" value="" id="acmethodsEducation">

                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <input type="hidden" name="id" id="id">


                        <div class="row">

                            <div class="col-md-12">
                                <label for="degree" class="col-form-label fw-bold justify-content-start d-flex">Name <i class="text-danger">*</i></label>
                                <input type="text"  name="name" id="name" class="form-control" placeholder="Name"  required>
                            </div>
                            <div class="col-md-12">
                                <label for="designation" class="col-form-label fw-bold justify-content-start d-flex">Designation <i class="text-danger">*</i></label>
                                <input type="text"  name="designation" id="designation" class="form-control" placeholder="designation"  required>
                            </div>

                            <div class="col-md-12 mt-3">

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_active" id="in_active" value="0">
                                    <label class="form-check-label" for="inactive">Inactive</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_active" id="active" value="1">
                                    <label class="form-check-label" for="active">Active</label>
                                  </div>

                            </div>


                            <div class="col-md-12">
                                <label for="profile" class="col-form-label fw-bold justify-content-start d-flex">Profile Profile<i class="text-danger">*</i></label>
                                <input type="file"  name="profile" id="profile" class="form-control" >
                                {{-- <input type="hidden"  name="profile_old" id="profile_old" class="form-control" > --}}

                            </div>

                            <div class="col-md-12">
                                <label for="facebook" class="col-form-label fw-bold justify-content-start d-flex">Facebook<i class="text-danger">*</i></label>
                                <input type="text"  name="fb" id="fb" class="form-control" placeholder="Facebook URL" required>
                            </div>

                            <div class="col-md-12">
                                <label for="twitter" class="col-form-label fw-bold justify-content-start d-flex">twitter<i class="text-danger">*</i></label>
                                <input type="text"  name="twitter" id="twitter" class="form-control" placeholder="Twitter URL" required>
                            </div>

                            <div class="col-md-12">
                                <label for="linkedin" class="col-form-label fw-bold justify-content-start d-flex">Linkedin<i class="text-danger">*</i></label>
                                <input type="text"  name="linkedin" id="linkedin" class="form-control" placeholder="Linkedin URL" required>
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
