$(document).ready(function () {


    $('#frmsearch').submit(function (event) {
        event.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            data: $(this).serializeArray(),
            method: "POST",
        }).done(function (data) {
            $('#divresult').html(data);
            $('#divdetail').html('');
        });

        $("body").on("click", ".btnview", function (e) {

            $.get("employee/" + $(this).attr('codid'), function (data, status) {
                $('#divdetail').html(data);
            });

            return false;
        });
    });


    $('#frmsearch').submit();

});




