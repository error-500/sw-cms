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
            icon.toggleClass('fa-plus fa-spinner fa-pulse');
        },
        success: function(data) {
            $('.shop-menu-cnt').html(data['full']);
            $('.cart-li-mobile').html(data['mobile']);
            icon.toggleClass('fa-check fa-spinner fa-pulse');

            setTimeout(function() {
                icon.toggleClass('fa-check fa-plus');
            }, 1500);
        },
        error: function(data) {
            icon.toggleClass('fa-times fa-spinner fa-pulse');
        }
    })
});