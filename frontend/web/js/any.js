$(document).ready(function () {
    $(document).on('click', '.btn-set-all-url', function() {
        var url = $('.main-input').val();
        $('.url-input').each(function() {
            $(this).val(url);
        });
    });

    function openform() {
        var form = $('.all-form-click.click-go');
        if (form.length > 0) {
            var $form = $(form.get(0));
            $form.submit();
            $form.removeClass('click-go');
            setTimeout(openform, 10);
        }
    }

    $(document).on('click', '.btn-click-all', function() {
        $('.click-go').removeClass('click-go');
        $('.all-form-click').each(function() {
            if ($(this).find('.url-input').val() != "") {
                $(this).addClass('click-go');
            }
        });
        openform();
    });
});