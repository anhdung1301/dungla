require(["jquery"], function ($) {

    $(document).ready(function () {


        jQuery("#form1").submit(function () {
                alert(1);
            var connten = document.getElementById("connten").value;

            var a = connten.toLowerCase();
            var arr1 = a.split(' ');
            var d;
            arr1.forEach(function (element) {

                switch (element) {
                    case 'lê':
                    case 'nam':
                        d = 1;
                        break;
                }
            });
            if (d === 1) {
               alert("bad words accquired, please update");
            }

            //var connten = document.getElementById("connten").value;

            var author_id = document.getElementById("author_id").value;
            var status = document.getElementById("status").value;
            var url = "http://ecommage2.local/EcommageBlog/index/add";

            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {
                    connten: connten,
                    author_id: author_id,
                    status: status
                },
                complete: function () {
                    window.location = "http://ecommage2.local/EcommageValidation";

                },
                error: function () {

                }

            });


        });

    });
});




