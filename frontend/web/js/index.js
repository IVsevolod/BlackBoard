$(document).ready(function () {
    var loading = false;
    var aliasLoad = alias;
    if (typeof aliasLoad) {
        aliasLoad = alias;
    }
    var $blockAds = $('.block-bboard');

    var lastId = $blockAds.data('last-id');

    function loadAds() {
        if (loading) {
            return;
        }

        loading = true;
        $.ajax({
            url: $blockAds.data('load-url'),
            data: {
                lastId: lastId,
                alias: aliasLoad,
                city: cityId
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $.each(data, function () {
                    if (parseInt(this.id) < lastId || lastId < 0) {
                        lastId = parseInt(this.id);
                    }
                    var title = this.title;
                    if (this.price > 0) {
                        title += " /<i>" + this.price + " руб.</i>";
                    }
                    var $newAds = $('<div class="bboard-block"></div>').append([
                        $('<a href="javascript: void(0)" class="link-bboard"></a>').html(title).click(function() {
                            var $hideBlock = $(this).closest('div.bboard-block').find('div');
                            if ($hideBlock.hasClass('hide')) {
                                $hideBlock.removeClass('hide');
                            } else {
                                $hideBlock.addClass('hide');
                            }
                        }),
                        ' ',
                        $('<a><i class="glyphicon glyphicon-link"></i></a>').attr('href', this.href),
                        $('<div class="hide"></div>').append([
                            $('<p></p>').html(this.description),
                            $('<b>Телефон</b>'),
                            ': ',
                            this.phone,
                            (this.price > 0 ? "<br/><b>Цена</b>: " + this.price : ""),
                            (this.city != "" ? "<br/><b>Город</b>: " + this.city : "")
                        ])
                    ]);
                    $blockAds.append($newAds);
                });
                if (data.length < 20) {
                    $('.load-bboard').hide();
                }
                loading = false;
            }
        });
    }

    $(document).on('click', '.load-bboard', function (event) {
        event.preventDefault();

        loadAds();
        return false;
    });

    $(document).on('change', '.select-all-group', function() {
        var cityId = $('.select-all-city').val();
        var alias = $('.select-all-group').val();
        if (cityId == "") {
            cityId = "0";
        }
        if (alias == "") {
            window.location = $(this).data('bboard-url') + '/' + cityId;
        } else {
            window.location = $(this).data('bboard-url') + '/' + cityId + '/' + alias;
        }
    });

    $(document).on('change', '.select-all-city', function() {
        var cityId = $(this).val();
        var alias = $('.select-all-group').val();
        if (cityId == "") {
            cityId = "0";
        }
        if (alias == "") {
            window.location = $(this).data('bboard-url') + '/' + cityId;
        } else {
            window.location = $(this).data('bboard-url') + '/' + cityId + '/' + alias;
        }
    });

    setTimeout(loadAds, 10);
});