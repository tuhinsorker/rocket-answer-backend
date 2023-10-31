<x-app-layout>
    <x-card>
        <x-slot name='actions'>
            <a href="{{ route(config('theme.rprefix').'.index') }}" class="btn btn-success btn-sm"><i
                    class="fa fa-list"></i>&nbsp;{{ __('Customer List') }}</a>
        </x-slot>
        <div class="row" style="padding: 50px 0">
            {{-- {{ isset($item)?dd($item):null }} --}}
            <div class="col-sm-12">
                <form enctype="multipart/form-data"
                    action="{{ isset($item)?route(config('theme.rprefix').'.update',$item->id):route(config('theme.rprefix').'.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @isset($item)
                    @method('PUT')
                    @endisset
                    <hr>
                    <fieldset class="mb-5 py-3 px-4 ">
                        <legend>{{ __('Customer Info') }}:</legend>
                        <div class=" row">
                            <div class="col-md-6">
                                <div class="form-group pt-1 pb-1">
                                    <label for="name" class="font-black">{{ __('Name') }}</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="{{ __('Enter Name') }}"
                                        value="{{ isset($item)?$item->name:old('name') }}" required>
                                    @error('name')
                                    <p class="text-danger pt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                           
                            <div class="col-md-6">
                                <div class="form-group pt-1 pb-1">
                                    <label for="phone" class="font-black">{{ __('Phone') }}</label>
                                    <input type="number" class="form-control arrow-hidden" name="phone" id="phone"
                                        placeholder="{{ __('Enter phone') }}"
                                        value="{{ isset($item)?$item->phone:old('phone') }}" required>
                                    @error('phone')
                                    <p class="text-danger pt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group pt-1 pb-1">
                                    <label for="dob" class="font-black">{{ __('Date of Birth') }}</label>
                                    <input type="date" class="form-control arrow-hidden" name="dob" id="dob"
                                        placeholder="{{ __('Enter your Birth Date') }}"
                                        value="{{ isset($item)?$item->dob:old('dob') }}" required>
                                    @error('gender')
                                    <p class="text-danger pt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group pt-1 pb-1">
                                    <label for="country_id" class="font-black">{{ __('Country') }}</label>
                                    <select class="form-control show-tick" name="country_id" id="country_id" required>
                                        <option selected disabled>--{{ __('Select Country') }}--</option>
                                        @foreach (Modules\Customer\Entities\Customers::getCountryList() as $country)
                                        <option value="{{ $country->id }}" {{isset($item)?selected($item->country_id,$country->id):null}}>
                                            {{ $country->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('gender')
                                    <p class="text-danger pt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 py-1">
                                <div class="form-group pt-1 pb-1">
                                    <label for="address" class="font-black">{{ __('Address') }}</label>
                                    <textarea name="address" id="address" class="form-control"
                                        placeholder="{{ __('Enter your address') }}" style="min-height: 80px;"
                                        >{{ isset($item)?$item->address:old('address') }}</textarea>
                                    @error('address')
                                    <p class="text-danger pt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 pt-1 pb-1">
                                <div class="form-group">
                                    <label for="avatar" class="font-black">{{ __('Avatar') }}</label>
                                    <input type="file" class="form-control" name="avatar" id="avatar"
                                        onchange="get_img_url(this, '#avatar_image');"
                                        placeholder="{{ __('Select avatar image') }}">
                                    <img id="avatar_image" src="{{ isset($item)?URL::to('storage').'/'.$item->image:'' }}"
                                        width="120px" class="mt-1">
                                    @error('avatar')
                                    <p class="text-danger pt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group pt-1 pb-1">
                                    <label for="email" class="font-black">{{ __('Email') }}</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="{{ __('Enter Email') }}"
                                        value="{{ isset($item)?$item->email:old('email') }}" required>
                                    @error('email')
                                    <p class="text-danger pt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            @if (@$item->user_id=='')

                                <div class="col-md-6">
                                    <div class="form-group pt-1 pb-1">
                                        <label for="dob" class="font-black">{{ __('Password') }}</label>
                                        <input type="password" class="form-control arrow-hidden" name="password" id="password"
                                            placeholder="{{ __('*******') }}" required>
                                        @error('password')
                                        <p class="text-danger pt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                
                            @endif
                            
                            
                            <br><br>

                            {{-- --}}
                            <div class="col-md-12 ">
                                <div class="form-group pt-5 pb-1">
                                    <button type="submit" class="btn btn-success btn-round">
                                        {{ isset($item)?'Update':'Save' }}
                                    </button>
                                </div>
                            </div>
                            
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </x-card>
</x-app-layout>