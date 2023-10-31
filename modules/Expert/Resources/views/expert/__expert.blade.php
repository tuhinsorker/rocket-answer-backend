    
    <div class="modal fade " id="myExpert"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    
        <div class="modal-dialog modal-xl">

            <form action="" method="POST" enctype="multipart/form-data" class="ajaxForm needs-validation expertForm" id="ajaxForm" novalidate="" data="showCallBackDataExpert" accept-charset="UTF-8">
      
                @csrf

                <input type="hidden" name="_method" value="" id="acmethodsExpert">
                <input type="hidden" name="expert_id" value="{{ @$expert->id }}" id="expert_id">

                <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                       
                        <div class="row">


                            <div class="col-md-6">

                                <div class="row">

                                    <div class="col-md-12">
                                        <label for="first_name" class="col-form-label fw-bold justify-content-start d-flex">First Name <i class="text-danger">*</i></label>
                                        <input type="text"  name="first_name" value="{{ @$expert->first_name }}" id="first_name" class="form-control" placeholder="First Name"  required>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="last_name" class="col-form-label fw-bold justify-content-start d-flex">Last Name<i class="text-danger">*</i></label>
                                        <input type="text"  name="last_name" value="{{ @$expert->last_name }}" id="last_name" class="form-control" placeholder="Last Name" required>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="display_name" class="col-form-label fw-bold justify-content-start d-flex">Display Name <i class="text-danger">*</i></label>
                                        <input type="text"  name="display_name" value="{{ @$expert->display_name }}" id="display_name" placeholder="Display Name" class="form-control"  >
                                    </div>


                                    <div class="col-md-12">
                                        <label for="phone" class="col-form-label fw-bold justify-content-start d-flex">Phone <i class="text-danger">*</i></label>
                                        <input type="text"  name="phone" value="{{ @$expert->phone }}" id="phone" class="form-control" placeholder="Phone Number"  required>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="dob" class="col-form-label fw-bold justify-content-start d-flex">Birth Date<i class="text-danger">*</i></label>
                                        <input type="date"  name="dob" id="dob" class="form-control" placeholder="Birth Date" required>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="expert_in_bio" class="col-form-label fw-bold justify-content-start d-flex">Expert In Bio </label>
                                        <input type="text"  name="expert_in_bio" id="expert_in_bio" class="form-control"  >
                                    </div>


                                </div>
                            </div>


                            <div class="col-md-6">

                                <div class="row">


                                    <div class="col-md-12" >
                                        <label for="gender" class="col-form-label fw-bold justify-content-start d-flex">Gender <i class="text-danger">*</i></label>

                                        <x-select2 name="gender" id="gender" >
                                            <option selected disabled value="">--{{ __('Select gender') }}--</option>
                                            <option value="1"> Male</option>
                                            <option value="2"> Female</option>
                                            <option value="3"> Others</option>
                                        </x-select2>
                                    </div>



                                    <div class="col-md-12">

                                        <label for="doc_type_id" class="col-form-label fw-bold justify-content-start d-flex">Category Id <i class="text-danger">*</i></label>

                                        <x-select2 name="category_id" id="category_id" onchange="getSubcategory()">
                                            <option selected disabled value="">--{{ __('Select Category') }}--</option>
                                            @foreach (Modules\Expert\Entities\ExpertCategory::all() as $category)
                                            <option value="{{ $category->id }}" >
                                                {{ $category->name }}
                                            </option>
                                            @endforeach
                                        </x-select2>

                                    </div>
                        
                                    <div class="col-md-12">
                                        
                                        <label for="sub_category_id" class="col-form-label fw-bold justify-content-start d-flex">Sub Cateogry Id</label>
                                        <x-select2 name="sub_category_id" id="sub_category_id" >
                                            <option selected disabled value="">--{{ __('Select Subcategory') }}--</option>
                                            @foreach (Modules\Expert\Entities\ExpertSubCategory::all() as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                            @endforeach
                                        </x-select2>

                                    </div>


                                    <div class="col-md-12" >
                                        <label for="country_id" class="col-form-label fw-bold justify-content-start d-flex">Country <i class="text-danger">*</i></label>
                                        <x-select2 name="country_id" id="country_id" >
                                            <option selected disabled value="">--{{ __('Select Country') }}--</option>
                                            @foreach ($countries as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                            @endforeach
                                        </x-select2>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="state" class="col-form-label fw-bold justify-content-start d-flex">State<i class="text-danger">*</i></label>
                                        <input type="text"  name="state" id="state" class="form-control" placeholder="State" required>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="zip_code" class="col-form-label fw-bold justify-content-start d-flex">Zip Code<i class="text-danger">*</i></label>
                                        <input type="text"  name="zip_code" id="zip_code" class="form-control" placeholder="Zip Code" required>
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="inactive" value="0">
                                            <label class="form-check-label" for="inactive">Inactive</label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="active" value="1">
                                            <label class="form-check-label" for="active">Active</label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="suspend" value="2">
                                            <label class="form-check-label" for="suspend">Suspend</label>
                                          </div>

                                    </div>


                                    <div class="col-md-12">
                                        <label for="image" class="col-form-label fw-bold justify-content-start d-flex">Profile Image<i class="text-danger">*</i></label>
                                        <input type="file"  name="image" id="image" class="form-control" >
                                        <input type="hidden"  name="image_old" id="image_old" class="form-control" >

                                    </div>

                                    
                                </div>
                            </div>

                            <fieldset class="mb-5 py-3 px-4 userinfo">
                                <legend>{{ __('User Information') }}:</legend>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="email" class="col-form-label fw-bold justify-content-start d-flex">Email <i class="text-danger">*</i></label>
                                        <input type="email"  name="email" value="{{ @$expert->email }}" id="email" class="form-control" placeholder="User Email Address" >
                                    </div>
                                    <div class="col-md-6 userpass">
                                        <label for="password" class="col-form-label fw-bold justify-content-start d-flex">Password <i class="text-danger">*</i></label>
                                        <input type="password"  name="password"  id="password" class="form-control" placeholder="******" >
                                    </div>
                                </div>
                            </fieldset>

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
