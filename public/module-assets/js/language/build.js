$(document).ready(function () {
    ("use strict"); // Start of use strict

    $("#add_package_service").click(function () {
        markup =
            '<tr id="new-phrase"><td><input type="text" name="key[]" class="form-control"></td><td><input type="text" name="label[]" class="form-control"></td><td><button class="btn btn-danger remove_package_service" onclick="remove(this)" type="button"><i class="fa fa-trash"></i></button></td></tr>';
        tableBody = $("table#add-phrase tbody");
        tableBody.append(markup);
    });
});
function remove(rem) {
    $(rem).parent().parent().remove();
}
