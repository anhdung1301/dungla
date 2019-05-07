

require(["jquery"], function ($) {
    $(document).ready(function () {

        jQuery("#form2").submit(function () {
            // e.preventDefault();

            var connten = document.getElementById("connten").value;

            var id = document.getElementById("id").value;

            var status = document.getElementById("status").value;

            var url = "http://ecommage.local/EcommageBlog/index/addu";

            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {
                    connten: connten,
                    id: id,
                    status: status
                }
            })
                .done(function () {
                    window.location="http://ecommage.local/EcommageBlog";
                });



        });
    });
});
