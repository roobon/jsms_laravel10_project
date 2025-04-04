/*Modal Init*/
$(document).ready(function () {
    "use strict";

    if ($("#exampleModal").length > 0) {
        $("#exampleModal").on("show.bs.modal", function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var retailerId = button.data("retailerid"); // Extract info from data-* attributes
            var invoice = button.data("invoice"); // Extract info from data-* attributes

            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this);
            modal.find(".modal-title").text("New message to " + recipient);
            //modal.find(".modal-body input").val(recipient);
            modal.find("#invoice").val(invoice);
            modal.find("#retailer").val(retailerId);
        });
    }
});
