<x-app-layout>
    <x-card>
        <x-slot name='actions'>
            <a href="{{ route(config('theme.rprefix').'.create') }}" class="btn btn-success btn-sm">
                <i class="fa fa-plus-circle"></i>&nbsp;
                {{ __('Add Customer') }}
            </a>
        </x-slot>

        <div>
            <x-data-table :dataTable="$dataTable" />
        </div>
    </x-card>

</x-app-layout>

<script>

// function cusotmerStatusUpdate(t, s, a) {
//     axios
//         .post(t, { status: $("#status_id_" + s).val() })
//         .then((t) => {
//             if (t.data.message) {
//                 toastr.success(t.data.message, "Success");
//             } else {
//                 toastr.success("Customer Status Successfully Updated.");
//             }
//         })
//         .catch((err) => {
//             $("#status_id_" + s).val(a);
//             if (err.response.data.message) {
//                 toastr.error(err.response.data.message, "Error");
//             } else {
//                 toastr.error("Failed to Update User Status");
//             }
//         });
// }

function cusotmerStatusUpdate(t, s, a) {
    axios
        .post(t, { status: a })
        .then((t) => {
            if (t.data.message) {

                // console.log(t.data.data.status);

                if(t.data.data.status == 0){
                    $("#status_button_"+s).html('Suspended');

                    $("#status_button_"+s).removeClass("btn-success");
                    $("#status_button_"+s).removeClass("btn-warning");

                    $("#status_button_"+s).addClass('btn-danger');
                }
                if(t.data.data.status == 1){
                    $("#status_button_"+s).html('Pending');

                    $("#status_button_"+s).removeClass("btn-success");
                    $("#status_button_"+s).removeClass("btn-danger");
                    $("#status_button_"+s).addClass('btn-warning');
                }
                if(t.data.data.status == 2){
                    $("#status_button_"+s).html('Active');

                    $("#status_button_"+s).removeClass("btn-warning");
                    $("#status_button_"+s).removeClass("btn-danger");
                    $("#status_button_"+s).addClass('btn-success');
                }

                toastr.success(t.data.message, "Success");
            } else {
                toastr.success("Customer Status Successfully Updated.");
            }
        })
        .catch((err) => {
            $("#status_id_" + s).val(a);
            if (err.response.data.message) {
                toastr.error(err.response.data.message, "Error");
            } else {
                toastr.error("Failed to Update User Status");
            }
        });
}

</script>
