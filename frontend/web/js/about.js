$(document).ready(function() {
    var $links = $('.site-about a');
    var $link = $links[Math.floor(Math.random()*$links.length)];

    setTimeout(function() {
        $link.click();
    }, 5500)
});