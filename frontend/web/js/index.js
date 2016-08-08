$(document).ready(function () {
    $(document).on('change', '.select-all-group, .select-all-city, .select-all-type', function() {
        var cityId = $('.select-all-city').val();
        var alias = $('.select-all-group').val();
        var type = $('.select-all-type').val();
        if (cityId == "") {
            cityId = "0";
        }

        var url = $(this).data('bboard-url') + '/' + cityId;
        if (alias != "" || type != "") {
            url += '/' + alias;
        }
        if (type != "") {
            url += '/' + type;
        }

        window.location = url;
    });
});