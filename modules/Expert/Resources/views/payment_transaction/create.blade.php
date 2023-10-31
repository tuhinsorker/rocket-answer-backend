<x-app-layout>
    <x-card>

        <div class="row">
            <div class="col-sm-12">
                <form enctype="multipart/form-data"
                    action="{{ route(config('theme.rprefix').'.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf

                    <fieldset class="mb-5 py-3 px-4 ">
                        <legend>{{ __('Payment Transaction Info') }}:</legend>
                        <div class=" row">
                            <div class="col-md-6">
                                <div class="form-group pt-1 pb-1">
                                    <label for="expert_id" class="font-black">{{ __('Expert') }}</label>
                                    <input readonly type="text" class="form-control" expert_id="expert_id" id="expert_id"
                                        placeholder="{{ __('Expert') }}"
                                        value="{{ $item->expert?->full_name}}" >
                                    @error('expert_id')
                                    <p class="text-danger pt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group pt-1 pb-1">
                                    <label for="amount" class="font-black">{{ __('Amount') }}</label>
                                    @form_hidden('withdraw_request_id', request()->route()->parameter('withdraw_request_id'))
                                    <input readonly type="number" class="form-control arrow-hidden" name="amount" id="amount"
                                        placeholder="{{ __('Amount') }}"
                                        value="{{ $item->request_amount}}" required>
                                    @error('amount')
                                    <p class="text-danger pt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 pt-1">
                                <div class="form-group">
                                    <label for="attachment" class="font-black col-form-label fw-semi-bold">{{ __('Attachment') }}</label>
                                    <input  type="file" class="form-control" name="attachment" id="attachment"
                                        onchange="get_img_url(this, '#avatar_image');"
                                        placeholder="{{ __('Select attachment image') }}">
                                    {{-- <img id="avatar_image" src="{{ isset($item)?URL::to('storage').'/'.$item->image:'' }}"
                                        width="120px" class="mt-1"> --}}
                                    @error('attachment')
                                    <p class="text-danger pt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 pt-1">
                                <div class="form-group">
                                    <label for="transaction_date" class="font-black col-form-label fw-semi-bold">{{ __('Transaction Date') }}<span class="text-danger">*</span></label>
                                    <input  type="date" class="form-control" name="payment_date" >
                                    @error('payment_date')
                                    <p class="text-danger pt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 pt-1">
                                <div class="form-group">
                                    <label for="method" class="font-black col-form-label fw-semi-bold">{{ __('Transaction Method') }} <span class="text-danger">*</span></label>
                                    <select class="form-control" name="payment_method_id">
                                        @foreach ($payment_methods as $item)
                                            <option value="{{ $item->id }}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('payment_method_id')
                                    <p class="text-danger pt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 pt-1">
                                <div class="form-group">
                                    <label for="name" class="font-black col-form-label fw-semi-bold">
                                        {{ __('Transaction Email') }}
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="{{ __('PayPal email') }} "
                                            autocomplete="off" required>
                                    
                                </div>
                            </div>
                            
                            <br><br>


                            {{-- --}}
                            <div class="col-md-12 ">
                                <div class="form-group pt-5 pb-1">
                                    <button type="submit" class="btn btn-success btn-round">{{ __('Submit') }}</button>
                                </div>
                            </div>

                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </x-card>

    @push('lib-styles')
    <link href="{{ admin_asset('vendor/select2/dist/css/select2.css') }}" rel="stylesheet" type="text/css" />
    @endpush
    @push('lib-scripts')
    <script src="{{ admin_asset('vendor/select2/dist/js/select2.js') }}"></script>
    @endpush
    @push('js')
    hello world
    <script src="{{ module_asset('js/expert/index.js') }}"></script>
    @endpush
</x-app-layout>
