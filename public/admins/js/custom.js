

    $(document).ready(function () {

        $('#check_all').on('click', function (e) {
            alert('ok');

            if ($(this).is(':checked', true)) {
                $(".checkbox").prop('checked', true);
            } else {
                $(".checkbox").prop('checked', false);
            }
        });

    });

