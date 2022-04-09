$(document).on('click', 'a.jquery-postback', function(e) {
    e.preventDefault();
    var $this = $(this);
    console.log($this.attr('href'));
    $.post({
        type: $this.data('method'),
        url: $this.attr('href')
    }).done(function (data) {
        location.reload();
    });
});