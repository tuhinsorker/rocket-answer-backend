<x-app-layout>
    <x-card>

        <div class="row justify-content-center">
            <div class="col-6">
                <form action="{{route('admin.setting.default-payment.update',$setup->id)}}" class="needs-validation" id="create-creativity-level-form" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    <fieldset >
                        <legend>Payment Information</legend>
                            <div class=" form-group mb-3 mx-0 pb-3 row">
                                <label for="name" class="col-lg-3 col-form-label ps-0 ">
                                    {{ __('Initial Payment') }}
                                </label>
                                <div class="col-lg-9 p-0">
                                    <input type="number" class="form-control" name="payment_amount" value="{{$setup->payment_amount}}" id="pay_amount" placeholder="{{ __('Initial Payment') }} "
                                        autocomplete >
                                        <span>In amount</span>
                                </div>
                            </div>

                            <div class=" form-group mb-3 mx-0 pb-3 row">
                                <label for="name" class="col-lg-3 col-form-label ps-0 ">
                                    {{ __('Payment Rate') }}
                                </label>
                                <div class="col-lg-9 p-0">
                                    <input type="number" class="form-control" name="second_pay_amount" value="{{$setup->second_pay_amount}}" id="second_pay_amount" placeholder="{{ __('Second Payment Rate') }} "
                                        autocomplete >
                                        <span>In amount</span>
                                </div>
                            </div>

                            <div class=" form-group mb-3 mx-0 pb-3 row">
                                <label for="name" class="col-lg-3 col-form-label ps-0 ">
                                    {{ __('Payment Rating Range') }}
                                </label>
                                <div class="col-lg-9 p-0 ">
                                    <select class="form-control " name="rating_range" id="rating_range" required>
                                        <option selected disabled>--{{ __('Payment Rating Range') }}--</option>
                                        <option value="5" {{$setup->rating_range=='5'?'selected':''}}>5-5</option>
                                        <option value="4.5" {{$setup->rating_range=='4.5'?'selected':''}}>5-4.5</option>
                                        <option value="4" {{$setup->rating_range=='4'?'selected':''}}>5-4</option>
                                        <option value="3.5" {{$setup->rating_range=='3.5'?'selected':''}}>5-3.5</option>
                                        <option value="3" {{$setup->rating_range=='3'?'selected':''}}>5-3</option>
                                        <option value="2.5" {{$setup->rating_range=='2.5'?'selected':''}}>5-2.5</option>
                                        <option value="2" {{$setup->rating_range=='2'?'selected':''}}>5-2</option>
                                        <option value="1.5" {{$setup->rating_range=='1.5'?'selected':''}}>5-1.5</option>
                                        <option value="1" {{$setup->rating_range=='1'?'selected':''}}>5-1</option>
                                    </select>
                                    @error('gender')
                                    <p class="text-danger pt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                    </fieldset>

                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit">{{ __('Update') }}</button>
                    </div>
                </form>
            </div>
        </div>

    </x-card>





</x-app-layout>


