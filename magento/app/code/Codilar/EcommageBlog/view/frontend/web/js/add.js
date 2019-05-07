

require(["jquery"], function ($) {
    $(document).ready(function () {
        console.log(1)

        jQuery("#form1").submit(function () {
            var connten = document.getElementById("connten").value;
            var author_id = document.getElementById("author_id").value;
            var status = document.getElementById("status").value;
            var url = "http://ecommage.local/EcommageBlog/index/add";

            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {
                    connten: connten,
                    author_id: author_id,
                    status: status
                },
                complete: function() {
                   window.location="http://ecommage.local/EcommageBlog";

                },
                error: function () {

                }

            });


            });

        });
    });

