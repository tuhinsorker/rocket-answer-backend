
<x-app-layout>
    <x-card>

        <x-slot name='actions'>
            <a href="{{ route('packages.index') }}" class="btn btn-success btn-sm"><i class="fa fa-list"></i>&nbsp;{{ __('Package List') }}</a>
        </x-slot>

        <div class="card">
            <form action="{{ @$package ? route('packages.update',$package->id) : route('packages.store') }}" method="POST">
                @csrf
                @if(@$package)
                    @method('PATCH')
                @endif

                
                <div class="card-body row">
                    <div class="card col-md-6 row">

                        <div class="card-header">
                            <h5 style="font-weight:bold">Package</h5>
                        </div>

                        <div class="card-body">

                                <div class="mt-3 row">
                                    <label for="title" class="col-sm-3 col-form-label fw-semi-bold">Title<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="title" id="title" value="{{ @$package->title }}" placeholder="Enter Title">
                                        @if($errors->has('title'))
                                        <div class="error text-danger">{{$errors->first('title')}}</div>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="mt-3 row">
                                    <label for="price" class="col-sm-3 col-form-label">Price<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="number" min="0" id="price"  name="price" value="{{ @$package->price }}" placeholder="Enter Price">
                                        @if($errors->has('price'))
                                        <div class="error text-danger">{{ $errors->first('price') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="mt-3 row">
                                    <label for="duration" class="col-sm-3 col-form-label">Duration<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="number" min="0" id="duration"  name="duration" value="{{ @$package->duration }}" placeholder="Enter duration">
                                        @if($errors->has('duration'))
                                        <div class="error text-danger">{{ $errors->first('duration') }}</div>
                                        @endif
                                        <span class="text-danger">How many days continue this package?</span>
                                    </div>
                                </div>

                                <div class="mt-3 row">
                                    <label for="service_number" class="col-sm-3 col-form-label">Services<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="number" min="0" id="service_number"  name="service_number" value="{{ @$package->service_number }}" placeholder="Enter service number">
                                        @if($errors->has('service_number'))
                                        <div class="error text-danger">{{ $errors->first('service_number') }}</div>
                                        @endif
                                        <span class="text-danger">How many service will get from this package?</span>
                                    </div>
                                    
                                </div>

                                <div class="mt-3 row">
                                    <label for="title" class="col-sm-3 col-form-label fw-semi-bold">Expert Category : <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">

                                        @foreach($categories as $category)
                                            <div class="form-check form-check-inline" style="margin-top: 10px">
                                     

                                                @if (@$package?->expert_categories_id)
                                                        @if(in_array($category->id, json_decode($package->expert_categories_id)))
                                                            <input class="form-check-input cc" name="expert_categories_id[]" checked  type="checkbox" id="mid_{{ $category->id }}" value="{{ $category->id }}">
                                                        @else
                                                            <input class="form-check-input cc" name="expert_categories_id[]"  type="checkbox" id="mid_{{ $category->id }}" value="{{ $category->id }}">
                                                        @endif
                                                    @else
                                                    <input class="form-check-input cc" name="expert_categories_id[]"  type="checkbox" id="mid_{{ $category->id }}" value="{{ $category->id }}">
                                                @endif
                                                
                                                <label class="form-check-label" for="mid_{{ $category->id }}">{{ @$category->name }}</label>
                                            </div>
                                        @endforeach 
                                        
                                        {{-- <select class="form-control show-tick" name="expert_categories_id" id="expert_categories_id" required>
                                            <option selected disabled>--{{ __('Select cetagory') }}--</option>
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}" {{$item->id==@$package->expert_categories_id?'selected':''}}> {{ $item->name }}</option>
                                            @endforeach
                                        </select> --}}
                                    </div>
                                </div>

                                <div class="mt-3 row">
                                    <label for="gio_long" class="col-sm-3 col-form-label fw-semi-bold "> Status </label>
                                    <div class="col-sm-8 mt-2">
                                        <div class="form-check">
                                            <input type="checkbox" name="status" id="status" value="1" class="form-check-input" {{ @$package->status == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="status">Is Package Active</label>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>


                    <div class="card col-md-6 row">
                            <div class="card-header">
                                <h5 style="font-weight:bold">Package Offer</h5>
                            </div>
                            <div class="card-body">
                                <div class="mt-3 row">
                                    <label for="title" class="col-sm-3 col-form-label fw-semi-bold">Offer Title</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="offer" id="offer_title" value="{{ @$package->offer }}" placeholder="Enter Offer Title">
                                    </div>
                                </div>
                                <div class="mt-3 row">
                                    <label for="price" class="col-sm-3 col-form-label">Offer Price</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="number" name="offer_price" id="offer_price" value="{{ @$package->offer_price }}" placeholder="Enter Offer Price">
                                    </div>
                                </div>
                                <div class="mt-3 row">
                                    <label for="duration" class="col-sm-3 col-form-label">Offer Discount</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="number" name="offer_discount" value="{{ @$package->offer_discount }}" placeholder="Enter Offer Discount">
                                    </div>
                                </div>
                                
                                <div class="mt-3 row">
                                    <label for="duration" class="col-sm-3 col-form-label">Offer Start Date <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="date"  id="example-date-input" name="offer_start_date" value="{{ @$package->offer_start_date }}" placeholder="Enter Offer Duration">
                                        @if($errors->has('offer_start_date'))
                                            <div class="error text-danger">{{ $errors->first('offer_start_date') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="mt-3 row">
                                    <label for="duration" class="col-sm-3 col-form-label">Offer Duration</label>
                                    <div class="col-sm-8">
                                        <input min="1"  class="form-control" type="number" name="offer_duration" value="{{ @$package->offer_duration }}" placeholder="Enter Offer Duration">
                                        <span class="text-danger">How many days continue this offer?</span>
                                    </div>
                                </div>

                                <div class="mt-3 row">
                                    <label for="gio_long" class="col-sm-3 col-form-label fw-semi-bold"> </label>
                                    <div class="col-sm-8">
                                        <div class="form-check">
                                            <input type="checkbox" name="offer_status" id="offer_status" value="1" class="form-check-input" {{ @$package->offer_status == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="offer_status">Is Offer Active</label>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

    </x-card>
</x-app-layout>

