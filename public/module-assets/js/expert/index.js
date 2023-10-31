$(document).ready(function () {
    ("use strict"); // Start of use strict

    // Creativity Level select2 init
    $("#edit-group").select2({
        dropdownParent: $("#edit-modal"),
        tags: true,
    });
    /**
     * Creativity Level update form submit
     */
    $("#update-form").submit(function (e) {
        e.preventDefault();
        update($(this));
    });
    /**
     * Creativity Level group select2 init
     */
    $("#create-creativity-level-group").select2({
        dropdownParent: $("#create-creativity-level-modal"),
        tags: true,
    });
    /**
     * Creativity Level create form submit
     */
    $("#create-creativity-level-form").submit(function (e) {
        e.preventDefault();
        store($(this));
    });

    $('a.doc-download').click(function (e) {
        e.preventDefault();
        console.log('clicking for download');
        console.log('doc-download');
        let uri = $(this).data('url');
        var link = document.createElement("a");
        link.download = 'download';
        link.href = uri;
        link.click();
    });

    $('#reject-reason').submit(function (e) {
        e.preventDefault();
        console.log('reject-reason');
        updateStatusWithReason($(this));
    });
});

function downloadFile(url){
        var link = document.createElement("a");
        link.download = 'download';
        link.href = url;
        link.click();
}


function showCreateModal() {
    $("#create-modal").modal("show");
}

function showEditModal(id) {
    axios
        .get($("#page-axios-data").data("edit"), {
            params: {
                id: id,
            },
        })
        .then((res) => {
            
            console.log(res.data.data);
            $("#update_name").val(res.data.data.name);
            $("#update_icon_path_img").attr(
                "src",
                res.data.data.icon
            );

            if(res.data.data.is_active==1){
                $("#update_is_active").prop("checked", true);
            }


            $("#update_id").val(res.data.data.id);

            $("#client_id").val(res.data.data.client_id);
            $("#client_secret").val(res.data.data.client_secret);
            $("#username").val(res.data.data.username);
            $("#password").val(res.data.data.password);


            $("#payment_amount").val(res.data.data.payment_amount);
            $("#second_pay_amount").val(res.data.data.second_pay_amount);
            $("#rating_range").val(res.data.data.rating_range).trigger("change");

            // $("#update_id").val(res.data.data.id);

            $("#update_expert_category_id").val(res.data.data.expert_category_id).trigger("change");
            $("#edit-modal").modal("show");
        })
        .catch((err) => {
            showAxiosErrors(err);
        });
}


/**
 * Store data
 * @param form
 */
function store(form) {
    // get form data with image and files
    var data = new FormData(form[0]);
    axios
        .post($("#page-axios-data").data("create"), data)
        .then(function (response) {
            toastr.success(response.data.message, "Success");
            $("#create-modal").modal("hide");
            form.trigger("reset");
            $("#icon_path_img").attr("src", "");
            $($("#page-axios-data").data("table-id"))
                .DataTable()
                .ajax.reload(null, false);
        })
        .catch((err) => {
            showAxiosErrors(err);
        });
}

function updateStatusWithReason(form) {
    // get form data with image and files
    var data = new FormData(form[0]);
    axios
        .post($("#page-axios-data").data("update-status"), data)
        .then(function (response) {
            $("#reason-modal").find('textarea').val('');
            $("#reason-modal").modal("hide");
            console.log('reject btn',response.data.data.id);
            let btn = $("#status_button_"+response.data.data.id);
            btn.removeClass()

            btn.addClass('btn btn-danger');
            btn.text('Rejected');
            toastr.success(response.data.message, "Success");

        })
        .catch((err) => {
            toastr.error(err.response.data.message, "Error");
        });
}


/**
 * Update data
 * @param form
 */
function update(form) {
    // get form data with image and files and then send axios put request
    var data = new FormData(form[0]);
    // _method= put in data
    data.append("_method", "put");
    axios
        .post($("#page-axios-data").data("update"), data)
        .then(function (response) {
            toastr.success(response.data.message, "Success");
            $("#edit-modal").modal("hide");
            form.trigger("reset");
            $($("#page-axios-data").data("table-id"))
                .DataTable()
                .ajax.reload(null, false);
        })
        .catch((err) => {
            showAxiosErrors(err);
        });
}

/**
 * Withdraw request
 *
*/

function showWithdrawRequestModal(e) {
    
    console.log('showWithdrawRequestModal',e);
    var url = $(e).data("url");
    var id = $(e).data("id");
    console.log(url);

    axios.get(url, {}).then((res) => {
        console.log(res);
        $("#withdraw-request-modal").html(res.data);
        $("#withdraw-request-modal").modal("show");
    });

}

function downloadURI(uri, name) {
    var link = document.createElement("a");
    link.download = name;
    link.href = uri;
    link.click();
}
