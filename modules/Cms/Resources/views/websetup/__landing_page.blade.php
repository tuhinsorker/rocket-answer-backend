

<x-app-layout>
    <x-card>
        
                @php
                    $setting = json_decode($CmsSetting?->details);
                @endphp

                <form action="{{route('cms.landing-page-setup-update')}}"  method="POST" enctype="multipart/form-data" class="ajaxForm needs-validation" id="ajaxForm" novalidate="" data="showCallBackData" accept-charset="UTF-8">
                    @csrf
                    <input type="hidden" name="id" value="{{$CmsSetting?->id}}">
                    <div class="row">
                        <div class="card-body col-md-8">

                            <fieldset>
                                <legend>Landing Header</legend>
                                <div class="row">

                                    <div class="col-md-6">
                                        <label class="col-form-label text-end fw-bold">{{__("Head Text")}}: </label>
                                        <input type="text" name="head_text" class="form-control" required="1" value="{{@$setting->head_text}}">
                                    </div>
    
                                    <div class="col-md-6">
                                        <label class="col-form-label text-end fw-bold">{{__("Head Description")}}: </label>
                                        <input type="text" name="head_description" class="form-control" required="1" value="{{@$setting->head_description}}">
                                    </div>
    
                                    <div class="col-md-6">
                                        <label class="col-form-label text-end fw-bold">{{__("Button Text")}}: </label>
                                        <input type="text" name="head_button_text" class="form-control" value="{{@$setting->head_button_text}}">
                                    </div>
                                    
    
                                    <div class="col-md-6">
                                        <label class="col-form-label text-end fw-bold">{{__("Head Bg Image")}}: </label>
                                        <input type="file" name="head_bg_img" class="form-control">
                                        <input type="hidden" name="head_bg_img_old" class="form-control" value="{{@$setting->head_bg_img}}">
                                        @if (@$setting->head_bg_img)
                                            <img src="{{ asset('storage/'.$setting->head_bg_img) }}" style="width:128px"> 
                                        @endif
                                        
                                    </div> 
    
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>Top Expet Section</legend>
                                <div class="row">

                                    <div class="col-md-6">
                                        <label class="col-form-label text-end fw-bold">{{__("Head Text")}}: </label>
                                        <input type="text" name="top_head_text" class="form-control" required="1" value="{{@$setting->top_head_text}}">
                                    </div>
    
                                    <div class="col-md-6">
                                        <label class="col-form-label text-end fw-bold">{{__("Head Description")}}: </label>
                                        <input type="text" name="top_head_description" class="form-control" required="1" value="{{@$setting->top_head_description}}">
                                    </div>
    
                                </div>
                            </fieldset>


                            <fieldset>
                                <legend>How To Work Section</legend>
                                <div class="row">

                                    <div class="col-md-6">
                                        <label class="col-form-label text-end fw-bold">{{__("Head Text")}}: </label>
                                        <input type="text" name="to_work_head_text" class="form-control" required="1" value="{{@$setting->to_work_head_text}}">
                                    </div>
    
                                    <div class="col-md-6">
                                        <label class="col-form-label text-end fw-bold">{{__("Head Description")}}: </label>
                                        <input type="text" name="to_word_head_description" class="form-control" required="1" value="{{@$setting->to_word_head_description}}">
                                    </div>


                                    {{-- <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="col-form-label text-end fw-bold">{{__("Head Description")}}: </label>
                                                <input type="text" name="to_word_head_description" class="form-control" required="1" value="{{@$setting->to_word_head_description}}">
                                            </div>
                                            <div class="col-md-12">
                                                <label class="col-form-label text-end fw-bold">{{__("Head Description")}}: </label>
                                                <input type="text" name="to_word_head_description" class="form-control" required="1" value="{{@$setting->to_word_head_description}}">
                                            </div>
                                            <div class="col-md-12">
                                                <label class="col-form-label text-end fw-bold">{{__("Head Description")}}: </label>
                                                <input type="text" name="to_word_head_description" class="form-control" required="1" value="{{@$setting->to_word_head_description}}">
                                            </div>
                                        </div>
                                    </div> --}}
    
                                    

                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>Testimonial Section</legend>
                                <div class="row">

                                    <div class="col-md-6">
                                        <label class="col-form-label text-end fw-bold">{{__("Head Text")}}: </label>
                                        <input type="text" name="testimonial_head_text" class="form-control" required="1" value="{{@$setting->testimonial_head_text}}">
                                    </div>
    
                                    <div class="col-md-6">
                                        <label class="col-form-label text-end fw-bold">{{__("Head Description")}}: </label>
                                        <input type="text" name="testimonial_head_description" class="form-control" required="1" value="{{@$setting->testimonial_head_description}}">
                                    </div>
    
                                </div>
                            </fieldset>


                            <fieldset>
                                <legend>How To Get Started Section</legend>
                                <div class="row">

                                    <div class="col-md-6">
                                        <label class="col-form-label text-end fw-bold">{{__("Head Text")}}: </label>
                                        <input type="text" name="get_start_head_text" class="form-control" required="1" value="{{@$setting->get_start_head_text}}">
                                    </div>
    
                                    <div class="col-md-6">
                                        <label class="col-form-label text-end fw-bold">{{__("Head Description")}}: </label>
                                        <input type="text" name="get_start_head_description" class="form-control" required="1" value="{{@$setting->get_start_head_description}}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="col-form-label text-end fw-bold">{{__("Button Text")}}: </label>
                                        <input type="text" name="get_start_button_text" class="form-control" value="{{@$setting->get_start_button_text}}">
                                    </div>
    
                                    <div class="col-md-6">
                                        <label class="col-form-label text-end fw-bold">{{__("Image")}}: </label>
                                        <input type="file" name="get_start_img" class="form-control" value="{{@$setting->get_start_img}}">
                                        <input type="hidden" name="get_start_img_old" class="form-control" value="{{@$setting->get_start_img}}">

                                        @if (@$setting->get_start_img)
                                            <img src="{{ asset('storage/'.$setting->get_start_img) }}" style="width:128px"> 
                                        @endif
                                    </div> 

                                    <div class="col-md-6">
                                        <label class="col-form-label text-end fw-bold">{{__("Video Url")}}: </label>
                                        <input type="text" name="get_start_video_url" class="form-control" value="{{@$setting->get_start_video_url}}">
                                    </div>
    
                                </div>
                            </fieldset>



                            
                            <fieldset>
                                <legend>App Ad Section</legend>
                                <div class="row">

                                    <div class="col-md-6">
                                        <label class="col-form-label text-end fw-bold">{{__("Head Text")}}: </label>
                                        <input type="text" name="app_head_text" class="form-control" required="1" value="{{@$setting->app_head_text}}">
                                    </div>
    
                                    <div class="col-md-6">
                                        <label class="col-form-label text-end fw-bold">{{__("Head Description")}}: </label>
                                        <input type="text" name="app_head_description" class="form-control" required="1" value="{{@$setting->app_head_description}}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="col-form-label text-end fw-bold">{{__("Google PlayStore Button Link")}}: </label>
                                        <input type="text" name="gpstore_button_link" class="form-control" value="{{@$setting->gpstore_button_link}}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="col-form-label text-end fw-bold">{{__("AppStore Button Link")}}: </label>
                                        <input type="text" name="app_store_button_link" class="form-control" value="{{@$setting->app_store_button_link}}">
                                    </div>
    
                                    <div class="col-md-6">
                                        <label class="col-form-label text-end fw-bold">{{__("Image")}}: </label>
                                        <input type="file" name="app_img" class="form-control" value="{{@$setting->app_img}}">
                                        <input type="hidden" name="app_img_old" class="form-control" value="{{@$setting->app_img}}">

                                        @if (@$setting->app_img)
                                            <img src="{{ asset('storage/'.$setting->app_img) }}" style="width:128px"> 
                                        @endif
                                    </div> 


    
                                </div>
                            </fieldset>



                        </div>

                    </div>

                    <div class="card-footer form-footer">
                        <button type="submit" class="btn btn-primary btn-sm ">{{__("Update")}}</button>
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

