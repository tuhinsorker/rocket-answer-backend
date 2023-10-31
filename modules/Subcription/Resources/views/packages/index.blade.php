
<x-app-layout>
    <x-card>

        <x-slot name='actions'>
            <a href="{{ route('packages.create') }}" class="btn btn-success btn-sm"><i class="fa fa-list"></i>&nbsp;{{ __('Create New Package') }}</a>
        </x-slot>

       


                
                        <div class="row mb-4">
                            
                            @foreach($mpackages as $key => $package)

                            <div class="col-sm-6 col-lg-4 col-xl-3">
                              <div class="pricing">
                                <div class="plan">
                                  <header>
                                    <h4 class="plan-title">{{$package->title}}</h4>
                                    <div class="plan-cost">
                                        <span class="plan-price">${{$package->price-@$package->offer_discount}}</span>
                                        @if ($package->offer_discount>0)
                                        <span class="info">${{$package->price}}</span>
                                        @endif
                                        <br>
                                        {{-- <span class="info">100</span> --}}
                                    </div>
                                  </header>

                                  <ul class="features">
                                    <li class="true">{{$package->duration}} days continue this package</li>
                                    <li class="true">{{$package->service_number}} service will get from this package</li>
                                    <li class="true">{{@$package?->category?->name}} (Expert Category)</li>
                                    {{-- <li class="false">Free Contacts</li> --}}
                                  </ul>

                                  <span class="badge bg-{{$package->status?'success':'danger'}}"> {{$package->status?'Active':'Inactive'}}</span><br/><br/>

                                  <div class="plan-select">
                                  
                                    <a href="{{ route('packages.edit', $package->id) }}"><i class="typcn typcn-edit"></i></a>
                                    <a href="{{ route('packages.delete', $package->id) }}"><i class="typcn typcn-trash"></i></a>
                                  </div>
                                  

                                </div>
                              </div>
                            </div>

                            @endforeach
    
                        </div>
                  
            
    </x-card>

</x-app-layout>



