<x-app-layout>
    <x-card>

        <x-slot name='actions'>
            <a href="{{ route(config('theme.rprefix').'.customer_subscription') }}" class="btn btn-success btn-sm"><i
                    class="fa fa-list"></i>&nbsp;{{ __('Subscription List') }}</a>
        </x-slot>

        <div class="row" style="padding: 50px 0">
            {{-- {{ isset($item)?dd($item):null }} --}}
            <div class="col-sm-12">
                    
                <fieldset class="mb-5 py-3 px-4 ">
                    <legend>{{ __('Subscription Info') }}:</legend>
                    <div class=" row">
                        <div class="col-md-4">
                            <div class="form-group pt-1 pb-1">
                                <label for="name" class="font-black">{{ __('Invoice No') }}</label>
                                <input type="text" class="form-control" value="{{ isset($customer_subscription)?$customer_subscription->invoice_id:"" }}" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group pt-1 pb-1">
                                <label for="name" class="font-black">{{ __('Customer Name') }}</label>
                                <input type="text" class="form-control" value="{{ isset($customer_subscription->customer->name)?$customer_subscription->customer->name:"" }}" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group pt-1 pb-1">
                                <label for="name" class="font-black">{{ __('Email') }}</label>
                                <input type="text" class="form-control" value="{{ isset($customer_subscription->customer->email)?$customer_subscription->customer->email:"" }}" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group pt-1 pb-1">
                                <label for="name" class="font-black">{{ __('Package Name') }}</label>
                                <input type="text" class="form-control" value="{{ isset($customer_subscription->package->title)?$customer_subscription->package->title:"" }}" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group pt-1 pb-1">
                                <label for="name" class="font-black">{{ __('Price') }}</label>
                                <input type="text" class="form-control" value="{{ isset($customer_subscription->price)?$customer_subscription->price:"" }}" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group pt-1 pb-1">
                                <label for="name" class="font-black">{{ __('Invoice Date') }}</label>
                                <input type="text" class="form-control" value="{{ isset($customer_subscription->invoice_date)?$customer_subscription->invoice_date:"" }}" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group pt-1 pb-1">
                                <label for="name" class="font-black">{{ __('Remaining Days') }}</label>
                                <input type="text" class="form-control" value="{{ isset($remaining_days)?$remaining_days:0 }}" readonly>
                            </div>
                        </div>

                        <br><br>

                        {{-- --}}
                        <div class="col-md-12 ">
                            <div class="form-group pt-5 pb-1">
                                <a href="{{back_url()}}" class="btn btn-warning btn-round">{{ __('Back') }}</a>
                            </div>
                        </div>
                        
                    </div>
                </fieldset>
            </div>
        </div>
    </x-card>
</x-app-layout>