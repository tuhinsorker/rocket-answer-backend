<x-app-layout>
    <x-card>
        <x-slot name='actions'>
            <a href="javascript:void(0)" class="btn btn-success btn-sm" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                 <i class="fas fa-filter"></i>&nbsp; {{ __('Filter') }}
            </a> 
            <a href="{{route('cms.posts.create')}}" class="btn btn-success btn-sm">
                <i class="fa fa-plus-circle"></i>&nbsp;
                {{ __('Add Post') }}
            </a>
        </x-slot>

        <x-filter-layout>

            <div class="col-md-3">
                <x-select2 name="category_id" id="" >
                    <option selected disabled>--{{ __('Select Category') }}--</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->category_name }}
                    </option>
                    @endforeach
                </x-select2>
            </div>
    
        </x-filter-layout>

        <x-data-table :dataTable="$dataTable"/>


    </x-card>

    <script>

        function postStatusUpdate(t, s, a) {

        axios
            .post(t, { status: a, id: s })
            .then((t) => {
                if (t.data.message) {

                    // console.log(t.data.data.status);

                    if(t.data.data.status == 0){
                        $("#status_button_"+s).html('Inctive');
                        
                        $("#status_button_"+s).removeClass('btn-success');
                        $("#status_button_"+s).addClass("btn-warning");
                    
                    }
                    if(t.data.data.status == 1){
                        $("#status_button_"+s).html('Active');

                        $("#status_button_"+s).removeClass("btn-warning");
                        $("#status_button_"+s).addClass('btn-success');
                    }

                    toastr.success(t.data.message, "Success");
                } else {
                    toastr.success("Page Status Successfully Updated.");
                }
            })
            .catch((err) => {
                $("#status_id_" + s).val(a);
                if (err.response.data.message) {
                    toastr.error(err.response.data.message, "Error");
                } else {
                    toastr.error("Failed to Update Page Status");
                }
            });
        }

    </script>

</x-app-layout>


