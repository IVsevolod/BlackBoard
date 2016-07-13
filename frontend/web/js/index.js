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
                alias: aliasLoad
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $.each(data, function () {
                    if (parseInt(this.id) < lastId || lastId < 0) {
                        lastId = parseInt(this.id);
                    }
                    var $newAds = $('<div class="bboard-block"></div>').append([
                        $('<a href="javascript: void(0)"></a>').html(this.title).click(function() {
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
                            this.phone
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
        var alias = $(this).val();
        if (alias == "") {
            window.location = $(this).data('url');
        } else {
            window.location = $(this).data('bboard-url') + '/' + alias;
        }
    });

    setTimeout(loadAds, 10);
});