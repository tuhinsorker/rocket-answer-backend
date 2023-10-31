
<x-app-layout>
    <x-card>
        
        @php
            $link = json_decode($CmsSetting?->details);
        @endphp


            <form action="{{route('cms.update-social-link')}}"  method="POST" enctype="multipart/form-data" class="ajaxForm needs-validation" id="ajaxForm" novalidate="" data="showCallBackData" accept-charset="UTF-8">
                @csrf
                <input type="hidden" name="id" value="{{$CmsSetting?->id}}">
                <div class="row">
                    <div class="card-body col-md-8">
                        <div class="row">

                            <div class="col-md-6">
                                <label class="col-form-label text-end fw-bold">Facebook: </label>
                                <input type="link" name="facebook" class="form-control" required="1" value="{{@$link->facebook}}">
                            </div>

                            <div class="col-md-6">
                                <label class="col-form-label text-end fw-bold">Twitter: </label>
                                <input type="link" name="twitter" class="form-control" required="1" value="{{@$link->twitter}}">
                            </div>

                            <div class="col-md-6">
                                <label class="col-form-label text-end fw-bold">Github: </label>
                                <input type="link" name="github" class="form-control" value="{{@$link->github}}">
                            </div>
                            

                            <div class="col-md-6">
                                <label class="col-form-label text-end fw-bold">Dribbble: </label>
                                <input type="link" name="dribbble" class="form-control" value="{{@$link->dribbble}}">
                            </div> 

                            <div class="col-md-6">
                                <label class="col-form-label text-end fw-bold">Instagram: </label>
                                <input type="link" name="instagram" class="form-control" value="{{@$link->instagram}}">
                            </div>

                            <div class="col-md-6">
                                <label class="col-form-label text-end fw-bold">Linkedin: </label>
                                <input type="link" name="linkedin" class="form-control" value="{{@$link->linkedin}}">
                            </div>

                            <div class="col-md-6">
                                <label class="col-form-label text-end fw-bold">Youtube: </label>
                                <input type="link" name="youtube" class="form-control" value="{{@$link->youtube}}">
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



