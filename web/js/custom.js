$('.advs-box-delivery').hover(function() {
    $(this).find('.extra-content').toggleClass('bg-green bg-green-select');

}, function() {
    $(this).find('.extra-content').toggleClass('bg-green bg-green-select');
});

$('.add-to-cart').on('click', function() {
    icon = $(this).find('i');

    $.ajax({
        url: '/cart/add',
        data: {
            id: $(this).data('id')
        },
        beforeSend: function() {
            icon.toggleClass('im-add im-arrow-refresh');
        },
        success: function(data) {
            $('.shop-menu-cnt').html(data['full']);
            $('.cart-li-mobile').html(data['mobile']);
            icon.toggleClass('im-arrow-refresh im-yes');

            setTimeout(function() {
                icon.toggleClass('im-yes im-add');
            }, 1500);
        },
        error: function(data) {
            icon.toggleClass('im-arrow-refresh im-close');
        }
    })
});