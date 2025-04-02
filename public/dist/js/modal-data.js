/*Modal Init*/
$(document).ready(function () {
    "use strict";

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    if ($("#responsive-modal").length > 0) {
        $("#responsive-modal").on("show.bs.modal", function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var retailerId = button.data("retailer"); // Extract info from data-* attributes
            var invoiceNo = button.data("invoice");
            var retailerCode = button.data("retailercode");
            var dueoldAmount = button.data("dueold");
            //alert(retailerId);
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this);
            //modal.find(".modal-title").text("New message to " + recipient);
            // modal.find(".modal-body input").val(recipient);
            modal.find("#retailer").val(retailerId);
            modal.find("#retailer-code").val(retailerCode);
            modal.find("#invoice").val(invoiceNo);
            modal.find("#dueold").val(dueoldAmount);
        });
    }

    $("#saveBtn").click(function (e) {
        e.preventDefault();
        $(this).html("Sending..");

        $.ajax({
            data: $("#realizeForm").serialize(),
            url: "/admin/duerealization/entry",
            type: "POST",
            dataType: "json",

            success: function (data) {
                $("#realizeForm").trigger("reset");
                $("#responsive-modal").modal("hide");
                //table.draw();
            },

            error: function (data) {
                console.log("Error:", data);
                $("#saveBtn").html("Save Changes");
            },
        });
    });
});
