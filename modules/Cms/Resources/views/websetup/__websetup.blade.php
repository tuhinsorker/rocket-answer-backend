
<x-app-layout>
    <x-card>
        
        @php
            $setting = json_decode($CmsSetting?->details);
        @endphp

        <form action="{{route('cms.update-setup')}}"  method="POST" enctype="multipart/form-data" class="ajaxForm needs-validation" id="ajaxForm" novalidate="" data="showCallBackData" accept-charset="UTF-8">
            @csrf
            <input type="hidden" name="id" value="{{$CmsSetting?->id}}">
            <div class="row">
                <div class="card-body col-md-8">
                    <div class="row">

                        <div class="col-md-6">
                            <label class="col-form-label text-end fw-bold">Title: <span class="text-danger"> *</span></label>
                            <input type="text" name="title" class="form-control" required="1" value="{{@$setting->title}}">
                        </div>

                        <div class="col-md-6">
                            <label class="col-form-label text-end fw-bold">Email: <span class="text-danger"> *</span></label>
                            <input type="text" name="email" class="form-control" required="1" value="{{@$setting->email}}">
                        </div>

                        

                        <div class="col-md-6">
                            <label class="col-form-label text-end fw-bold">Copy Right: <span class="text-danger"> *</span></label>
                            <input type="text" name="copyright" class="form-control" value="{{@$setting->copyright}}">
                        </div>
                        
                        <div class="col-md-6">
                            <label class="col-form-label text-end fw-bold">Phone: <span class="text-danger"> *</span></label>
                            <input type="text" name="phone" class="form-control" required="1" value="{{@$setting->phone}}">
                        </div>
                        

                        <div class="col-md-6">
                            <label class="col-form-label text-end fw-bold">Footer Text: <span class="text-danger"> *</span></label>
                            <textarea name="footertext" class="form-control">{{@$setting->footertext}}</textarea>
                        </div> 

                        <div class="col-md-6">
                            <label class="col-form-label text-end fw-bold">Address: <span class="text-danger"> *</span></label>
                            <textarea name="address" class="form-control">{{@$setting->address}}</textarea>
                        </div> 

                        <div class="col-md-6">
                            <label class="col-form-label text-end fw-bold">Meta Tag: <span class="text-danger"> *</span></label>
                            <textarea name="metatag" class="form-control">{{@$setting->metatag}}</textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="col-form-label text-end fw-bold">Meta Description: <span class="text-danger"> *</span></label>
                            <textarea name="metadescription" class="form-control">{{@$setting->metadescription}}</textarea>
                        </div>
                        
                    </div>
                </div>


                <div class="card-body col-md-3">

                    <div class="row">
                        <div class="col-md-12">
                            <label class="col-form-label text-end fw-bold">Primary Web Logo : <span class="text-danger"> *</span></label>
                            <input type="file" name="weblogo" class="form-control" accept="image/*">
                            <input type="hidden" name="oldweblogo" value="{{ (@$setting->weblogo)}}" >
                            @if (@$setting->weblogo)
                            <img class="mt-2" src="{{ (@$setting->weblogo) ? url('/public/storage/'.@$setting->weblogo) : url('avatar.png') }}" alt="{{ @$setting->title }}" width="100px">
                            @endif
                        </div>

                        <div class="col-md-12">
                            <label class="col-form-label text-end fw-bold">Secondary Web Logo : <span class="text-danger"> *</span></label>
                            <input type="file" name="stikyweblogo" class="form-control" accept="image/*">
                            <input type="hidden" name="oldstikyweblogo" value="{{ (@$setting->stikyweblogo)}}" >
                            @if (@$setting->stikyweblogo)
                            <img class="mt-2" src="{{ (@$setting->stikyweblogo) ? url('/public/storage/'.@$setting->stikyweblogo) : url('avatar.png') }}" alt="{{ @$setting->title }}" width="100px">
                            @endif
                        </div>

                        <div class="col-md-12 ">
                            <label class="col-form-label text-end fw-bold">Favicon : <span class="text-danger"> *</span></label>
                            <input type="file" name="favicon" class="form-control" accept="image/*">
                            <input type="hidden" name="oldfavicon" value="{{ (@$setting->favicon)}}" >
                            <br>
                            @if (@$setting->favicon)
                                <img class="mt-2" src="{{ (@$setting->favicon) ? url('/public/storage/'.@$setting->favicon) : url('avatar.png') }}" alt="{{ @$setting->title }}" width="32px">
                            @endif
                        </div> 

                        <div class="col-md-12">
                            <label class="col-form-label text-end fw-bold">Footer Logo : <span class="text-danger"> *</span></label>
                            <input type="file" name="footerlogo" class="form-control" accept="image/*">
                            <input type="hidden" name="oldfooterlogo" value="{{ (@$setting->footerlogo)}}" >

                            @if (@$setting->footerlogo)
                            <img class="mt-2" src="{{ (@$setting->footerlogo) ? url('/public/storage/'.@$setting->footerlogo) : url('avatar.png') }}" alt="{{ @$setting->title }}" width="100px">
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer form-footer">
                <button type="submit" class="btn btn-primary btn-sm ">Update</button>
            </div>

        </form>

    </x-card>

        @push('js')
            <script>
                var showCallBackData = function() {
                    location.reload();
                }
            </script>
        @endpush
     
</x-app-layout>
     

