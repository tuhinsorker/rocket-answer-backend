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
            $("#update_expert_id").val(res.data.data.expert_id).trigger("change");
            $("#update_payment_method_id").val(res.data.data.payment_method_id).trigger("change");
            $("#update_amount").val(res.data.data.amount);
            $("#update_payment_date").val(res.data.data.payment_date);
            $("#email").val(res.data.data.email);
            $("#update_icon_path_img").attr(
                "src",
                res.data.data.attachment_url
            );

            if(res.data.data.is_active==1){
                $("#update_is_active").prop("checked", true);
            }
            $("#update_id").val(res.data.data.id);
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
