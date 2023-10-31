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
});

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
            $("#update_expert_id").val(res.data.data.expert_id).trigger("change");
            $("#update_pay_amount").val(res.data.data.pay_amount);
            $("#id").val(res.data.data.id);

            $("#payment_amount").val(res.data.data.payment_amount);
            $("#second_pay_amount").val(res.data.data.second_pay_amount);
            $("#rating_range").val(res.data.data.rating_range).trigger("change");

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
